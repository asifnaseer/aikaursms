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



class UserProfileController extends BaseController {
        
        
       /**
        * The database table used by the model.
        *
        * @var string
        */
	protected $_data = array();
        
        public function __construct() {
            
            parent::__construct();
        }
        
        public function dashboard(){
            $groups         = array('admin'); 
            $usersObjArray  = array();
            
            foreach($groups as $group) {
                
                $groupObj = Sentry::findGroupByName($group);
                $usersObjArray[$group] = Sentry::findAllUsersInGroup($groupObj);
            }
            
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
            
            // Add Module Name to data for view.
            $this->_data['users_object_array']  = $usersObjArray;        
            return View::make('front.user.dashboard',$this->_data);
        }
        public function newboard($page = '' , $id = '' , $board_id = ''){
            $groups         = array('admin'); 
            $usersObjArray  = array();
            $this->_data['id'] = $id;
            foreach($groups as $group) {

                $groupObj = Sentry::findGroupByName($group);
                $usersObjArray[$group] = Sentry::findAllUsersInGroup($groupObj);
            }
            if($page == "" && $id == ""){ // This means , user is currently on page 1

              
                //breadcrumbs
                $this->_data['breadcrumb']              = array(
                        'count' => 2,    
                        'data'  => array(
                            0 => array('lable' => 'Create a New Board', 'link' => '', 'icon' => 'film'),

                        )
                );

                //general data
                $this->_data['page_title']              = 'Create a New Board';
                $this->_data['content_main_heading']    = 'Create a New Board';
                $this->_data['content_help_line']       = 'This is where the fun begins! In just a few	steps you’ll be ready to rock!';

                // Add Module Name to data for view.
                $this->_data['users_object_array']  = $usersObjArray;   
                $this->_data['per_pkgs'] = \Package::where('type','=','personal')->get();
                $this->_data['pro_pkgs'] = \Package::where('type','=','professional')->get();
                return View::make('front.boards.new',$this->_data);
            }else if($page == 2){
                $package = \Package::where('package_id','=',$id)->first(); // Fetch information of selected package on first page.
                
                $this->_data['package'] = $package;
                
                //breadcrumbs
                $this->_data['breadcrumb']              = array(
                        'count' => 2,    
                        'data'  => array(
                            0 => array('lable' => 'Enter Hashtag', 'link' => '', 'icon' => 'film'),

                        )
                );                
                
                //general data
                $this->_data['page_title']              = 'Enter Hash';
                $this->_data['content_main_heading']    = $package->name;
                $this->_data['content_help_line']       = '';
                return View::make('front.boards.enterhash',$this->_data);
            }else if($page ==3){
                $package = \Package::where('package_id','=',$id)->first(); // Fetch information of selected package on first page.
                $this->_data['package'] = $package;
                //breadcrumbs
                $this->_data['breadcrumb']              = array(
                        'count' => 2,    
                        'data'  => array(
                            0 => array('lable' => 'Configure board options', 'link' => '', 'icon' => 'film'),

                        )
                ); 
                $appearance_location = \DB::table('appearance_location')->get();
                $this->_data['locations'] = $appearance_location; 

                $appearance_font = \DB::table('appearance_font')->get();
                $this->_data['fonts'] = $appearance_font; 

                $font_sizes = \DB::table('appearance_font_size')->get();
                $this->_data['sizes'] = $font_sizes;                
                
                $photo_size = \DB::table('photo_size')->get();
                $this->_data['photo_sizes'] = $photo_size;                
                
                $animation_presets = \DB::table('animation_preset')->get();
                $this->_data['presets'] = $animation_presets;  

                $animation_speed = \DB::table('animation_speed')->get();
                $this->_data['speeds'] = $animation_speed;       
                
                
                //general data
                $this->_data['page_title']              = 'Configure Board Options';
                $this->_data['content_main_heading']    = $package->name;
                $this->_data['content_help_line']       = '';
                return View::make('front.boards.configureboard',$this->_data);                
            }else if($page == 4){
                $package = \Package::where('package_id','=',$id)->first(); // Fetch information of selected package on first page.
                $this->_data['package'] = $package;
                //breadcrumbs
                $this->_data['breadcrumb']              = array(
                        'count' => 2,    
                        'data'  => array(
                            0 => array('lable' => 'Board Security Options', 'link' => '', 'icon' => 'film'),

                        )
                ); 
                $this->_data['board_id']  = $board_id;
                
                $user_id = Session::get('user_id');

                $userDetail = \DB::table('users_detail')
                                        ->where('user_id', $user_id)
                                        ->first();
                $token = $userDetail->ig_access_token;    
                $ig_id = $userDetail->ig_id;
                $follower_url = "https://api.instagram.com/v1/users/".$ig_id."/followed-by?access_token=".$token;
                $response = file_get_contents($follower_url);
                $response_array = json_decode($response);
                
                $this->_data['followers']              = $response_array->data;
                //general data
                $this->_data['page_title']              = 'Board Security Options';
                $this->_data['content_main_heading']    = $package->name;
                $this->_data['content_help_line']       = '';
                return View::make('front.boards.security',$this->_data);                
            }else if($page == 5){
                $package = \Package::where('package_id','=',$id)->first(); // Fetch information of selected package on first page.
                $this->_data['package'] = $package;
                //breadcrumbs
                $this->_data['breadcrumb']              = array(
                        'count' => 2,    
                        'data'  => array(
                            0 => array('lable' => 'Check out', 'link' => '', 'icon' => 'film'),

                        )
                ); 
                $board = \DB::table('board')
                                        ->where('board_id', $board_id)
                                        ->first();
                
                $this->_data['board']  = $board;
                $this->_data['board_id']  = $board_id;
                //general data
                $this->_data['page_title']              = 'Check out';
                $this->_data['content_main_heading']    = '';
                $this->_data['content_help_line']       = '';
                
                /*
                 * For Google Wallet Token 
                 */
                $payload = array(
                    "iss" => '14347445810460326381',
                    "aud" => "Google",
                    "typ" => "google/payments/inapp/item/v1",
                    "exp" => time() + 3600,
                    "iat" => time(),
                    "request" => array (
                      "name" => $package->name,
                      "description" => $package->name ,
                      "price" => $package->price,
                      "currencyCode" => "USD",
                      "sellerData" => "",
                    )
                );
                $token = \JWT::encode($payload, 'KswGBc1uLBPZVy_i_Z9o0A');
                $this->_data['token'] = $token;
                ////////
                return View::make('front.boards.checkout',$this->_data);                  
            }
           
        }
        function google_postback(){
            $response = isset($HTTP_RAW_POST_DATA) ?  $HTTP_RAW_POST_DATA : file_get_contents("php://input");
            $response = substr_replace($response, "", 0, 4);   //remove "jwt=" from raw http data
            $response = \JWT::decode($response, "KswGBc1uLBPZVy_i_Z9o0A");
            
        }
        function ipn(){
            // STEP 1: Read POST data

            // reading posted data from directly from $_POST causes serialization 
            // issues with array data in POST
            // reading raw POST data from input stream instead. 
            $raw_post_data = file_get_contents('php://input');
            $raw_post_array = explode('&', $raw_post_data);
            $myPost = array();
            foreach ($raw_post_array as $keyval) {
              $keyval = explode ('=', $keyval);
              if (count($keyval) == 2)
                 $myPost[$keyval[0]] = urldecode($keyval[1]);
            }
            // read the post from PayPal system and add 'cmd'
            $req = 'cmd=_notify-validate';
            if(function_exists('get_magic_quotes_gpc')) {
               $get_magic_quotes_exists = true;
            } 
            foreach ($myPost as $key => $value) {        
               if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
                    $value = urlencode(stripslashes($value)); 
               } else {
                    $value = urlencode($value);
               }
               $req .= "&$key=$value";
            }            
            // STEP 2: Post IPN data back to paypal to validate

