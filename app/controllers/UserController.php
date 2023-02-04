<?php

namespace App\controllers;

use App\core\Controller;
use App\models\User;
use Valitron\Validator;
use App\helpers\Session;

class UserController extends Controller
{
    protected User $model;
    private Validator $v;


    public function __construct()
    {
        $this->model = new User();
    }


    public function login(): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($this->checkUserLoginData()) {
                http_response_code(200);
                header("Location: /post");
                return;
            }
        }

        $this->view("login");
    }


    public function logout(): void
    {
        Session::unsetKey("user");
        header("Location: /post");
        return;
    }


    private function checkUserLoginData(): bool
    {
        $data = ["email", "password"];

        if (!$this->checkDataForm($data)) {
            Session::set("error", $this->v->errors());
            return false;
        }

        if (!$this->checkEmailAndPasswordForLogin()) {
            http_response_code(401);
            Session::set("error", "Incorrect email or password");
            return false;
        }

        return true;
    }


    private function checkEmailAndPasswordForLogin(): bool
    {
        $loginData = ["email" => $_POST["email"], 
                    "password" => hash('sha1', $_POST["password"])];

        $user = $this->model->selectUser($loginData);
        if (count($user) > 0) {
            Session::set("user", $user);
            return true;
        }

        return false;
    }


    private function checkDataForm(array $data): bool
    {
        $this->v = new Validator($_POST);
        $this->v->rule("required", $data);
        return $this->v->validate();
    }


    public function index(): void
    {
    }

    public function add(): void
    {
    }

    public function edit(int $id): void
    {
    }

    public function delete(): void
    {
    }
}
