<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 15/01/2015
 * Time: 01:02 AM
 */

namespace Voiture\Managers;


class ValidationException extends \Exception{

    protected $errors;

    public function __construct($message, $errors)
    {
        $this->errors = $errors;
        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}