            $ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

            // In wamp like environments that do not come bundled with root authority certificates,
            // please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path 
            // of the certificate as shown below.
            // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
            if( !($res = curl_exec($ch)) ) {
                // error_log("Got " . curl_error($ch) . " when processing IPN data");
                curl_close($ch);
                exit;
            }
            curl_close($ch);            
            // STEP 3: Inspect IPN validation result and act accordingly

            if (strcmp ($res, "VERIFIED") == 0) {
                // check whether the payment_status is Completed
                // check that txn_id has not been previously processed
                // check that receiver_email is your Primary PayPal email
                // check that payment_amount/payment_currency are correct
                // process payment

                // assign posted variables to local variables
                $item_name = $_POST['item_name'];
                $item_number = $_POST['item_number'];
                $payment_status = $_POST['payment_status'];
                $payment_amount = $_POST['mc_gross'];
                $payment_currency = $_POST['mc_currency'];
                $txn_id = $_POST['txn_id'];
                $receiver_email = $_POST['receiver_email'];
                $payer_email = $_POST['payer_email'];
                $board_id = $item_number;
                DB::table('board')->where('board_id' , $board_id)->update(array('status' => 'active'));
                // <---- HERE you can do your INSERT to the database

            }            
           
        }
        function get_http_response_code($url) {
            $headers = get_headers($url);
            return substr($headers[0], 9, 3);
        }
        public function fetch_instagram_tag(){ // its ajax function fetched from enter hash tag screen
             if (Request::ajax()){ // to verify the ajax request
                $tag = Input::get('tag');
                $pos = strpos($tag, '#');
                $total_hash =  substr_count($tag, '#');
                if($total_hash > 1){
                    $ajax_response = array('success' => false , 'errors' =>'Invalid tag');
                    return $ajax_response;
                }
                else if($pos >0){
                    $ajax_response = array('success' => false , 'errors' =>'Invalid tag');
                    return $ajax_response;
                }
                else{
                    $tag = str_replace("#","",$tag);
                    $user_id = Session::get('user_id');
                    $id = \DB::table('temp_hash_tag')->insertGetId(array('user_id' => $user_id, 'tag' => $tag));
                    
                    $userDetail = \DB::table('users_detail')
                                            ->where('user_id', $user_id)
                                            ->first();
                    $token = $userDetail->ig_access_token;
                    
                    $insta_url = "https://api.instagram.com/v1/tags/".$tag."?access_token=".$token;
                    $response = $this->get_http_response_code($insta_url);
                   
                    if($response == 400){
                        $ajax_response = array('success' => false , 'total' =>0, 'errors' => '<p>No result found against this tag</p>');
                        return $ajax_response;  
                    }else{
                        $response = file_get_contents($insta_url);
                        $response_array = json_decode($response);
                        $total_media_returned = $response_array->data->media_count;
                        $insta_url = "https://api.instagram.com/v1/tags/".$tag."/media/recent?access_token=".$token;
                        $response = file_get_contents($insta_url);
                        $response_array = json_decode($response);
                        $images = '<ul class="thumbnails">';
                        $i = 0;
                        foreach($response_array->data as $dd){
                            if($i>=4) break;
                            $images .= "<li class='span3'><img src='".$dd->images->thumbnail->url."' class='img-thumbnail'/></li>";
                            $i++;
                        }
                        $images .= "</ul>";
                        $ajax_response = array('success' => true , 'total' =>$total_media_returned, 'images' => $images);
                        return $ajax_response;      
                    }

                }
             }
            
        }
        public function board($user_id , $board_id , $tag){
            $board = \DB::table('board')->where('board_id' , $board_id)->where('user_id' , $user_id)->where('tag' , $tag)->first();
            
            $board = \DB::table('board')
                ->where('board.user_id','=',$user_id)
                ->join('board_privacy', 'board.board_id', '=', 'board_privacy.board_id')
                ->join('user_preset', 'board.user_preset_id', '=', 'user_preset.user_preset_id')
                ->join('package', 'board.package_id', '=', 'package.package_id')
                ->where('board.board_id' , $board_id)->where('board.user_id' , $user_id)->where('board.tag' , $tag)->first();          
            if($board == ""){ 
                 return Response::view('front.errors.404', array(), 404);
            }else{
                 $this->_data['user_id'] = $user_id ; 
                 $this->_data['board_id'] = $board_id ; 
                 $this->_data['tag'] = $tag ; 
                 $this->_data['board'] = $board;
                    //breadcrumbs
                 $this->_data['breadcrumb']              = array(
                    'count' => 2,    
                    'data'  => array(
                        0 => array('lable' => 'Manage Boards', 'link' => '', 'icon' => 'film'),

                    )
                 );   
                 $board_privacy = \DB::table('board_privacy')->where('board_id' , $board_id)->first();
                 $this->_data['board_private'] = $board_privacy->board_private ;
                 $this->_data['page_title'] = 'Board Information #'.$tag;
                 return Response::view('front.board_home', $this->_data);
            }
        }
        public function add_logo(){
            $extension = Input::file('file')->getClientOriginalExtension();
            $fileName =  str_random(20).".".$extension;
            $destinationPath = public_path()."/uploads/preset/logo/";
            Input::file('file')->move($destinationPath, $fileName);
            $user_id = Session::get('user_id');
            $id = \DB::table('temp_preset_logo')->insertGetId(
                array('user_id' => $user_id, 'file_name' => $fileName)
            );
            //return $id;
        }
        public function get_logo(){
            if (Request::ajax()){  
                $user_id = Session::get('user_id');
                $latest_logo = \DB::table('temp_preset_logo')->where('user_id' , $user_id)->orderBy('id', 'desc')->first();
                $logo = $latest_logo->file_name;
                
                return $logo;
            }
        }
        public function profile(){
            $groups         = array('admin'); 
            $usersObjArray  = array();
            
            foreach($groups as $group) {
                
                $groupObj = Sentry::findGroupByName($group);
                $usersObjArray[$group] = Sentry::findAllUsersInGroup($groupObj);
            }
            
            //breadcrumbs
            $this->_data['breadcrumb']              = array(
                    'count' => 2,    
                    'data'  => array(
                        0 => array('lable' => 'Profile', 'link' => '', 'icon' => 'user'),
                       
                    )
            );
            $user_id = Session::get('user_id'); 
            $user = \DB::table('users')
                    ->where('id', '=', $user_id)
                    ->first();  
            $this->_data['user'] = $user;
            $created_at = date('d F , Y',(strtotime($user->created_at)));
            $this->_data['user_since'] = $created_at;
            
            //general data
            $this->_data['page_title'] = 'Profile';
            $this->_data['content_main_heading'] = '';
            $this->_data['content_help_line'] = '';
            
            // Add Module Name to data for view.
            $this->_data['users_object_array']  = $usersObjArray;        
            return View::make('front.user.profile',$this->_data);
        }

        public function add_board(){
            if (Request::ajax()){  
                $user_preset_id = Input::get('user_preset_id');
                $package_id = Input::get('package_id');
                $user_id = Session::get('user_id');
                $hash_tag = \DB::table('temp_hash_tag')
                    ->orderBy('id', 'desc')
                    ->where('user_id', '=', $user_id)
                    ->get();
                $tag = $hash_tag[0]->tag;
                $insert_data = array('user_id' => $user_id , 'package_id' => $package_id , 'user_preset_id' => $user_preset_id, 'tag' => $tag);
                
                $id = \DB::table('board')->insertGetId($insert_data);  
                $ajax_response = array('success' => true , 'board_id' => $id);
                return $ajax_response;                   
            }
        }
        public function redeem_code(){
            if (Request::ajax()){  
                $promo_code = Input::get('promo_code');
                $code = \DB::table('promo_code')
                    ->where('code', '=', $promo_code)
                    ->first();
                if($code == ""){
                    $ajax_response = array('success' => false , 'errors' => '<p>This is an invalid promo code</p>');
                    return $ajax_response;                   
                }else{
                    if($code->status == "used"){
                        $ajax_response = array('success' => false , 'errors' => '<p>This is promo code is not available anymore</p>');
                        return $ajax_response;      
                    }else{
                        $package_price = Input::get('package_price');
                        $html = "<p class='muted'>$".$package_price."</p>";
                        $html .= "<br> $";
                        $html .= $package_price-$code->price;
                        $ajax_response = array('success' => true , 'html' => $html);
                        return $ajax_response;                        
                    }
                }
            }
        }
        public function add_board_setting(){
            if (Request::ajax()){  
                $board_id = Input::get('board_id');
                $unlock_code = Input::get('unlock_code');
                $board_private = Input::get('board_private');

                if($board_private)
                    $board_private = "yes";
                else
                    $board_private = "no";
                $insert_data = array('board_id' => $board_id , 'board_private' => $board_private , 'unlock_code' => $unlock_code);
                $id = \DB::table('board_privacy')->insertGetId($insert_data);
                
                $followers = Input::get('followers');
                if($followers != ""){
                    foreach($followers as $follower){
                        $insert_data = array('board_id' => $board_id , 'ig_id' => $follower);
                        $id = \DB::table('blocked_follower')->insertGetId($insert_data);
                    }                
                }
                
                $ajax_response = array('success' => true);
                return $ajax_response;    
            }
        }
        public function add_preset(){
            if (Request::ajax()){
                $font = Input::get('font');
                $branding = Input::get('branding');
                
                if($branding)
                    $branding = "yes";
                else
                    $branding = "no";
                
                $font_size = Input::get('font_size');
                $glow_shadow_effect = Input::get('glow_shadow_effect');
                if($glow_shadow_effect)
                    $glow_shadow_effect = "yes";       
                else
                    $glow_shadow_effect = "no";
                
                $location = Input::get('location');
                $effect_color = Input::get('effect_color');
                $font_color = Input::get('font_color');
                $photo_background = Input::get('photo_background');
                
                if($photo_background )
                    $photo_background = "yes";
                else
                    $photo_background = "no";
                
                $background_color = Input::get('background_color');
                $photo_background_color = Input::get('photo_background_color');
                
                $include_avatar = Input::get('include_avatar');
                if($include_avatar )
                    $include_avatar = "yes";  
                else 
                    $include_avatar = "no";
                
                $include_name = Input::get('include_name');
                if($include_name)
                    $include_name = "yes";              
                else
                    $include_name = "no";
                
                $include_likes = Input::get('include_likes');
                if($include_likes)
                    $include_likes = "yes";
                else
                    $include_likes = "no";
                
                $include_comments = Input::get('include_comments');
                if($include_comments)
                    $include_comments = "yes";
                else
                    $include_comments = "no";
                $include_caption = Input::get('include_caption');
                if($include_caption)
                    $include_caption = "yes";                  
                else
                    $include_caption = "no";
                
                $photo_size = Input::get('photo_size');
                $grid_row = Input::get('grid_row');
                $grid_column = Input::get('grid_column');
                $animation_preset = Input::get('animation_preset');
                $animation_speed = Input::get('animation_speed');
                $user_id = Session::get('user_id');
                $preset_name = Input::get('preset_name');
          
                $already_preset = \DB::table('user_preset')
                                    ->where('user_id', '=', $user_id)
                                    ->where('preset_name', '=', $preset_name)
                                    ->count();
                if($already_preset > 0){
                    $ajax_response = array('success' => false , 'message' => '<p>You already have a preset with the name of "'.$preset_name.'"</p>');
                    return $ajax_response;                        
                }else{
                    $preset_logo = \DB::table('temp_preset_logo')
                                        ->orderBy('id', 'desc')
                                        ->where('user_id', '=', $user_id)
                                        ->get();
                    $logoname = "";
                    if(count($preset_logo) > 0)
                        $logoname = $preset_logo[0]-> file_name ;
                    
                    $insert_data = array('preset_name' => $preset_name, 'user_id' => $user_id , 'font_id' => $font , 'font_size_id' => $font_size , 'location_id' =>$location , 
                            'font_color' => $font_color , 'background_color' => $background_color , 'branding' => $branding , 'glow_shadow_effect' => $glow_shadow_effect ,
                            'effect_color' => $effect_color , 'photo_background' => $photo_background , 'photo_background_color' => $photo_background_color , 'include_avatar' => $include_avatar ,
                            'include_name' => $include_name , 'include_likes' => $include_likes , 'include_comments' => $include_comments , 'include_caption' => $include_caption,
                            'photo_size_id' => $photo_size , 'grid_row' => $grid_row , 'grid_column' => $grid_column , 'animation_preset_id' => $animation_preset ,
                            'animation_speed_id' => $animation_speed, 'logo' => $logoname); 

                    $id = \DB::table('user_preset')->insertGetId($insert_data);  
                    $ajax_response = array('success' => true , 'id' => $id , 'message' => '<p>Preset added successfully</p>');
                    return $ajax_response; 
                }
            }
        }
        public function get_preset(){
            if(Request::ajax()){
                $user_id = Session::get('user_id');
                $user_presets = \DB::table('user_preset')
                                ->orderBy('user_preset_id', 'desc')
                                ->having('user_id', '=', $user_id)
                                ->get();
                $preset = array();
                $id = 0;
                foreach($user_presets as $pre){
                    $preset[$id]['id'] = $pre->user_preset_id;
                    $preset[$id]['name'] = $pre->preset_name;
                    $id++;
                }
                $ajax_response = array('preset' => $preset);
                return $ajax_response;
            }
        }
        /*
         * Ajax function to delete a preset 
         */
        public function delete_preset(){
            if(Request::ajax()){
                $user_preset_id = Input::get('user_preset_id');
                \DB::table('user_preset')->where('user_preset_id', '=', $user_preset_id)->delete();
                $ajax_response = array('success' => true , 'message' => '<p>Preset deleted successfully!</p>');
                return $ajax_response;
            }
        }
        public function manage_board(){
            //breadcrumbs
            $this->_data['breadcrumb']              = array(
                    'count' => 2,    
                    'data'  => array(
                        0 => array('lable' => 'Manage Boards', 'link' => '', 'icon' => 'film'),

                    )
            );                
            $appearance_location = \DB::table('appearance_location')->get();
            $this->_data['locations'] = $appearance_location; 

            $appearance_font = \DB::table('appearance_font')->get();
            $this->_data['fonts'] = $appearance_font; 

            $font_sizes = \DB::table('appearance_font_size')->get();
            $this->_data['sizes'] = $font_sizes;                

            $photo_size = \DB::table('photo_size')->get();
            $this->_data['photo_sizes'] = $photo_size;                

            $animation_presets = \DB::table('animation_preset')->get();
            $this->_data['presets'] = $animation_presets;  

            $animation_speed = \DB::table('animation_speed')->get();
            $this->_data['speeds'] = $animation_speed;     
            //general data
            $this->_data['page_title']              = 'Manage Boards';
            $this->_data['content_main_heading']    = 'Manage Boards';
            $this->_data['content_help_line']       = '';         
            return View::make('front.boards.list',$this->_data);
        }
        public function get_manage_board_data(){
            $user_id = Session::get('user_id');
            $data = \DB::table('board')
                ->where('board.user_id','=',$user_id)
                ->join('board_privacy', 'board.board_id', '=', 'board_privacy.board_id')
                ->join('user_preset', 'board.user_preset_id', '=', 'user_preset.user_preset_id')
                ->join('package', 'board.package_id', '=', 'package.package_id')
                ->select('board.board_id', 'package.name', 'board.tag') ->get();
            return $data;
        }
        public function save_board_board(){
            if(Request::ajax()){
                 $board_id = Input::get('board_id_setting');
                 $control = Input::get('control');
                 $lock_down = Input::get('lock_down');
                 if($control)
                     $control = "yes";
                 else
                     $control = "no";
                 
                 if($lock_down)
                     $lock_down = "yes";
                 else
                     $lock_down = "no";
                 \DB::table('board')->where('board_id' , $board_id)->update(array('control' => $control , 'lock_down' => $lock_down));
                 $ajax_response = array('success' => true , 'message' => '<p>Settings updated!</p>');
                 return Response::json($ajax_response);      
            }
        }
        public function view_board(){
            if (Request::ajax()){
                $board_id = Input::get('board_id');
                $data = \DB::table('board')
                    ->where('board.board_id','=',$board_id)
                    ->join('board_privacy', 'board.board_id', '=', 'board_privacy.board_id')
                    ->join('user_preset', 'board.user_preset_id', '=', 'user_preset.user_preset_id')
                        
                    ->join('appearance_font', 'appearance_font.id', '=', 'user_preset.font_id')     
                    ->join('appearance_font_size', 'appearance_font_size.id', '=', 'user_preset.font_size_id')     
                    ->join('appearance_location', 'appearance_location.id', '=', 'user_preset.location_id')     

                    ->join('animation_preset', 'animation_preset.id', '=', 'user_preset.animation_preset_id')     
                    ->join('photo_size', 'photo_size.id', '=', 'user_preset.photo_size_id')     
                    ->join('animation_speed', 'animation_speed.id', '=', 'user_preset.animation_speed_id')     
                       
                        
                        
                    ->join('package', 'board.package_id', '=', 'package.package_id')
                    ->select('*', 'appearance_font.name as font_name', 'appearance_font_size.name as font_size' , 'appearance_location.name as location_name',
                            'animation_preset.name as animation_name' ,
                            'photo_size.name as photo_size_name' ,
                            'animation_speed.name as animation_speed_name'
                            )->get();
                return $data;                
            }
        }
        public function delete_board(){
            if (Request::ajax()){   
                $board_id = Input::get('board_id');
               \DB::table('board')->where('board_id', '=' , $board_id)->delete();
            }
        }
        public function authenticate(){
            if (Request::ajax()){
                $input = Input::all();
                $email = Input::get('email');
                $password = Hash::make(Input::get('password'));
                $user= \User::where('email' , $email)->first();
                if($email == "" && Input::get('password') == ""){
                    $ajax_response = array('success' => false , 'errors' => array('email' =>'Enter your email','password' => 'Enter password'));
                    return Response::json($ajax_response);    
                }
                else if(count($user) == 0){
                    $ajax_response = array('success' => false , 'errors' => array('email' =>'Invalid email'));
                    return Response::json($ajax_response);    
                }else{
                    if(Hash::check($password, $user->password)){
                        $ajax_response = array('success' => false , 'errors' => array('password' =>'Invalid Password'));
                        return Response::json($ajax_response);    
                    }else{
                        Session::put('user_id', $user->user_id);
                        Session::put('first_name', $user->first_name);
                        Session::put('last_name', $user->last_name);
                        Session::put('email', $user->email);
                        Session::put('logged_in', true);    
                        $ajax_response = array('success' => true , 'message' => '<p>You are successfully validated!</p>');
                        return Response::json($ajax_response);                           
                    }
                }
                
                
            }
        }

        public function save()
	{       
                //validation rules
		$rules = $this -> _validation_rules;
                
		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);
                
                // Create new ajax validation response creator instance.
                $objAjaxValidationResponseCreator   = New AjaxValidationResponseCreator();
                
                if ($validator->fails()){
                    
                        $errors  = $validator -> messages() -> toArray();
                        $objAjaxValidationResponseCreator   -> setStatus('error');
                        $objAjaxValidationResponseCreator   -> setErrors($errors);
                }else{
                
                    try {

                        //First save as user                                        
                        $user = Sentry::createUser(array(
                             'email'       => Input::get('email'),
                             'password'    => Hash::make(Input::get('password')),
                             'first_name'  => Input::get('first_name'),
                             'last_name'   => Input::get('last_name'),   
                        ));
                                                
                        // Assign Group to new user
                        //$group  = Sentry::findGroupByName('user');
                        //$user  -> addGroup($group);
                        
                        $inputs     =   Input::all();
                        
                                               
                        //Create Address Instance and save address
                        $physicalAddress                    = new PhysicalAddress();
                        $physicalAddress  -> line1          = (isset($inputs['physical_address_line1']))?$inputs['physical_address_line1']:'';
                        $physicalAddress  -> line2          = (isset($inputs['physical_address_line2']))?$inputs['physical_address_line2']:'';
                        $physicalAddress  -> line3          = (isset($inputs['physical_address_line3']))?$inputs['physical_address_line3']:'';
                        $physicalAddress  -> line4          = (isset($inputs['physical_address_line4']))?$inputs['physical_address_line4']:'';
                        $physicalAddress  -> line5          = (isset($inputs['physical_address_line5']))?$inputs['physical_address_line5']:'';
                        $physicalAddress  -> city           = (isset($inputs['physical_address_city']))?$inputs['physical_address_city']:'';
                        $physicalAddress  -> state          = (isset($inputs['physical_address_state']))?$inputs['physical_address_state']:'';
                        $physicalAddress  -> country        = (isset($inputs['physical_address_country']))?$inputs['physical_address_country']:'';
                        $physicalAddress  -> postal_code    = (isset($inputs['physical_address_postal_code']))?$inputs['physical_address_postal_code']:'';
                        $physicalAddress  -> save();


                        //Create contact information Instance and save contact details
                        $contactInformation                = new ContactInformation;
                        $contactInformation  -> telephone  = (isset($inputs['contact_telephone']))?$inputs['contact_telephone']:'';
                        $contactInformation  -> mobile     = (isset($inputs['contact_mobile']))?$inputs['contact_mobile']:'';
                        $contactInformation  -> email      = (isset($inputs['contact_email']))?$inputs['contact_email']:'';
                        $contactInformation  -> website    = (isset($inputs['contact_website']))?$inputs['contact_website']:'';
                        $contactInformation  ->  save();

                        //create detail object 
                        $objUserDetail  = New UserDetail();
                        //save user add detail in db for user.
                        $userDetailId   = $objUserDetail -> add($user -> id, $contactInformation['id'], $physicalAddress['id'] );

                        InstagramDatabaseHandler::addAccount(
                                                    array(
                                                        'access_token' => $inputs['ig_access_token'],
                                                        'user_id' => $inputs['ig_id'],
                                                    ), $userDetailId);
                        

                    }

                    catch (\Cartalyst\Sentry\Users\LoginRequiredException $e){
                        $this->messageBag->add('email', 'Login field is required.'); 
                        $objAjaxValidationResponseCreator   -> setStatus('error');
                    }
                    catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e){
                        $this->messageBag->add('email', 'Password field is required.'); 
                        $objAjaxValidationResponseCreator   -> setStatus('error');
                    }
                    catch (\Cartalyst\Sentry\Users\UserExistsException $e){
                        $this->messageBag->add('email', 'User with email already exists.'); 
                        $objAjaxValidationResponseCreator   -> setStatus('error');
                    }
                    
                }
                
                return $objAjaxValidationResponseCreator -> generateResponse();
                
                
        }
        
       
        
}
