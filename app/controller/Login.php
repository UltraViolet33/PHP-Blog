<?php

require_once('../app/core/controller.php');

class Login extends Controller
{

    public function index()
    {
        $this->view("login");
    }
}
