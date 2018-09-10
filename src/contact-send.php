<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
$secretkey = '6Ld5ZmgUAAAAAMU292NkA6GRShpGO-0_9nXN4r6b';
 
  $antwortJSON = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
  $antwortDaten = json_decode($antwortJSON);

$email_from = 'form@business2000.network';
$email_subject = "Neue Email von Business 2000 Kontaktformular";
$email_body = "Name: $name.\n".
              "Betreff: $subject.\n".
              "Email: $visitor_email.\n".
              "Message: $message.\n";


$to = "m.weigand@business2000.network";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers);

header("Location: contact.php?send");
?>