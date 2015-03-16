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
    public function listUsers($sortby=null , $order = null)
    {
        $dataUsers   = $this->usersRepo->getAllUsers();
        $users= '';

        $sortbyP = $sortby;
        $orderP = $order;
        $search = false;
        if ($sortby  && $order )
        {
            $dataUsers = $this->usersRepo->orderBy($sortby, $order);
        } else {
            $dataUsers =  $dataUsers;
        }

        $usr = Auth::user()->role_id;
        switch($usr)
        {
            case 1 :
                $entity = "mod";
                $extends = 'moderateur-com/home-mod';

                break;
            case 7:
                $entity = "sadmin";
                $extends = 'superadmin/home-admin';
        }

        return View::make('users/list-users',compact('dataUsers', 'entity','sortbyP', 'orderP','search','extends'));
    }
    public function search()
    {
        $method = Input::get('method');
        $value = Input::get('data');
        $results = '';
        $response = '';
        if(Input::has('all'))
        {
            $sortbyP = null;
            $orderP = null;
            $dataUsers = $this->usersRepo->resultsSearchAll($method, $value);
            $usr = Auth::user()->role_id;
            switch($usr)
            {
                case 1 :
                    $entity = "mod";
                    $extends = 'moderateur-com.home-mod';

                    break;
                case 7:
                    $entity = "sadmin";
                    $extends = 'superadmin.home-admin';

            }
            $search= true;
            $page = View::make('users/list-users',compact('dataUsers', 'entity','extends','sortbyP', 'orderP','search'));
            $view = $page->renderSections()['contentmod'];
            return Response::json(array('success'=>true, 'result'=>$view));
        }
        else
        {
            if($method == "prenom")
            {
                $results = $this->usersRepo->resultsSearch("prenom", $value);
            }
            elseif($method == "nom")
            {
                $results = $this->usersRepo->resultsSearch("nom", $value);
            }
            elseif($method == "email")
            {
                $results = $this->usersRepo->resultsSearch("email", $value);
            }
            if($method == 'nom')
            {
                foreach($results as $result)
                {
                    $response .= "<a class='list-group-item' data='$result->nom' id='$result->id'>".$result->nom."</a>";
                }
            }
            elseif($method == 'prenom')
            {
                foreach($results as $result)
                {
                    $response .= "<a class='list-group-item' data='$result->prenom' id='$result->id'>".$result->prenom."</a>";
                }
            }
            elseif($method == 'email')
            {
                foreach($results as $result)
                {
                    $response .= "<a class='list-group-item' data='$result->email' id='$result->id'>$result->email</a>";
                }
            }
        }
        return Response::json(array('succ'=>true, 'result'=>$response));
    }
    public function detailUser()
    {
        $id = Input::get('id');
        $user = $this->usersRepo->getAUser($id);
        return View::make('users/detail-user',compact('user'));
    }
    public function editUser($id)
    {
        $id = $id;
        $user = $this->usersRepo->getAUser($id);
        $sexe  = \Lang::get('utils.sex');
        return View::make('users/update-user',compact('user','sexe'));

    }
    public function updateProfil()
    {
        $id     = Input::get('id');
        $data = Input::all();
        $user  = $this->usersRepo->getAUser($id);
        $manager  = new AccountManager($user, Input::all());
        $manager->save();

        return Redirect::route('list_users');
    }
    public function deleteUser()
    {
        $usr = "";
        $data = "";
        $ids = Input::get('id');

        foreach ($ids as $id){
            if($id)
            {
                $usr = $this->usersRepo->getAUser($id);
                $prenom = $usr->prenom;
                $nom = $usr->nom;
                try {
                    $usr->bankAccount()->delete();
                    $usr->delete();
                }catch(\Exception $e){
                    $author = Auth::user()->role_id;
                    $page = '';
                    switch ($author)
                    {
                        case 1:
                            $page = "mod-com";
                            break;
                        default:
                            $page = "home";
                    }
                    return Response::json(array('success'=>false));
                }
                $data .= "L'utilisateur ". $prenom ." ".$nom." a été suprimée ";
            }
        }
        if( Input::get('numberUsers') == 'all')
        {
            $data = "Tous les utilisateurs sélectionnés ont été supprimées";
        }
        return Response::json(array('success'=>true, 'data'=> $data));
    }
}
