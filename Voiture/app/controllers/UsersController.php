<?php
use Voiture\Managers\RegisterManager;
use Voiture\Repositories\JoueurRepo;
use Voiture\Repositories\RoleRepo;
class UsersController extends BaseController {


	protected $joueurRepo;
	protected $roleRepo;

	public function __construct(JoueurRepo $joueurRepo,
								RoleRepo  $roleRepo)
	{
		$this->joueurRepo = $joueurRepo;
		$this->roleRepo  = $roleRepo;
	}
	//Metodo para mostrar la vista de registrarse
	public function signUp()
	{
		return View::make('users/sign-up');
	}

	//Metodo para registrar a un usuario, a través de una petición POST
	public function register()
	{
		$user     = $this->joueurRepo->newJoueur();
		$manager  = new RegisterManager($user, Input::all());

		$manager->save();

		return Redirect::route('home');

	}

}
