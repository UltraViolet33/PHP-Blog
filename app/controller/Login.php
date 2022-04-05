<?php

require_once('../app/core/controller.php');

class Login extends Controller
{
    public function index()
    {
        if (isset($_POST['login'])) {
            $userManager = $this->loadModel("User");

            if (empty($_POST['email'])) {
                $_SESSION['error'] = "Email manquant</br>";
            }

            if (empty($_POST['password'])) {
                $_SESSION['error'] .= "Mot de passe manquant</br>";
            }

            $email = validateData($_POST['email']);
            $data = $userManager->getUser($email, $_POST['password']);
            if ($data && is_object($data[0])) {
                $this->userToSession($data[0]);
                header("Location: home");
                die;
            }
        }
        $this->view("login");
    }

    private function userToSession($user)
    {
        $_SESSION['user']['idUser'] = $user->id;
        $_SESSION['user']['userName'] = $user->username;
    }
}
