<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "contact@puzzleclimat.org";
$subject = "Le Puzzle Climat - message de $name";
$body = "Nouveau message reçu depuis le site web du Puzzle Climat, de la part de $name - $email\n\n$message";
$header = "From: contact@puzzleclimat.org\n";
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
