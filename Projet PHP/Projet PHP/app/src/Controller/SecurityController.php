<?php
namespace App\Controller;

use App\Entity\User;
use App\Factory\PDOFactory;
use App\Fram\Flash;
use App\Manager\UserManager;


use App\Controller\BaseController;

class SecurityController extends BaseController
{
    public function executeCreate()
    {
        $this->render(
            'CreateAccount.php',
            [],
            'Show'
        );
    }

    public function executeLogin()
    {
        $this->render(
            'login.php',
            [],
            'Show'
        );
    }

    public function executeMember()
    {
        if (isset($_POST['SUBMIT'])) {

        //Récupération des valeurs
        $email = $_POST['EMAIL'];
        $password = $_POST['PASSWORD'];
        $admin = $_POST['ADMIN'];
        $errors = [];

        //Check des valeurs reçues
        if (empty($email)) { array_push($errors, "Email requis"); }
        //if (filter_var($email, FILTER_VALIDATE_EMAIL) !== TRUE) { array_push($errors, "Rentrez un email valide"); }
        if (empty($password)) { array_push($errors, "Mot de passe requis"); }


        $userManager = new UserManager (new PDOFactory());
        $userexist = $userManager->getUserExistCheck($email);

        if ($userexist !== true)
        {
            array_push($errors, "Adresse email déjà utilisée");
        }

        if (count($errors) == 0) {
            $securedPassword = md5($password);
            $userManager = new UserManager(new PDOFactory());
            $newUser = new User();
            $newUser->setEmail($email);
            $newUser->setPassword($securedPassword);
            $newUser->setAdmin($admin);

            $userManager->addUser($newUser);
            return true;
        }
        else {
            $this->render(
                '404.php',
                ['errors' => $errors],
                'Show'
            );
        }

    }
}
    /*

    public function executeAccess(): bool
    {
        $userManager = new userManager(new \App\Factory\PDOFactory());
        $users = $userManager->getAllUsers();

        if (isset($_POST['EMAIL']) || isset($_POST['PASSWORD'])) {
            foreach ($users as $user){
                if ($user->getEmail() == $_POST['EMAIL'] && $user->getPassword() == $_POST['PASSWORD']){
                    session_start();
                    $_SESSION['logged_in'] = true;
                    $_SESSION['USER_ID'] = $user->getId;
                    $_SESSION['IsAdmin'] = $user->getAdmin;

                }
            }
        }
        else
        {
            $this->render(
                '404.php',
                [],
                'Show'
            );
        }
        return True;
    }
    /*
    public function executeLogout(): bool
    {
        session_start();
        session_destroy();
        return true;

    }

    public function executeIsConnected (): bool
    {

    }
        */
}
