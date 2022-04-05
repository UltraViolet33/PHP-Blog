<?php

require_once('../app/core/controller.php');

class Login extends Controller
{
    public function index()
    {
        if (isset($_POST['login'])) {
            $userManager = $this->loadModel("User");
            $email = validateData($_POST['email']);
            $data = $userManager->getUser($email, $_POST['password']);
            if (is_object($data[0])) {
                $_SESSION['user']['idUser'] =  $data[0]->id;
                $_SESSION['user']['userName'] =  $data[0]->username;
                header("Location: home");
                die;
            }
        }
        $this->view("login");
    }
}
