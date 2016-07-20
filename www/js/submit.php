<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$company = $_POST['company'];

// Create the email and send the message
$to = 'conferexmx@gmail.com'; // Add your email address in between the '' replacing jennpereira13@gmail.com - This is where the form will send a message to.
$cc = 'jesuscervin@icloud.com';
$email_subject = "Conferex Forma de contacto:  $name";
$email_body = "Has recibido un nuevo mensaje a traves de la forma de contacto del sitio de Conferex.mx.\n\n"."A continuacion los detalles:\n\nNombre: $name\n\nEmpresa:\n$company\n\nEmail: $email_address\n\nMensaje:\n$message";
$headers = "From: mensajes@conferex.mx\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>