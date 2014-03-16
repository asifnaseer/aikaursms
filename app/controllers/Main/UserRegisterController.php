<?php namespace Main;

use BaseController;
use Config;
use Input;
use Lang;
use Redirect;
use Validator;
use View;
use Illuminate\Support\Facades\Hash;
use \Route;
use Illuminate\Support\Facades\Session;
use \URL;
use \AjaxValidationResponseCreator;
use Request;
use Response;

use Sentry;
use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;

use \UserDetail;

use \PhysicalAddress;
use \ContactInformation;

use Facebook\FacebookConfiguration;
use Facebook\Facebook;
use Facebook\FacebookApiException;

use Twitter\TwitterOAuth;
use Twitter\TwitterConfiguration;

use Instagram\InstagramConfiguration;
use Instagram\Instagram;
use Instagram\InstagramDatabaseHandler;

class UserRegisterController extends BaseController {
        
        
       /**
        * The database table used by the model.
        *
        * @var string
        */
	protected $_data = array();
        
        
        protected $_validation_rules    =   array(
            
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required|email',

            'contact_telephone'   => 'required',
            'contact_mobile'      => 'required',


            'physical_address_line1'        => 'required|max:25',
            'physical_address_city'         => 'required',
            'physical_address_state'        => 'required',
            'physical_address_country'      => 'required',
            'physical_address_postal_code'  => 'required', 
        );

        
        
        public function __construct() {
            
            parent::__construct();
        }

        public function login(){
            return View::make('front.login');
        }
        
