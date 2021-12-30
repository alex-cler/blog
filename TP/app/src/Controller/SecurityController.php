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
        $pseudo = $_POST['PSEUDO'];
        $password = $_POST['PASSWORD'];
        $admin = $_POST['ADMIN'];
        $errors = [];

        //Check des valeurs reçues
        if (empty($email)) { array_push($errors, "Email requis"); }
        //if (filter_var($email, FILTER_VALIDATE_EMAIL) !== TRUE) { array_push($errors, "Rentrez un email valide"); }
        if (empty($password)) { array_push($errors, "Mot de passe requis"); }
            if (empty($pseudo)) { array_push($errors, "Pseudo requis"); }


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
            $newUser->setPseudo($pseudo);

            $userManager->addUser($newUser);
            $_SESSION['LOGINMESSAGE'] = "Votre compte a bien été créé. Veuillez vous connecter.";
            header("Location: /login");
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

                        return header("Location: /");
                    }

                }
            else
            {
                $_SESSION['ERRORMESSAGE'] = "Utilisateur introuvable.. Veuillez rentrer un email et un mot de passe valide.";
                header("Location: /login");
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
