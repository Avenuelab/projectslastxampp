<?php 

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$message = stripslashes($_POST['message']);
$formcontent="From: $name \n Message: $message";
$recipient = "info@washasacco.co.ke";
$subject = "Enquiry";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You! for Getting in touch. We will revert in 24hrs";
echo '<meta http-equiv="refresh" content="2;URL=index.php">';  
?>