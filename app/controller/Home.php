<?php

require_once('../app/core/controller.php');

use App\core\Controller;

    class Home extends Controller{

        public function index()
        {
            $this->view("home");
        }
    }