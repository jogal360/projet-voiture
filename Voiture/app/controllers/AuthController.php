<?php
use Voiture\Repositories\JoueurRepo;

class AuthController extends BaseController {

	protected $joueurRepo;

	public function __construct(JoueurRepo $joueurRepo)
	{
		$this->joueurRepo = $joueurRepo;
	}
	//Metodo para logearse
	public function login()
	{
		$data = Input::only('email','password','remember');
		$credentials = ['email'=>$data['email'],'password'=>$data['password']];
		$mail = $this->joueurRepo->checkMail($data['email']);
		//Si no hay ningun usuario con ese codigo
		if ( ! $mail)
		{
			return Redirect::back()->with('login_error',1);
		}

		$attemps 			= $mail->number_attemps; //0
		$numberAttempsRest  = 3 - $attemps ;		//3



		if($numberAttempsRest == 0)
		{
			$dateActual = new DateTime();
			$datePlusFiveMinuts = $dateActual -> add(new DateInterval('PT5M'));

			$mail->updated_at = $datePlusFiveMinuts;
			$mail->number_attemps = null;
			$mail->save();
			Flash::error('<p class="cent"><i class="glyphicon glyphicon-remove"></i><b> Tu cuenta ha sido bloqueada por cinco minutos intenta mas tarde!</b></p>');
			return Redirect::back()->with('login_error_attemps',1);
		}
		else
		{
			if($mail->updated_at > new DateTime())
			{
				Flash::overlay('Debes de esperar para conectarte', 'Intentos excedidos!');
				return Redirect::route('home');;
			}
			else
			{
				if(Auth::attempt($credentials, $data['remember']))
				{
					Auth::user()->updated_at = new DateTime();
					Auth::user()->number_attemps = null;
					Auth::user()->save();
					return Redirect::route('home');
				}
				else
				{
					$mail->number_attemps = $attemps + 1;
					$mail->save();
					Flash::error('<p class="cent"><i class="glyphicon glyphicon-remove"></i><b> Error te quedan '.$numberAttempsRest.' intento(s)!</b></p>');
					return Redirect::back()->with('login_error_attemps',1);
				}
			}
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::route('home');
	}
}
