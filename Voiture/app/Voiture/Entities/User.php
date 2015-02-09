<?php
namespace Voiture\Entities;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('prenom','nom','email','password');

	//Un usuario pertenece a una rol
	public function role()
	{
		return $this->belongsTo('Voiture\Entities\Role');
	}

	public function setPasswordAttribute($value)
	{
		if( ! empty ($value))
		{
			$this->attributes['password'] = \Hash::make($value);
		}
	}

}
