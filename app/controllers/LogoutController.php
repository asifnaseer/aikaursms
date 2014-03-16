<?php 
class LogoutController extends BaseController {
    protected $_data = array();
    public function __construct() {

        parent::__construct();
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }

}
