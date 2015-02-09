<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 17/12/2014
 * Time: 11:49 AM
 */

namespace Voiture\Managers;


class RegisterManager extends BaseManager {
    public function getRules()
    {
        $rules = [
            'prenom' => 'required',
            'nom' => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|confirmed',
            'password_confirmation' => 'required',
            'captcha' => 'required|captcha'
        ];
        return $rules;
    }
}