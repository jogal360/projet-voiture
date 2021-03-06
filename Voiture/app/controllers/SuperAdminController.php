<?php
use Voiture\Repositories\UsersRepo;
use Voiture\Managers\AccountManager;

class SuperAdminController extends BaseController {


    protected $usersRepo;
    public $layout = 'moderateur-com.home-mod';

    public function __construct( UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }
    public function loginSAdmin()
    {
        $numberAccounts = $this->usersRepo->getNumberAccounts();
        $joueursSemaine = $this->usersRepo->getUsersRandom();
        $numberVoitures = $this->usersRepo->getNumberVoitures();
        return View::make('superadmin/panel-sadmin',compact('numberAccounts','joueursSemaine','numberVoitures'));
    }
    public function panel()
    {
        return View::make('bdd/panel-bdd');
    }
    public function genererBd()
    {
        return Response::json(['succ'=> true, 'result' => Input::get('action')]);
    }

}
