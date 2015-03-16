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
        $this->usersRepo->getNumberAccounts();
        return View::make('superadmin/panel-sadmin');
    }

}