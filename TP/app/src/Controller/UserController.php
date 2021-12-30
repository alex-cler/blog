<?php
namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\UserManager;

class UserController extends BaseController
{
    //Pour liste de tout les utilisateurs
    public function executeIndex()
    {
        $userManager = new UserManager(new \App\Factory\PDOFactory());
        $users = $userManager->getAllUsers();
        /*
        $this->render(
            'home.php',['users'=> $users],
            'Home page'
        );
        */
    }

    //Pour page infos de l'utilisateur
    public function executeShow()
    {
        $userManager = new UserManager(new \App\Factory\PDOFactory());
        $users = $userManager->getUserById($this->params['id']);
        /*
        $this->render(
            'show.php',
            [
                'test' => $post
            ],
            'Show Page'
        );
        */
    }


}