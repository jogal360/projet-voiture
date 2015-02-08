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

//Ruta para mostrar el home
Route::get('/', ['as'=> 'home','uses' => 'HomeController@showIndex']);

//Grupo para especificar las rutas disponibles cuando no esta logueado
Route::group(['before'=>'guest'], function(){
	//Ruta para registrar un usuario
	Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersControllers@signUp']);

	//Ruta para mostrar una vez que se ha registrado
	Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersControllers@register']);

	//Ruta para iniciar sesión
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
});


//Ruta para iniciar sesión
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);
