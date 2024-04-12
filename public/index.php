<?php
session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$path = str_replace("index.php", "", $path);

require_once "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/..");
$dotenv->load();

var_dump($_ENV["DB_HOST"]);

use App\core\App;

$path = str_replace("index.php", "", $path);
$rootPath = str_replace("public", "", __DIR__);

define('ROOT_PATH', $rootPath);
define("ROOT", $path);
define("ASSETS", $path . "assets/");

$app = new App();
