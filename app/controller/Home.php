<?php

require_once('../app/core/controller.php');


    class Home extends Controller{

        public function index()
        {
            $this->view("home");
        }
    }