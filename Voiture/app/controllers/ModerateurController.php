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


    public function listUsers($sortby=null , $order = null)
    {
        $dataUsers   = $this->usersRepo->getAllUsers();
        $users= '';
        $sortbyP = $sortby;
        $orderP = $order;

        if ($sortby  && $order ) {
            $dataUsers = $this->usersRepo->orderBy($sortby, $order);
        } else {
            $dataUsers =  $dataUsers;
        }

        $entity = "mod";
        return View::make('moderateur-com/list-users',compact('dataUsers', 'entity','sortbyP', 'orderP'));
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
    public function editUser($id)
    {
        //dd(Input::all());
        $id = $id;
        $user = $this->usersRepo->getAUser($id);

        $entity = "mod";
        $sexe  = \Lang::get('utils.sex');
        return View::make('users/update-user',compact('user','sexe'));
        /*
        $onlyData =  $view->renderSections()['contentmod'];
        return $onlyData;
        $this->layout->dataMod =  $onlyData;

        //return Section::yield('content'); */

    }
    public function updateProfil()
    {
        $id     = Input::get('id');
        $data = Input::all();
        $user  = $this->usersRepo->getAUser($id);
        //dd($);
        $manager  = new AccountManager($user, Input::all());
        $manager->save();

        return Redirect::route('list_users');
    }
}
