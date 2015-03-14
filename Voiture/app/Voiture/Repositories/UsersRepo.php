<?php


namespace Voiture\Repositories;
use Voiture\Entities\Role;
use Voiture\Entities\User;
use Illuminate\Support\Facades\Redirect;

class UsersRepo extends BaseRepo{

    public function getModel()
    {
        return new User();
    }

    /**
     * Get all users inscrits
     * @return mixed
     */
    public function getAllUsers()
    {
        $users = User::paginate(10);
        return $users;
    }
    public function orderBy($orderBy, $order)
    {
        $users = User::orderBy($orderBy, $order)->paginate(10);
        return $users;
    }
    public function getAUser($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function getNumberUsers()
    {
        $numberUsers = User::all()->count();
        return $numberUsers;
    }

    public function findLatest($take=10)
    {
        return Category::with([
            'candidates' => function($query) use ($take) {
                    $query->take($take);
                    $query->orderBy('created_at', 'DESC');
                },
            'candidates.user'
        ])->get();
    }
    /*
     * Crear un nuevo usuario y se establece el valor del role en 3 (usuario estandar)
     * El estado de verificado se coloca en 0
     */
    public function newJoueur($confirmation_code)
    {

        $user = new User();
        $user->role_id  = 3;
        $user->verified = 0;
        $user->confirmation_code = $confirmation_code;
        return $user;
    }

    /*
     * Metodo para verificar que sea una credencial válida registrada
     * @params $user String
     */
    public function isCredentialValid($user)
    {
        $user = User::where('prenom','=' ,$user)->first();
        return $user;
    }

    public function changeAttemps($mail)
    {

    }


    public function resultsSearchName($value)
    {
        $data = User::where('full_name', 'LIKE', '%' . $value . '%')->take(10)->get();

        return $data ;
    }
    public function resultsSearchEmail($value)
    {
        $data = User::where('email', 'LIKE', '%' . $value . '%')->take(10)->get();

        return $data ;
    }
    public function checkFromEmail($id)
    {
        $idAuthor = \Auth::user()->id;

        if($idAuthor == $id)
        {
            return false;
        }
        return true;
    }
    public function getEmail($id)
    {
        $user = User::find($id)->full_name;
        //$data = DB::table('password_reminders')->where('email', $email)->first();
        return $user;
    }
    public function getName($id)
    {
        $data = \DB::table('users')->where('id', $id)->pluck('full_name');
        return $data;
    }

    public function getId($name)
    {
        $data = \DB::table('users')->where('full_name', $name)->pluck('id');
        return $data;
    }
} 