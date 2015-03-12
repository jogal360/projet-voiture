<?php
use Voiture\Repositories\UsersRepo;

class ModerateurController extends BaseController {


    protected $usersRepo;

	public function __construct( UsersRepo $usersRepo)
	{
        $this->usersRepo = $usersRepo;
	}


    public function listUsers()
    {
        $dataUsers   = $this->usersRepo->getAllUsers();
        return View::make('moderateur-com/list-users',compact('dataUsers'));
    }

}
