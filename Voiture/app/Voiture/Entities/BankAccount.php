<?php
namespace Voiture\Entities;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BankAccount extends \Eloquent {


    protected $fillable = array('user_id','solde','created_at','updated_at');
    protected $table = 'bank_account';

    //funcion qcon el nombre que se le da en archivo de view
    public function user()
    {
        return $this->belongsTo('Voiture\Entities\User');
    }
}