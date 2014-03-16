<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
        |       To route to this controller, just add the route:
	|
	|	Route::get('login', 'LoginController@index');
	|
	*/

	public function index()
	{
            return View::make('admin.login');
	}
        
        
        /**
	 * Login form action to authentacate the user and send to appropriate panel.
	 *
	 * @return Response
         * @author Muratza A <murtaza.a@allshoreresources.com>
	 */
	public function authenticate()
	{       
                
                // Declare the rules for the form validation
		$rules = array(
                    'username'    => 'required|email',
                    'password'    => 'required|between:3,32',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails()){
                    return Redirect::back()->withInput()->withErrors($validator);
		}
            
                                	
                try {
                    
                    $credentials = array(
                        'email'    => Input::get('username'),
                        'password' => Input::get('password')
                    );
                    $user  = Sentry::authenticate($credentials, false);
                    $admin = Sentry::findGroupByName('Admin');
                    try {
                        if ($user && $user->inGroup($admin)) {
                            //Save session value for current user and redirect to the relevent page depending on user role.
                            Session::put('admin.email',$user->email);
                            Session::put('admin.name', $user->first_name . ' ' . $user->last_name );
                            Session::put('admin.login',true);
                            return Redirect::route('admin.dashboard');
                        } else {
                            throw new Exception("The field is undefined."); 
                        }
                    }
                    catch (Exception $e) {
                        $this->messageBag->add('username', 'User don\'t have the rights to perform action.');
                    }
                }
                
                catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                    $this->messageBag->add('username', Lang::get('validation.required'));
                }
                catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                    $this->messageBag->add('password', Lang::get('validation.required'));
                }
                catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                    $this->messageBag->add('password', Lang::get('validation.custom.password.wrong'));
                }
                catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                    $this->messageBag->add('username', Lang::get('validation.custom.username.not_found'));
                }
                catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                    $this->messageBag->add('username', Lang::get('validation.custom.username.not_activated'));
                }

                // The following is only required if throttle is enabled
                catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                    $this->messageBag->add('username', Lang::get('validation.custom.username.suspended'));
                }
                catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                    $this->messageBag->add('username', Lang::get('validation.custom.username.banned'));
                }
                
                //catch(\Exception $e)
                //{
                    //$error = $e->getMessage();
                //}
                //return Redirect::route('login')-> with('error' , $error);
                
                return Redirect::back()->withInput()->withErrors($this->messageBag);
	}
        
        public function logout()
	{
            Session::flush();
            return Redirect::route('login');
	}

}