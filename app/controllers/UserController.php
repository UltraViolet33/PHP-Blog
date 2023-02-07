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
        $loginData = [
            "email" => $_POST["email"],
            "password" => hash('sha1', $_POST["password"])
        ];

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
        $this->isUserLoggedIn();
        $user = Session::get("user");
        $data["profil"] =  $this->model->find($user["id"]);
        $this->view("profil", $data);
    }

    public function isUserLoggedIn(): void
    {
        if (!Session::get("user")) {
            header("Location: /user/login");
            http_response_code(401);
            return;
        }
    }

    public function add(): void
    {
    }

    public function edit(int $id): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editProfil"])) {
            if ($this->checkEditUserData()) {
                if (!$this->model->checkIfEmailExists(["id" => $id, "email" => $_POST["email"]])) {
                    $data = ["id" => $id, "email" => $_POST["email"], "username" => $_POST["username"]];
                    $this->model->update($data);
                    http_response_code(200);
                    header("Location: /user/profil");
                    return;
                }

                Session::set("error", "email already exists");
            }
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["changePassword"])) {

            if ($this->checkEditPasswordData()) {

                $data = ["id" => $id, "password" => hash('sha1', $_POST["newPassword"])];
                $this->model->updatePassword($data);
                header("Location: /user/profil");
                return;
            }
        }

        $this->isUserLoggedIn();
        $user = Session::get("user");
        $data["profil"] =  $this->model->find($user["id"]);
        $this->view("updateProfil", $data);
    }

    private function checkEditPasswordData(): bool
    {
        $data = ["currentPassword", "newPassword", "confirmationPassword"];

        if (!$this->checkDataForm($data)) {
            Session::set("errorEditPassword", "Please fill all inputs");
            return false;
        }


        if (!$this->checkIfCurrentPasswordIsValid()) {
            Session::set("errorEditPassword", "Incorrect current password");
            return false;
        }

        if (!$this->checkIfNewPasswordMatch()) {
            Session::set("errorEditPassword", "Passwords don't match");
            return false;
        }

        return true;
    }


    private function checkIfNewPasswordMatch(): bool
    {
        return $_POST["newPassword"] === $_POST["confirmationPassword"];
    }
    

    private function checkIfCurrentPasswordIsValid(): bool
    {
        $userPassword = $this->model->selectPasswordById(Session::get("user")["id"]);

        if ($userPassword["password"] !== hash('sha1', $_POST["currentPassword"])) {
            return false;
        }

        return true;
    }


    private function checkEditUserData(): bool
    {
        $data = ["username", "email"];
        if (!$this->checkDataForm($data)) {
            Session::set("error", $this->v->errors());
            return false;
        }

        $this->v->rule("email", "email");

        if (!$this->v->validate()) {
            Session::set("error", $this->v->errors());
            return false;
        }

        return true;
    }

    public function delete(): void
    {
    }
}
