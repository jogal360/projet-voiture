<?php


namespace Voiture\Repositories;
use Voiture\Entities\Role;
use Voiture\Entities\Joueur;
use Voiture\Entities\User;
use Illuminate\Support\Facades\Redirect;

class RoleRepo extends BaseRepo{

    public function getModel()
    {
        return new Joueur();
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
    public function newCandidate()
    {
        $user = new User();
        $user->type = 'candidato';
        return $user;
    }
    public function getAUser($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function getACandidate($id)
    {
        $cand = Candidate::find($id);
        return $cand;
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