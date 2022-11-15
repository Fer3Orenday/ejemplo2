
<?php

if (isset($body) && $body == true) {
    echo '<body style="background-color:pink">';
} else {
    echo '<body style="background-color:pink">';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$mail = new PHPMailer(true);

try {

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com ';
    $mail->SMTPAuth = true;

    $mail->Username = 'fer.orenday3@gmail.com';
    $mail->Password = 'gftzddlyxzionaqp';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    //desde donde va a ser enviado el correo electronico y como quieres que diga (formato)
    $mail->setFrom('fer.orenday3@gmail.com', 'Actividad PHP Correo');
    $mail->addAddress($_POST['email'], 'Actividad PHP Correo');

    $mail->addCC($_POST['email']);
    //para que puedas incluir codigo de html como imagenes, etc
    $mail->isHTML(true);

    $mail->Subject = 'Actividad PHP Correo';
    //lo que quieras que diga el correo electronico 
    $mail->Body = 'Bienvenido a Nuestro Sitio';

    $mail->send();

    echo 'Correo enviado';
} catch (Exception $e) {
    echo $mail->ErrorInfo;
}
