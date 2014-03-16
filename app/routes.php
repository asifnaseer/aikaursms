<?php
Route::get('/', function(){
    return Redirect::to('branch/login');
});
Route::get('/logout',  array('as' => 'logout', 'uses' => 'LogoutController@logout'));

Route::group(array('prefix' => 'branch'), function(){
    Route::get('/login',  array('as' => 'branch.login', 'uses' => 'Branch\UsersController@login') );
    Route::post('/authenticate',  array('as' => 'branch.authenticate', 'uses' => 'Branch\UsersController@authenticate') );

    Route::group(array('before' => 'check.branch.user'), function(){
        Route::get('/dashboard', array('as' => 'branch.dashboard', 'uses' => 'Branch\UsersController@dashboard'));
        Route::get('/all-students', array('as' => 'branch.all.students', 'uses' => 'Branch\StudentsController@students'));
        Route::get('/all-banned-students', array('as' => 'branch.all.banned.students', 'uses' => 'Branch\StudentsController@banned_students'));
    });
});