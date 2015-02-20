<?php
namespace Voiture\Entities;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Utilisateur extends \Eloquent implements UserInterface, RemindableInterface{

    use UserTrait, RemindableTrait;

    protected $fillable = [];
    protected $table = 'utilisateurs';
    public $timestamps = false;

    //funcion qcon el nombre que se le da en archivo de view
    public function role()
    {
        return $this->belongsTo('Voiture\Entities\Role');
    }

}