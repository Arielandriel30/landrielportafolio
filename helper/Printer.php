<?php

class Printer {

    public function __construct() {
    }
 # $data = [] agregar parametro cuando se haga el Model
 /////EJEMPLO////
 /*    public function execute() {
        $canciones  = $this->songModel->getCanciones();
        $data = ["canciones" => $canciones];
        $this->printer->generateView('songView.php', $data);
    }*/
    public function generateView($content, $data=[]) {
        include_once('view/header.mustache');
        include_once("view/" .$content);
        include_once('view/footer.mustache');
    }
}





?>