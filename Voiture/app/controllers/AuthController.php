<?php
use Voiture\Repositories\JoueurRepo;
use Voiture\Repositories\AdminsRepo;
use Voiture\Repositories\UsersRepo;

class AuthController extends BaseController {

	protected $joueurRepo;
	protected $adminsRepo;
    protected $usersRepo;

	public function __construct(JoueurRepo $joueurRepo, AdminsRepo $adminsRepo, UsersRepo $usersRepo)
	{
		$this->joueurRepo = $joueurRepo;
		$this->adminsRepo = $adminsRepo;
        $this->usersRepo = $usersRepo;
	}
	//Metodo para logearse
	public function loginAdmin()
	{
		//dd('ctm');
		$data = Input::only('user','password','remember');
		$pseudo_login = $data['user'];
		$pwd_login = $data['password'];
		$credentials = ['pseudo'=> $pseudo_login,'password'=>$pwd_login]; //prenom -> user

		$resultateUser = $this->adminsRepo->pseudoValid($pseudo_login);
		//Si no hay ningun usuario con ese codigo

		if ( ! $resultateUser)
		{
			return Redirect::back()->with('login_error',1);
		}
//		//else
//		$attemps 			= $mail->number_attemps; //0
//		$numberAttempsRest  = 3 - $attemps ;		//3
//
//
//		if($numberAttempsRest == 0)
//		{
//			$dateActual = new DateTime();
//			$datePlusFiveMinuts = $dateActual -> add(new DateInterval('PT5M'));
//
//			$mail->updated_at = $datePlusFiveMinuts;
//			$mail->number_attemps = null;
//			$mail->save();
//			Flash::error('<p class="cent"><i class="glyphicon glyphicon-remove"></i><b> Tu cuenta ha sido bloqueada por cinco minutos intenta mas tarde!</b></p>');
//			return Redirect::back()->with('login_error_attemps',1);
//		}
//		else
//		{
//			if($mail->updated_at > new DateTime())
//			{
//				Flash::overlay('Debes de esperar para conectarte', 'Intentos excedidos!');
//				return Redirect::route('home');;
//			}
//			else
//			{

				if(Auth::attempt($credentials, $data['remember']))
				{
					$role = Auth::user()->role_id;
					$pwd = '';
					$userBD = '';
                    $route = '';
					switch ($role)
					{
						case 1 :
							$userBD = 'moderateur';
							$pwd = 'moderateur';
                            $route = 'mod-com';
							break;
						case 2 :
							$userBD = 'specialiste';
							$pwd = 'specialiste';
                            $route = 'specialist';
							break;
						case 3 :
							$userBD = 'admin_concours';
							$pwd = 'admin_concours';
							break;
						case 4 :
							$userBD = 'editorialiste';
							$pwd = 'editorialiste';
							break;
						case 5 :
							$userBD = 'client';
							$pwd = 'client';
							break;
                        case 7 :
                            $userBD = 'admin';
                            $pwd = 'adminpass';
                            $route = 'home-admin';
                            break;
                        case 8 :
                            $userBD = '';
                            $pwd = 'adminpass';
                            $route = 'home-admin';
                            break;
						default:
							return Redirect::back()->with('login_error',1);
					}
					setUserPwd($userBD, $pwd);
                    return Redirect::route($route);
				}
				else
				{
//					$mail->number_attemps = $attemps + 1;
//					$mail->save();
//					Flash::error('<p class="cent"><i class="glyphicon glyphicon-remove"></i><b> Error te quedan '.$numberAttempsRest.' intento(s)!</b></p>');
					return Redirect::back()->with('login_error',1);
				}
//			}
//		}
	}

    public function listUsers()
    {
        $dataUsers   = $this->usersRepo->getAllUsers();
        return View::make('moderateur-com/list-users',compact('dataUsers'));
    }
    public function loginSpecialist()
    {

        return View::make('specialist/home');
    }

	public function logout()
	{
		Auth::logout();
		setUserPwd('root', '');
		return Redirect::route('home');
	}

}
