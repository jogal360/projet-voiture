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
	public $timestamps = false;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('prenom','nom','email','role_id','verified','number_attemps',
        'confirmation_code', 'pseudo', 'date_nac','sexe', 'phone','adr_postale', 'description','website_url',
        'adr_ip','created_at','updated_at');

	//Un usuario pertenece a una rol
	public function role()
	{
		return $this->belongsTo('Voiture\Entities\Role');
	}
    public function bankAccount()
    {
        return $this->hasOne('Voiture\Entities\BankAccount');
    }


	public function setPasswordAttribute($value)
	{
		if( ! empty ($value))
		{
			$this->attributes['password'] = \Hash::make($value);
		}
	}

}
