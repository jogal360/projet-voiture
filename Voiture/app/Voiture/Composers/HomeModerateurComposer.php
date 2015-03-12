<?php
/**
 * Created by PhpStorm.
 * User: Joaquin
 * Date: 25/02/2015
 * Time: 12:37 AM
 */

namespace Voiture\Composers;

use Voiture\Repositories\UsersRepo;


class HomeModerateurComposer {
    protected $usersRepo;
    public function __construct(UsersRepo $usersRepo)
    {
        $this->usersRepo = $usersRepo;
    }
    public function compose($view)
    {
        $numberUsers = $this->usersRepo->getNumberUsers();

        $view->with('numberUsers', $numberUsers );
    }
}