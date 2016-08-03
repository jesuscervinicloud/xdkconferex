<?php
include('/usr/share/php/libphp-phpmailer/class.phpmailer.php');
include('/usr/share/php/libphp-phpmailer/class.smtp.php');
// Check for empty fields
if(empty($_POST['name'])                ||
   empty($_POST['email'])               ||
   empty($_POST['message'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
        echo "No arguments Provided!";
        return false;
   }
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$company = $_POST['company'];
$email_subject = "Conferex Forma de contacto:  $name";
$email_body = "<h2>Has recibido un nuevo mensaje a traves de la forma de contacto del sitio de Conferex.mx</h2> <h3>A continuacion los detalles: </h3> <ul><li>Nombre: $name </li><li>Empresa: $company</li><li>Email: $email_address </li><li>Mensaje: $message </li></ul>";
// creating email & sending
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->IsHTML(true);
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "conferexmx@gmail.com";
$mail->Password = "gddhuquexafoenhm";
$mail->SetFrom($email_address);
$mail->Subject = $email_subject;
$mail->Body = $email_body;
$mail->AddAddress("aenciso@conferex.mx");
 if(!$mail->Send()) {
    return true;
 } else {
    return false;
 }
?>
