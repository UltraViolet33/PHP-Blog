<?php

require_once('../app/core/Controller.php');

class Profil extends Controller
{

    public function index()
    {
        if (!$this->checkLogin()) {
            header("Location:login");
        }
        $data['user'] = $_SESSION['user'];
        $this->view("profil", $data);
    }
}
