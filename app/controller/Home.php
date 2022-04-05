<?php

require_once('../app/core/controller.php');

class Home extends Controller
{

    public function index()
    {
        $data = [];
        if($this->checkLogin())
        {
            $data['user'] = $_SESSION['user'];
        }
        $this->view("home", $data);
    }
}