        public function signup(){
            if(is_array(Input::get()) && count(Input::get()) > 0){
                $this->_data['data']      =   Input::get();
                $this->_data['post_back'] = true;
            }else{
                $data['first_name'] = '';
                $data['last_name'] = '';
                $data['email'] = '';
                $data['password'] = '';
                $data['confirm_password'] = '';
                $data['ig_access_token'] = '';
                $data['ig_id'] = '';
                $this->_data['data'] = $data;
                $this->_data['post_back'] = false;
            }
            $instagram = new Instagram(InstagramConfiguration::get(URL::route('user.instagram.redirect'))); 
            $this->_data['ig_auth_url']  = $instagram -> getLoginUrl(array('basic', 'likes', 'comments', 'relationships'));
            return View::make('front.signup', $this->_data);
            
        }
        public function signup_save(){
            if (Request::ajax()){
                $messages = array(
                    'ig_access_token.required' => 'You need to authenticate through Instagram first!',
                );
                //validation rules
		$rules =    array(
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|Confirmed',
                    'password_confirmation'=>'required',
                    'ig_access_token' => 'required'
                );
                $password = Input::get('password');    
		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules , $messages);
                
                // Create new ajax validation response creator instance.
                $objAjaxValidationResponseCreator   = New AjaxValidationResponseCreator();
                $msg = "";
                if ($validator->fails()){
                    $errors  = $validator -> messages() -> toArray();
                    foreach($errors as $error){
                        $msg .= "<p>".$error[0]."</p>";
                    }
                    $ajax_response = array('success' => false , 'errors' => $msg );
                    return Response::json($ajax_response);                     
                }else{
                
                    try {
                       
                        //First save as user                                        
                        $user = Sentry::createUser(array(
                             'email'       => Input::get('email'),
                             'password'    => $password,
                             'first_name'  => Input::get('first_name'),
                             'last_name'   => Input::get('last_name'),   
                        ));
                        $user_id = $user->id;   
                        $ajax_response = array('true' => false , 'errors' => '<p>You are successfully registered, please login now<p>' );
                        //
                        $insert_data = array('user_id' => $user_id , 'ig_id'=> Input::get('ig_id'), 'ig_access_token' => Input::get('ig_access_token'));
                        $id = \DB::table('users_detail')->insertGetId($insert_data);   
                        
                        $user = \DB::table('users')->where('email' , Input::get('email'))->first();
                        
                        $enc_password = $user->password;
                        
                        $insert_data = array('user_id' => $user_id , 'password'=> $enc_password );
                        $password_history_id = \DB::table('password_history')->insertGetId($insert_data); 
                        
                        Session::put('user_id', $user_id);
                        Session::put('first_name', Input::get('first_name'));
                        Session::put('last_name', Input::get('last_name'));
                        Session::put('email', Input::get('email'));
                        Session::put('logged_in', true);                            
                        
                    }catch (\Cartalyst\Sentry\Users\LoginRequiredException $e){
                        $this->messageBag->add('email', 'Login field is required.'); 
                        $objAjaxValidationResponseCreator   -> setStatus('error');
                    }
                }
            }
        }
        public function reset_password(){
            return View::make('front.resetpassword');
        }
        public function send_reset_email(){
            if (Request::ajax()){
                $rules =    array(
                    'email' => 'required|email'
                );
		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules );
                // Create new ajax validation response creator instance.
                $objAjaxValidationResponseCreator   = New AjaxValidationResponseCreator();
                $msg = "";
                if ($validator->fails()){
                    $errors  = $validator -> messages() -> toArray();
                    foreach($errors as $error){
                        $msg .= "<p>".$error[0]."</p>";
                    }
                    $ajax_response = array('success' => false , 'errors' => $msg );
                    return Response::json($ajax_response);                     
                }else{
                     $user = \DB::table('users')->where('email' , Input::get('email'))->first();
                     if($user == ""){
                         $ajax_response = array('success' => false , 'errors' => '<p><strong>'.Input::get('email').'</strong> is an invalid email</p>');
                         return Response::json($ajax_response);        
                     }else{
                         $code = time();
                         \DB::table('users')->where('email' , Input::get('email'))->update(array('reset_password_code' => $code));
                         \Mail::send('front.reset_email', array('first_name' => $user->first_name , 'last_name' => $user->last_name ,'code' => $code), function($message){
                            $message->from('contact@publicty.com', 'Publicity');
                            $user = \DB::table('users')->where('email' , Input::get('email'))->first();
                            
                            $message->to($user->email, $user->first_name.' '.$user->last_name)->subject('Reset your password');
                            
                         });
                        $ajax_response = array('success' => true , 'messages' => '<p>Reset email sent successfully to <strong>'.$user->email.'</strong></p>');
                        return Response::json($ajax_response);  
                     }
                     
                }                
                
            }
        }
        public function set_password($code){
            $user = \DB::table('users')->where('reset_password_code' , $code)->first();
            if($user == ""){
                return View::make('front.wrong_reset' , $this->_data);
            }else{
                $this->_data['user'] = $user;
                return View::make('front.newpassword' , $this->_data);
            }
            
        }
        public function update_password(){
            if (Request::ajax()){
		$rules =    array(
                    'password' => 'required|Confirmed',
                    'password_confirmation'=>'required',
                );
                $password = Input::get('password');    
		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);
                
                // Create new ajax validation response creator instance.
                $objAjaxValidationResponseCreator   = New AjaxValidationResponseCreator();
                $msg = "";
                if ($validator->fails()){
                    $errors  = $validator -> messages() -> toArray();
                    foreach($errors as $error){
                        $msg .= "<p>".$error[0]."</p>";
                    }
                    $ajax_response = array('success' => false , 'errors' => $msg );
                    return Response::json($ajax_response);                     
                }else{             
                    $user_id = Input::get('user_id');
                    $password_histories = \DB::table('password_history')->where('user_id' , $user_id)->get();
                    
                    if($password_histories != ""){
                        foreach($password_histories as $password_history){
                            if(Hash::check($password, $password_history->password)){
                                $ajax_response = array('success' => false , 'errors' => '<p>You have used this password in past, please try any other</p>' );
                                return Response::json($ajax_response); 
                            }
                        }
                    }
                    
                    $enc_password = Hash::make($password);
                    \DB::table('users')->where('id' , $user_id)->update(array('password' => $enc_password));

                    $insert_data = array('user_id' => $user_id , 'password'=> $enc_password );
                    \DB::table('password_history')->insertGetId($insert_data);                         

                    $ajax_response = array('success' => true , 'messages' => '<p>Password updated successfully!</p>' );
                    return Response::json($ajax_response);                         
                    
                }   
            }
        }
        public function logout(){
            Session::flush();
            return Redirect::to('/');
        }

        public function instagram(){
            $code = $_REQUEST['code'];
            $instagram  = new Instagram(InstagramConfiguration::get(URL::route('user.instagram.redirect')));
            $response   = $instagram->getOAuthToken($code);
           
            $data  =   array(
                    'ig_access_token'   => $response -> access_token,
                    'ig_id'             => $response -> user -> id,
                    'first_name'        => $response -> user -> full_name,
                    'last_name'         => $response -> user -> full_name,
                    'email'             => '',
                    'contact_telephone'   => '',
                    'contact_mobile'      => '',
                    'physical_address_line1'        => '',
                    'physical_address_city'         => '',
                    'physical_address_state'        => '',
                    'physical_address_country'      => '',
                    'physical_address_postal_code'  => '',

            );
            return Redirect::route('user.signup', $data);
        }

        public function authenticate(){
            if (Request::ajax()){
                $input = Input::all();
                $email = Input::get('email');
                $password = Input::get('password');
                
                $user= \User::where('email' , $email)->first();
                if($email == "" && Input::get('password') == ""){
                    $ajax_response = array('success' => false , 'errors' => '<p>Please enter Email and Password</p>' );
                    return Response::json($ajax_response);    
                }
                else if(count($user) == 0){
                    $ajax_response = array('success' => false , 'errors' => '<p>Invalid Email</p>');
                    return Response::json($ajax_response);    
                }else{
                    if(Hash::check($password, $user->password)){
                        
                        Session::put('user_id', $user->id);
                        Session::put('first_name', $user->first_name);
                        Session::put('last_name', $user->last_name);
                        Session::put('email', $user->email);
                        Session::put('logged_in', true);    
                        $ajax_response = array('success' => true , 'message' => '<p>You are successfully validated!</p>');
                        return Response::json($ajax_response);   
                    }else{
                        $ajax_response = array('success' => false , 'errors' => '<p>Invalid Password</p>');
                        return Response::json($ajax_response);    
                    }
                }
                
                
            }
        }
      
}
