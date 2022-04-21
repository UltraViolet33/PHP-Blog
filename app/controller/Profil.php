<?php

require_once('../app/core/Controller.php');

class Profil extends Controller
{

    /**
     * index
     * display data user
     */
    public function index()
    {
        if (!$this->checkLogin()) {
            header("Location:login");
        }

        $userModel = $this->loadModel('user');
        $user = $userModel->getAllDataUser($_SESSION['user']['idUser']);
        $data['profil'] = $user[0];
        $data['user'] = $_SESSION['user'];
        $this->view("profil", $data);
    }

    /**
     * display update page for admin
     */
    public function update()
    {
        $userModel = $this->loadModel('user');
        if (!$this->checkLogin()) {
            header("Location:login");
        }

        if (!empty($_POST)) {
            if (!empty($_POST['username'] && !empty($_POST['email']))) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $id = $_SESSION['user']['idUser'];
                $userModel->updateUser($username, $email, $id);
                header('Location: profil');
                return;
            } else {
                $_SESSION['error'] = "Veuillez remplir tous les champs !<br>";
            }
        }

        $user = $userModel->getAllDataUser($_SESSION['user']['idUser']);
        $data['profil'] = $user[0];
        $data['user'] = $_SESSION['user'];
        $this->view('updateProfil', $data);
    }
}
