<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

    app_path().'/commands',
    app_path().'/controllers',
    app_path().'/models',
    app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
    Log::error($exception);
});

App::error(function(Voiture\Managers\ValidationException $e)
{
    return Redirect::back()->withInput()->withErrors($e->getErrors());
});
App::error(function(Symfony\Component\HttpKernel\Exception\HttpException $e)
{
    // Handle any HTTP exceptions thrown with App::abort() or from Laravel
    // for e.g. hitting a missing route
    $author = Auth::user()->role_id;
    if(! $author)
    {
        Session::flush();
        return Redirect::route('home');
    }
    $page = '';
    switch ($author)
    {
        case 1:
            $page = "mod-com";
            break;
        default:
            $page = "home";
    }
    $code = $e->getStatusCode();

    switch ($code)
    {
        case 403:
            return "dah";//Response::view('errors/403', array(), 403);

        case 500:
            return "500"; //Response::view('errors/500', array(), 500);

        default:
            return Response::view('errors/notFound404', array('page'=>$page), $code);
    }
});
/*
App::error(function(PDOException $exception)
{
    Session::flush();
    Log::error("Error connecting to database: ".$exception->getMessage());
    //return 'Sorry! Something is wrong with this account!';
    setUserPwd('root','');
    Flash::overlay('Sorry! You not have privileges for do this! :(', 'Forbidden!');
    return Redirect::route('home');
    //return Redirect::back()->with('login_error_attemps',1);
});
App::error(function(ErrorException $exception)
{
    Session::flush();
    setUserPwd('root','');
    if (strpos($exception->getMessage(),'SQLSTATE[HY000] [1044]') !== false)
    {
        Log::error("Error connecting to database: ".$exception->getMessage());
        //return 'Sorry! Something is wrong with this account!';
        Flash::overlay('Sorry!! You not have privileges for do this! :(', 'Forbidden!');
        return Redirect::route('home');
        //return Redirect::back()->with('login_error_attemps',1);
    }
    else
    {
        Flash::overlay('Error inconnu');
        return Redirect::route('home');
    }
});
*/

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
    return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';


//require app_path().'/Voiture/Composers/HomeModerateurComposer.php';

function changeModel($model_name, $table)
{

}
function setUserPwd($user, $pwd)
{
    $nameUser = $user;
    $password = $pwd;

    $arr = Config::get('database');
    $arr['connections']['mysql']['username'] = $nameUser;
    $arr['connections']['mysql']['password'] = $password;
    //$ar = "return " + $arr;
    $data = var_export($arr, 1);
    File::put(app_path() . '/config/database.php', "<?php\n return \n $data ;");



    //Config::set('database.connections.mysql.username' , $nameUser);
    //Config::set('database.connections.mysql.password' , $password);
    //DB::reconnect('mysql');
    //DB::setDefaultConnection('mysql');

    //$connex = Config::get('database.connections.'.$nmgest);
    //dd(Config::get('database.connections.mysql'));
}
function isModCom()
{
    if( Auth::check())
    {
        if(Auth::user()->role_id == 1)
        {
            return true;
        }
    }
    return false;
}
function isSAdmin()
{
    if( Auth::check())
    {
        if(Auth::user()->role_id == 7)
        {
            return true;
        }
    }
    return false;
}
function isSpecialist()
{
    if( Auth::check())
    {
        if(Auth::user()->role_id == 2)
        {
            return true;
        }
    }
    return false;
}
