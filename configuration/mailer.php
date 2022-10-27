<?php
//cmd ubicarse en la carpeta c:\xampp\htdocs\TpFinal_GauchoRocket
//correr el siguiente comando composer require phpmailer/phpmailer
//Link de la biblioteca https://github.com/PHPMailer/PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'third-party/vendor/autoload.php';

$mail = new PHPMailer(true);

$nombre = $_POST['nombre'];
$email = $_POST['mail'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

if( empty(trim($nombre)) ) $nombre = 'anonimo';
if( empty(trim($email)) ) $email = '';

$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre $apellido / $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;


try{
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug  = true;
    $mail->Username   = 'landriel.ariel.cv@gmail.com';
    $mail->Password   = 'aeiouabcde309';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('landriel.ariel.cv@gmail.com', 'Portfolio');
    $mail->addAddress('ariel.landriel@hotmail.com');//email de la persona a activar la cuenta

    $mail->isHTML(true);
    $mailer->Subject = "Mensaje web: $asunto";
    $mailer->msgHTML($body);
    $mailer->AltBody = strip_tags($body);
    $mailer->CharSet = 'UTF-8';

    echo 'El mensaje se envio';
}catch (Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}