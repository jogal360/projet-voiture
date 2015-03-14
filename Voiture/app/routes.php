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
    Route::get('sign-up', ['as' => 'sign_up', 'uses' => 'UsersController@signUp']);

    //Ruta para enviar los datos de registro
    Route::post('sign-up', ['as' => 'register', 'uses' => 'UsersController@register']);

    //Ruta para confirmar el registro por mail
    Route::get('register/verify/{confirmationCode}', ['as' => 'confirmation_path', 'uses' => 'UsersController@confirm']);

    //Ruta para iniciar sesión
    Route::post('login', ['as' => 'login', 'uses' => 'AuthController@loginAdmin']);
});
// Grupo para moderador de comunidad
Route::group(['before' => 'isModerateurCommunaute'], function(){
    Route::get('control/panel-admin/mod-communaute' , ['as' => 'mod-com', 'uses' => 'AuthController@loginModCom']);

    Route::get('control/panel-admin/mod-communaute/users' , ['as' => 'list_users', 'uses' => 'ModerateurController@listUsers']);

    Route::post('control/panel-admin/mod-communaute/users/detail',['as' => 'user-detail', 'uses' => 'ModerateurController@detailUser']);

    Route::post('control/panel-admin/mod-communaute/users/edit',['as' => 'user-detail', 'uses' => 'ModerateurController@editUser']);
});

//Grupo para Specialist
Route::group(['before' => 'isSpecialist'], function(){
    Route::get('control/panel-admin/specialist' , ['as' => 'specialist', 'uses' => 'AuthController@loginSpecialist']);
});
//Creamos un nuevo grupo y evaluamos que esten disponibles solo si se está conectado
Route::group(['before'=> 'auth'],function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('layout', '[0-9]+');
    //Ruta para cerrar sesión
    Route::get('logout',['as' => 'logout', 'uses' => 'AuthController@logout']);

});
Route::group(['before' => 'isModerateurCommunaute'], function(){
    Route::get('control/panel-admin/mod-communaute' , ['as' => 'mod-com', 'uses' => 'AuthController@loginModCom']);
    Route::get('control/panel-admin/mod-communaute/users' , ['as' => 'list_users', 'uses' => 'ModerateurController@listUsers']);
    Route::get('control/panel-admin/mod-communaute/users/edit/{id}',['as' => 'user-edit', 'uses' => 'ModerateurController@editUser']);
});
Route::group(['before' => 'csrf'], function(){
// Grupo para moderador de comunidad
    Route::group(['before' => 'isModerateurCommunaute'], function(){


        Route::post('control/panel-admin/mod-communaute/users/detail',['as' => 'user-detail', 'uses' => 'ModerateurController@detailUser']);

        Route::put('control/panel-admin/mod-communaute/users/detail',['as' => 'update_user', 'uses' => 'ModerateurController@updateProfil']);


    });

});