<?php

class Controller
{

    public function view(string $path, array $data = []): void
    {
        extract($data);

        if (file_exists("../app/view/" . $path . ".php")) {
            include "../app/view/" . $path . ".php";
        } else {
            include "../app/view/404.php";
        }
    }


    public function loadModel(string $model): object|bool
    {
        if (file_exists("../app/model/" .  strtolower($model) . ".php")) {
            include "../app/model/" . strtolower($model) . ".php";
            return $a = new $model();
        }
        return false;
    }


    public function loadController(string $controller): object|bool
    {
        if (file_exists("../app/controller/" .  strtolower($controller) . ".php")) {
            include "../app/controller/" . strtolower($controller) . ".php";
            return $a = new $controller();
        }
        return false;
    }


    public function checkLogin(): bool
    {
        return !empty($_SESSION['user']);
    }


    public function checkAdminLogin(): void
    {
        if (empty($_SESSION['user']) || $_SESSION['user']['isAdmin'] != 1) {
            header("Location: " . ROOT . "login");
            return;
        }
    }
}
