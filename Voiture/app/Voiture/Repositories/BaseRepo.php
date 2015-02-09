<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 14/12/2014
 * Time: 02:16 PM
 */

namespace Voiture\Repositories;


abstract class BaseRepo {

    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function find($id)
    {
        return $this->model->find($id);
    }

} 