<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 17/12/2014
 * Time: 11:49 AM
 */

namespace Voiture\Managers;


class AccountManager extends BaseManager {
    public function getRules()
    {
        $rules = [
            'prenom' => 'required',
            'nom' => 'required',
            'email'     => 'required|email|unique:users,email,'.$this->entity->id,
            'date_nac'  => 'required|date',
            'sexe' => 'required|in:m,f',
            'phone' => 'required|integer',
            'phone' => 'required|integer',
            'description' => 'required',
            'website_url' => 'required|url',
        ];
        return $rules;
    }

}