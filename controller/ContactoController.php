<?php
require_once 'helper/Mailer.php';

class ContactoController {

    private $printer;
 

    public function __construct($printer) {
        $this->printer = $printer;

        
    }
    public function execute() {
        $this->printer->generateView('Principal.html');
      }
  
      public function contacto()
      {
         $Asunto = $_POST['asunto']? $_POST["asunto"] : "";;
         $name = isset($_POST['name']) ? $_POST["name"] : "";
         $mensaje = isset($_POST["mensaje"]) ? $_POST["mensaje"] : "";
          $email = isset($_POST["mail"]) ? $_POST["mail"] : "";
          $this->sendMailer($name, $this->getRegisterMessage($mensaje, $email, $Asunto), $email);
          $this->execute();
          header("Location:/");

}


public function sendMailer($name, $Asunto ,$mensaje){
    $mailer = new Mailer($this->getMessageSubject($name),$Asunto , $mensaje);
    $mailer->sendMessage();
}

private function getMessageSubject($usuario){
    return "Te ha envíado mensaje $usuario ";
}

private function getRegisterMessage($mensaje, $email, $Asunto){
    return  " el mensaje es $mensaje y su contacto es $email, con motivo $Asunto";
}
}