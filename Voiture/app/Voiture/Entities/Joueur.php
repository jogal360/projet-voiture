<?php

namespace Voiture\Entities;

class Joueur extends \Eloquent {

    protected $fillable = [];

    //funcion qcon el nombre que se le da en archivo de view
    public function user()
    {
        return $this->hasOne('HireMe\Entities\User','id','id');
    }
}