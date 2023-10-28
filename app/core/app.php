<?php

namespace App\core;

use App\core\Controller;


class App
{
    private Controller $controller;
    protected string $method = "index";
    protected array $params;

    const PATH_TO_CONTROLLERS = ROOT_PATH . "\app\controllers" . DIRECTORY_SEPARATOR;
    const NAMESPACE_CONTROLLERS = "App" . DIRECTORY_SEPARATOR . "controllers" . DIRECTORY_SEPARATOR;


    public function __construct()
    {
        $url = $this->parseURL();

        $this->controller =  $this->getController($url);
        $this->method = $this->getMethod($url);
        $this->params = (count($url) > 2) ? [$url[2]] : [];
        $this->params = array_slice($url, 2);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }


    private function parseURL(): array
    {
        $url = isset($_GET['url']) ? $_GET['url'] : "post";
        return explode("/", filter_var(trim($url, "/"), FILTER_SANITIZE_URL));
    }


    private function getController(array $url): Controller
    {
        if (file_exists(App::PATH_TO_CONTROLLERS . strtolower($url[0]) . "Controller.php")) {
            $controller = ucfirst($url[0]) . "Controller";
            $fullController = App::NAMESPACE_CONTROLLERS . $controller;

            if (class_exists($fullController)) {
                return  new $fullController();
            }
        }

        $controller = App::NAMESPACE_CONTROLLERS . "NotFoundController";
        return new $controller();
    }


    private function getMethod(array $url): string
    {
        if (isset($url[1])) {
            $url[1] = strtolower($url[1]);
            if (method_exists($this->controller, $url[1])) {
                return $url[1];
            }
        }
        return "index";
    }
}
