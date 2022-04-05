<?php

require_once('../app/core/controller.php');

use App\core\Controller;

class User extends Controller
{

    public function login()
    {
        $this->view("login");
    }
}
