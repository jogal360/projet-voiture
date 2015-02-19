<?php

namespace Voiture\Entities;

class Role extends \Eloquent {

    protected $fillable = [];
    public $timestamps = false;

    //funcion qcon el nombre que se le da en archivo de view
    public function user()
    {
        return $this->hasMany('Voiture\Entities\User');
    }
    public function utilisateur()
    {
        return $this->hasMany('Voiture\Entities\Utilisateur');
    }
}