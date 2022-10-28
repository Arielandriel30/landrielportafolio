<?php
include_once("MySqlDatabase.php");
include_once("Printer.php");
include_once("Router.php");
require_once("MustachePrinter.php");
include_once("controller/PrincipalController.php");
include_once("controller/ContactoController.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once ("Qr.php");


class Configuration
{

 private function getDatabase() {
    $configDatabase_ini = $this->getConfiguration();

    return new MySqlDatabase(
        $configDatabase_ini["servername"],
        $configDatabase_ini["username"],
        $configDatabase_ini["password"],
        $configDatabase_ini["dbname"]);
         #echo 'estas conectado';
 }

 public function getPrincipalController() {
    return new PrincipalController($this->getPrinter());

}
public function getContactoController() {
    return new ContactoController($this->getPrinter());

}



 private  function getConfiguration(){
     return parse_ini_file("configuration/conexiondatabase.ini");
 }

 public function getRouter()
{
    return new Router($this, "getPrincipalController", "execute");
}
///////////mustache//////
private function getPrinter() {
    return new MustachePrinter("view");
}
public function getQr()
{
    return new Qr();
}
 }