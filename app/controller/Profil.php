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

    public function update()
    {
        if (!$this->checkLogin()) {
            header("Location:login");
        }



        $this->view('updateProfil');

    }
}
