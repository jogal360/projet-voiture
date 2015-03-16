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
Route::pattern('id', '[0-9]+');
Route::pattern('layout', '[0-9]+');

//Ruta para mostrar el home
Route::get('/', [
    'as'=> 'home',
    'uses' => 'HomeController@showIndex']);

//Grupo para especificar las rutas disponibles cuando no esta logueado
Route::group(['before'=>'guest'], function(){
    //Ruta para registrar un usuario
    Route::get('sign-up', [
        'as' => 'sign_up',
        'uses' => 'UsersController@signUp']);

    //Ruta para enviar los datos de registro
    Route::post('sign-up', [
        'as' => 'register',
        'uses' => 'UsersController@register']);

    //Ruta para confirmar el registro por mail
    Route::get('register/verify/{confirmationCode}', [
        'as' => 'confirmation_path',
        'uses' => 'UsersController@confirm']);

    //Ruta para iniciar sesión
    Route::post('login', [
        'as' => 'login',
        'uses' => 'AuthController@loginAdmin']);
});


// Grupo para el superAdmin
Route::group(['before' => 'isSuperAdmin'], function(){

    Route::get('home/s-admin' , [
        'as' => 'home-admin',
        'uses' => 'SuperAdminController@loginSAdmin'
    ]);
    Route::post('home/s-admin/{something?}' , [
        'as' => 'home-admin-post',
        'uses' => 'UsersController@search'
    ]);


});


//Grupo para Specialist
Route::group(['before' => 'isSpecialist'], function(){
    Route::get('control/panel-admin/specialist' , ['as' => 'specialist', 'uses' => 'AuthController@loginSpecialist']);
});

//Creamos un nuevo grupo y evaluamos que esten disponibles solo si se está conectado
Route::group(['before'=> 'auth'],function() {

    Route::group(['before' => 'csrf'], function(){

        //Post para la busqueda
        Route::post('list/search' , [
            'as' => 'search-user',
            'uses' => 'UsersController@search'
        ]);
        Route::post('home/s-admin' , [
            'as' => 'home-admin-post',
            'uses' => 'usersController@detailUser'
        ]);
        Route::post('users/detail',[
            'as' => 'user-detail',
            'uses' => 'UsersController@detailUser']);

        Route::post('users/edit',[
            'as' => 'user-edit-post',
            'uses' => 'UsersController@editUser']);
        Route::post('users/list/delete', [
            'as'    => 'delete-user',
            'uses'  => 'UsersController@deleteUser'
        ]);
        Route::post('users/list/{sortby?}/{order?}' , [
            'as'    => 'list_users-post',
            'uses'  => 'UsersController@deleteUser'
        ]);

    });
    //Para mostrar la lista de usuarios
    Route::get('users/list/{sortby?}/{order?}' , [
        'as'    => 'list_users',
        'uses'  => 'UsersController@listUsers'
    ]);

    //Ruta para cerrar sesión
    Route::get('logout',[
        'as' => 'logout',
        'uses' => 'AuthController@logout']);


    Route::get('users/edit/{id}', [
        'as'    => 'user-edit',
        'uses'  => 'UsersController@editUser'
    ]);


    Route::put('users/detail',[
        'as'    => 'update_user',
        'uses'  => 'UsersController@updateProfil'
    ]);



});
Route::group(['before' => 'isModerateurCommunaute'], function(){
    //Para el inicio de sesion
    Route::get('mod-communaute' , [
        'as' => 'mod-com',
        'uses' => 'ModerateurController@loginModerateur'
    ]);


}); //End groupMod
