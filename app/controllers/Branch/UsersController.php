<?php namespace Branch;

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

class UsersController extends BaseController {
    protected $_data = array();
    public function __construct() {

        parent::__construct();
    }

    public function login(){
        return View::make('branch.login');
    }
    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }

    public function authenticate(){
        if (Request::ajax()){
            $input = Input::all();
            $user_name = Input::get('user_name');
            $password = Input::get('password');

            $user = \BranchUser::where('user_name' , $user_name)->first();
            if($user_name == "" && $password == ""){
                $ajax_response = array('success' => false , 'errors' => '<p>Please enter Username and Password</p>' );
                return Response::json($ajax_response);    
            }
            else if(count($user) == 0){
                $ajax_response = array('success' => false , 'errors' => '<p>Invalid Username</p>');
                return Response::json($ajax_response);    
            }else{
                if(Hash::check($password, $user->password)){

                    Session::put('branch_user_id', $user->branch_user_id);
                    Session::put('branch_first_name', $user->first_name);
                    Session::put('branch_last_name', $user->last_name);
                    Session::put('branch_user_name', $user->user_name);
                    Session::put('branch_logged_in', true);    
                    $ajax_response = array('success' => true , 'message' => '<p>You are successfully validated!</p>');
                    return Response::json($ajax_response);   
                }else{
                    $ajax_response = array('success' => false , 'errors' => '<p>Invalid Password</p>');
                    return Response::json($ajax_response);    
                }
            }


        }
    }
      
    public function dashboard(){
        //breadcrumbs
        $this->_data['breadcrumb']              = array(
                'count' => 2,    
                'data'  => array(
                    0 => array('lable' => 'Dashboard', 'link' => '', 'icon' => 'home'),

                )
        );

        //general data
        $this->_data['page_title']              = 'Dashboard';
        $this->_data['content_main_heading']    = 'Dashboard';
        $this->_data['content_help_line']       = '';

        return View::make('branch.user.dashboard',$this->_data);
    }    
}
