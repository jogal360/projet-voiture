<?php


namespace Voiture\Repositories;
use Illuminate\Support\Facades\Redirect;
use Voiture\Entities\Utilisateur;

class AdminsRepo extends BaseRepo{

    public function getModel()
    {
        return new Utilisateur();
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