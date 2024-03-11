<?php

	$Email = "joe.muldowney@sccmail.org";
	$misEmail = 'mis@sccmail.org';
	
	$to = $misEmail . "," . $Email;
	$subject = "SCC Support Ticket Received ";
	$message = "
	
We've received your support ticket and are actively working on it. Expect a response from our team soon.<br>
<a href='http://sccapps6/applications/tickets/login.php'>Click here to view your ticket</a><br><br>

Thank you for your patience.
	

MIS Department
Senior Connection Center";
	$headers = 'From: mis@sccmail.org';
	$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
	
	
if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
}  else {
    echo 'Error sending email: ' . error_get_last()['message'];
}

?>