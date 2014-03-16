<?php

class BaseController extends Controller {
        
        /**
	 * Message bag.
	 *
	 * @var Illuminate\Support\MessageBag
	 */
	protected $messageBag = null;

	/**
	 * Initializer.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// CSRF Protection
		$this->beforeFilter('csrf', array('on' => 'post'));

		//
		$this->messageBag = new Illuminate\Support\MessageBag;
                
                //echo Route::getCurrentRoute()->getAction();
	}
    
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}
        
        public function debugger($response){
       
            echo "<pre>"; 
                print_r($response);
            echo "</pre>";
        }

}