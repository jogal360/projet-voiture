<?php

namespace Voiture\Managers;

abstract class BaseManager {

    protected $entity;
    protected $data;
    protected $errors;

    //$entity es un objeto (modelo) para guardar un registro x ej. un usuario
    public function __construct($entity, $data)
    {
        $this->entity   = $entity;
        $this->data     = array_only($data, array_keys($this->getRules()));
    }

    abstract function getRules();

    public function isValid()
    {
        $rules          = $this->getRules();
        $validation     = \Validator::make($this->data, $rules);

        if($validation -> fails())
        {
            throw new ValidationException('Error autentication', $validation->messages());
        }
    }
    public function prepareData($data)
    {
        return $data;
    }
    public function save()
    {
        $this->isValid();

        $this->entity->fill($this->prepareData($this->data));
        $this->entity->save();
        \Notification::success(\Notification::message('<div class="cent"><i class="glyphicon glyphicon-ok"></i><b> Utilisateur mise en jour! :)</b></div>')->alias('okUpdate'));
        return true;
    }

}