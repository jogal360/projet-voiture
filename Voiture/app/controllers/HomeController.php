<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showIndex()
	{

		//Config::set('database.connections.mysql.username' , 'user');
		//Config::set('database.connections.mysql.password' , '123');
		//$connex = Config::get('database.connections.'.$nmgest);
		//dd(Config::get('database.connections.mysql'));




		return View::make('home');
	}

}
