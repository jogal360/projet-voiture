<?php
namespace Voiture\Entities;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Voiture extends \Eloquent {


    protected $fillable = array('nom_voiture', 'type', 'description', 'model', 'fabricant', 'resistance', 'rpm', 'vitesse', 'cylindres', 'cheval_vapeur', 'taille_recevoir', 'niveau', 'carrosserie', 'pneus', 'châssis', 'et_stabilite', 'et_esthetique', 'et_performance', 'et_equilibre', 'et_general');
    protected $table = 'bank_account';

    //funcion qcon el nombre que se le da en archivo de view
    public function user()
    {
        return $this->belongsTo('Voiture\Entities\User');
    }
}