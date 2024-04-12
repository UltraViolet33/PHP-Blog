<?php

namespace App\controllers;

use App\core\Controller;
use App\models\User;
use App\helpers\Session;

class UserController extends Controller
{
    protected User $model;


    public function __construct()
    {
        $this->model = new User();
    }

    public function index(): void
    {
        $this->isUserLoggedIn();
        $user = Session::get("user");
        $data["profile"] =  $this->model->find($user["id_user"]);
        $this->view("user/profile", $data);
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

        $this->view("user/login");
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
            if ($user["is_admin"] == 1) {
                Session::set("token", bin2hex(openssl_random_pseudo_bytes(6)));
            }
            return true;
        }

        return false;
    }


    public function isUserLoggedIn(): void
    {
        if (!Session::get("user")) {
            header("Location: /user/login");
            return;
        }
    }


    public function edit(?int $id = null): void
    {
        $this->isUserLoggedIn();

        if ($id == null) {
            header("Location: /user");
            return;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editProfil"])) {
            if ($this->checkEditUserData()) {
                if (!$this->model->checkIfEmailAlreadyExists(["id" => $id, "email" => $_POST["email"]])) {
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

        $user = Session::get("user");
        $data["profile"] =  $this->model->find($user["id_user"]);
        $this->view("user/updateProfile", $data);
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
}
