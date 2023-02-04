<?php
session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

$path = str_replace("index.php", "", $path);

include "../app/init.php";
define("ROOT", $path);
define("ASSETS", $path . "assets/");

$app = new App();
