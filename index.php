<?php

//Front Controller

//Default Setting
ini_set("display_errors", 1);
error_reporting(E_ALL);

//Start Session
session_start();

//Const var tree
define("P",dirname(__FILE__).'/');

//Autoload Objects
require_once(P.'components/Autoload.php');

//Start Router
$router = new Router();
$router->run();

?>