<?php
include_once ("helper/Configuration.php");

$configuration = new Configuration();

$router = $configuration->getRouter();


$controller = isset($_GET["controller"])? $_GET['controller'] : "";
$method = isset($_GET["method"])? $_GET['method'] : "";

$router->executeMethodFromController($controller, $method);

?>

