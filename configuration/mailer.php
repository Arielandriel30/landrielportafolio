<?php
//cmd ubicarse en la carpeta c:\xampp\htdocs
//correr el siguiente comando composer require phpmailer/phpmailer
//Link de la biblioteca https://github.com/PHPMailer/PHPMailers

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../third-party/vendor/autoload.php';
//require '../third-party/vendor/phpmailer/phpmailer/src/PHPMailer.php';
//require '../third-party/vendor/phpmailer/phpmailer/src/Exception.php';



$mail = new PHPMailer(true);                          // Passing `true` enables exceptions
try{
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'landriel.ariel.cv@gmail.com';                 // SMTP username
    $mail->Password = 'aeiouabcde309';  
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                         // SMTP password
    $mail->SMTPSecure = 'SSL';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('landriel.ariel.cv@gmail.com');
    $mail->addAddress('ariel.landriel23@gmail.com', 'Portfolio');     // Add a recipient
    

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Porfolio';
    $mail->Body    = 'Mensaje';


    $mail->send();
    echo 'El mensaje se envio de manera exitosa';
}catch (Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}