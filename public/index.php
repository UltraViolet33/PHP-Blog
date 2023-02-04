<?php
session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$path = str_replace("index.php", "", $path);


require_once "../vendor/autoload.php";
use App\core\App;


$path = str_replace("index.php", "", $path);
$rootPath = str_replace("public", "", __DIR__);

define('ROOT_PATH', $rootPath);
define("ROOT", $path);
define("ASSETS", $path . "assets/");

// include "../app/init.php";
// define("ROOT", $path);
// define("ASSETS", $path . "assets/");

$app = new App();
