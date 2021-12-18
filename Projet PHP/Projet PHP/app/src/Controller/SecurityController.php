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


    public function executeAccess()
    {
        if (isset($_POST['CHECK'])) {
            //Récupération des valeurs
            $email = $_POST['EMAIL'];
            $password = $_POST['PASSWORD'];
            $userManager = new UserManager (new PDOFactory());
            $users = $userManager->getAllUsers();

            foreach ($users as $user){
                if ($email == $user->getEmail()){
                    if (md5($password) == $user->getPassword()){
                        session_destroy();
                        session_start();
                        $_SESSION['logged_in'] = true;
                        $_SESSION['USER_ID'] = $user->getId();
                        $_SESSION['admin'] = $user->getAdmin();
                        $_SESSION['LOGINMESSAGE'] = "Vous êtes maintenant connecté";

                        header("Location: /");
                    }
                    else {
                        echo 'Mot de passe invalide';
                    }
                }

            }
        }
    }

    public function executeLogout(): void
    {
        session_destroy();
        session_start();
        $_SESSION['LOGOUTMESSAGE'] = "Vous êtes maintenant déconnectés";
        //Retour HP
        header("Location: /");

    }


}
