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
    public function detailUser()
    {
        $id = Input::get('id');
        $user = $this->usersRepo->getAUser($id);
        /*
        $layoutp = 'moderateur-com/home-mod';
        $sectionUp = "@extends($layoutp)@section('detail')";
        $sectionDown = "@stop"; */
        return View::make('users/detail-user',compact('user'));

    }
}
