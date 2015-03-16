<?php


namespace Voiture\Repositories;
use Illuminate\Support\Facades\Redirect;
use Voiture\Entities\Utilisateur;
use Voiture\Entities\Voiture;

class VoituresRepo extends BaseRepo{

    public function getModel()
    {
        return new Voiture();
    }
    public function getAllVoitures()
    {
        $data = Voiture::paginate(10);
        return $data;
    }
    public function orderBy($orderBy, $order)
    {
        $users = Voiture::orderBy($orderBy, $order)->paginate(10);
        return $users;
    }
    public function getAVoiture($id)
    {
        $user = Voiture::find($id);
        return $user;
    }
    /*
     * Metodo para verificar que sea una credencial válida registrada
     * @params $user String
     */
    public function pseudoValid($user)
    {
        $ut = Utilisateur::where('pseudo','=',$user)->first();
        return $ut;
    }


} 