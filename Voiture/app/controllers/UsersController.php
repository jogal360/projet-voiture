<?php
use Voiture\Managers\RegisterManager;
use Voiture\Repositories\JoueurRepo;
use Voiture\Repositories\RoleRepo;
use Voiture\Repositories\UsersRepo;
use Voiture\Entities\User;
class UsersController extends BaseController {


	protected $joueurRepo;
	protected $roleRepo;
    protected $usersRepo;

	public function __construct(JoueurRepo $joueurRepo,
								RoleRepo  $roleRepo, UsersRepo $usersRepo)
	{
		$this->joueurRepo = $joueurRepo;
		$this->roleRepo  = $roleRepo;
        $this->usersRepo  = $usersRepo;
	}
	//Metodo para mostrar la vista de registrarse
	public function signUp()
	{
		return View::make('users/sign-up');
	}

	//Metodo para registrar a un usuario, a través de una petición POST
	public function register()
	{
		$confirmation_code = str_random(30);
		$user     = $this->joueurRepo->newJoueur($confirmation_code);
		$manager  = new RegisterManager($user, Input::all());
		$manager->save();

		Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function($message) {
			$message->to(Input::get('email'), Input::get('nom').' '.Input::get('prenom'))
				->subject('Verify your email address');
		});

		Flash::overlay('Thanks for signing up! Please check your email.!', 'Success!');


		return Redirect::route('home');

	}
	/*
	 * Metodo para confirmar el registro por correo
	 * @params confirmation_code String
	 */
	public function confirm($confirmation_code)
	{
		//If para ver si no se incluye un numero en la ruta
		if( ! $confirmation_code)
		{
			Flash::info('No Data');
			return Redirect::route('home');
		}
		//Se recupera un user con el codigo de confirmacion dado
		$user = User::where('confirmation_code','=' ,$confirmation_code)->first();

		//Si no hay ningun usuario con ese codigo
		if ( ! $user)
		{
			Flash::overlay('URL Invalide ou compte verfified!', 'Information incorrecte!');
			return Redirect::route('home');
		}
		//Se pone como verificado y se limpia el codigo de confirmación
		$user->verified = 1;
		$user->confirmation_code = null;
		$user->save();
		$full_user = $user->prenom . ' ' .$user->nom;
		$email = $user->email;
		Mail::send('emails.confirmate', ['user' => $full_user], function($message) use($full_user, $email)  {
			$message->to($email, $full_user)
				->subject('Compte activé');
		});

		Flash::overlay('Thanks for confirmate your account! Now you can log in!', 'Registered!');

		return Redirect::route('home');
	}

}
