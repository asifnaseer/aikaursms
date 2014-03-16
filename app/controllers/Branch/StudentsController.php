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

class StudentsController extends BaseController {
    protected $_data = array();
    public function __construct() {

        parent::__construct();
    }

    public function students(){
        $this->_data['breadcrumb']              = array(
                'count' => 2,    
                'data'  => array(
                    0 => array('lable' => 'Students', 'link' => '', 'icon' => 'home'),

                )
        );
        //general data
        $this->_data['page_title']              = 'Students';
        $this->_data['content_main_heading']    = 'Students';
        $this->_data['content_help_line']       = '';            
        return View::make('branch.user.dashboard',$this->_data);
    }
    public function banned_students(){
        $this->_data['breadcrumb']              = array(
                'count' => 2,    
                'data'  => array(
                    0 => array('lable' => 'Banned Students', 'link' => '', 'icon' => 'home'),

                )
        );
        //general data
        $this->_data['page_title']              = 'Banned Students';
        $this->_data['content_main_heading']    = 'Banned Students';
        $this->_data['content_help_line']       = '';
        return View::make('branch.user.dashboard',$this->_data);
    }
}
