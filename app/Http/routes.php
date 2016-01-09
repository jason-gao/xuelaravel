<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('pages/{id}', 'PagesController@show');

//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
	Route::get('/', 'AdminHomeController@index');
	Route::resource('pages', 'PagesController');
	Route::resource('comments', 'CommentsController');
	Route::resource('articles', 'ArticlesController');
});

Route::post('comment/store', 'CommentsController@store');

//articles 前台
Route::get('/articles', 'ArticlesController@index');
Route::get('/articles/{id}', 'ArticlesController@show');


//captcha
Route::any('captcha-test', function()
{
	if (Request::getMethod() == 'POST')
	{
		$rules = ['captcha' => 'required|captcha'];
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails())
		{
			echo '<p style="color: #ff0000;">Incorrect!</p>';
		}
		else
		{
			echo '<p style="color: #00ff30;">Matched :)</p>';
		}
	}

	$form = '<form method="post" action="captcha-test">';
	$form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
	$form .= '<p>' . captcha_img('mini') . '</p>';
	$form .= '<p><input type="text" name="captcha"></p>';
	$form .= '<p><button type="submit" name="check">Check</button></p>';
	$form .= '</form>';
	return $form;
});