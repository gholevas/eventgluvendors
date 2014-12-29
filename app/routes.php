<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'admin'), function () {

	//All basic routes defined here
	Route::get('signin', array('as' => 'signin','uses' => 'AuthController@getSignin'));
	Route::post('signin','AuthController@postSignin');
	Route::post('signup',array('as' => 'signup','uses' => 'AuthController@postSignup'));
	Route::post('forgot-password',array('as' => 'forgot-password','uses' => 'AuthController@postForgotPassword'));
	Route::get('login2', function () {
	    return View::make('admin/login2');
	});
	# Forgot Password Confirmation
    Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
    Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	Route::get('logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));

	Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));

	# User Management
    Route::group(array('prefix' => 'users'), function () {
    	Route::get('/', array('as' => 'users', 'uses' => 'UsersController@getIndex'));
    	Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@getDelete'));
		Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
		Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
	});
	Route::get('deleted_users',array('as' => 'deleted_users', 'uses' => 'UsersController@getDeletedUsers'));

	# Group Management
    Route::group(array('prefix' => 'groups'), function () {
        Route::get('/', array('as' => 'groups', 'uses' => 'GroupsController@getIndex'));
        Route::get('create', array('as' => 'create/group', 'uses' => 'GroupsController@getCreate'));
        Route::post('create', 'GroupsController@postCreate');
        Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'GroupsController@getEdit'));
        Route::post('{groupId}/edit', 'GroupsController@postEdit');
        Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'GroupsController@getDelete'));
        Route::get('{groupId}/confirm-delete', array('as' => 'confirm-delete/group', 'uses' => 'GroupsController@getModalDelete'));
        Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'GroupsController@getRestore'));
    });	



	// OUR EDITS BEGIN HERE

    Route::filter('Sentry', function()
    {
    	if (!Sentry::check())
    	{
    		return Redirect::to('/admin/login');
    	}
    });

    Route::filter('Sentry_json', function()
    {
    	if (!Sentry::check())
    	{
			return Response::json(array(
				'error'    => 400,
				'message'  => 'You must be logged in'
				),
				400
			);
    	}
    });

	Route::group(array('before' => 'Sentry_json'), function()
	{
		Route::group(array('prefix' => 'json'), function()
		{
			Route::group(array('prefix' => 'todo'), function()
			{
				require('routes/json_todo.php');
			});

			Route::group(array('prefix' => 'clients'), function()
			{
				require('routes/json_clients.php');
			});

			Route::group(array('prefix' => 'event_notes'), function()
			{
				require('routes/json_event_notes.php');
			});
			
			Route::group(array('prefix' => 'events'), function()
			{
				require('routes/json_events.php');
			});

			Route::group(array('prefix' => 'pricing'), function()
			{
				require('routes/json_pricing.php');
			});

			Route::group(array('prefix' => 'calendar'), function()
			{
				require('routes/json_calendar.php');
			});
		});
	});


	Route::group(array('before' => 'Sentry'), function()
	{
		Route::get('/', function()
		{
			return Redirect::to('admin/index');
		});

		require('routes/index_route.php');
		require('routes/calendar_route.php');
		require('routes/events_route.php');
		require('routes/event_route.php');
	});

	// OUR EDITS END HERE


	//Remaining pages will be called from below controller method
	//in real world scenario, you may be required to define all routes manually
	Route::get('{name?}', 'JoshController@showView');
	
}); 
