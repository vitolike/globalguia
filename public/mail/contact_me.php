<?php
// Check for empty fields
// if(empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  // http_response_code(500);
  // exit();
// }

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "cristianomotosom@gmail.com";
$subject = "$subject";
$body = "\n$message \n\n Nome: $name\n\n Email: $email\n\nPhone: $phone";
$header = "From: Global Guia"; 
$header .= "Reply-To: $email";	


if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
