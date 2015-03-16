<?php
use Voiture\Repositories\UsersRepo;
use Voiture\Managers\AccountManager;

class ModerateurController extends BaseController {


    protected $usersRepo;
    public $layout = 'moderateur-com.home-mod';

    public function __construct( UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }
    public function loginModerateur()
    {
        return View::make('moderateur-com/panel-mod');
    }

}
