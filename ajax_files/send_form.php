<?php
/**
 * Send callback form
 * @date 25/11/2015
 */
 
function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}

$name = cleanupentries($_POST["name"]);
$email = cleanupentries($_POST["email"]);
$message = cleanupentries($_POST["message"]);

// Send email to administrator
$emailTo  = "=?utf-8?b?".base64_encode('To admin')."
                			?= <info@inshoots.com>";
$subject = "=?utf-8?b?".base64_encode('New message')."?=";
$body = "Name: $name.<br/>Email: $email <br/>Message: $message<br/>Date: ". date('H:i:s m-d-Y');
$headers  = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: =?utf-8?b?".base64_encode('inshoots.com')."?= <noreply@inshoots.com>\r\n";
mail($emailTo, $subject, $body, $headers);