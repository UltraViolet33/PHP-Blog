<?php

require_once('../app/core/controller.php');

class Logout
{
    public function index()
    {
        unset($_SESSION['user']);
        header('Location: home');
    }
}
