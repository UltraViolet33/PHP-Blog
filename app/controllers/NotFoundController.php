<?php

namespace App\controllers;

use App\core\Controller;

class NotFoundController extends Controller
{
    public function index(): void
    {
        http_response_code(404);
        $this->view("404");
    }
}
