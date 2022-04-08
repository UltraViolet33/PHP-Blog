<?php

require_once('../app/core/controller.php');

class Login extends Controller
{
    public function index()
    {
        $_SESSION['error'] = "";

        if (isset($_POST['login'])) {
            var_dump($_POST);
            $userManager = $this->loadModel("User");

            if (empty($_POST['email'])) {

                $_SESSION['error'] = "Email manquant</br>";
            }

            if (empty($_POST['password'])) {
                $_SESSION['error'] .= "Mot de passe manquant</br>";
            }

            if ($_SESSION['error'] === "") {
                $email = validateData($_POST['email']);
                $data = $userManager->getUser($email, $_POST['password']);
                if ($data && is_object($data[0])) {
                    $this->userToSession($data[0]);
                    header("Location: home");
                    die;
                } else {
                    $_SESSION['error'] .= "Mot de passe ou email invalide <br>";
                }
            }
        }
        $this->view("login");
    }

    /**
     * user to $_SESSION
     * @param object $user
     */
    private function userToSession($user)
    {
        $_SESSION['user']['idUser'] = $user->id;
        $_SESSION['user']['userName'] = $user->username;
        $_SESSION['user']['email'] = $user->email;
        $_SESSION['user']['isAdmin'] = $user->isAdmin;
    }
}
