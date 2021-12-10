<?php
namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\UserManager;

class BaseSecurity extends BaseController
{
    public function executeLogin(): bool
    {
        $userManager = new userManager(new \App\Factory\PDOFactory());
        $users = $userManager->getAllLogin();
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
            return false;
        }
        foreach ($users as $user){
            if ($user->getEmail() == $_SERVER['PHP_AUTH_USER'] && $user->getPassword() == md5($_SERVER['PHP_AUTH_PW'])){
                return true;
            }
        }
        return false;
    }
}