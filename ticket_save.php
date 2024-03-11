<?php

$new_ticket = $_POST['new_ticket'] ?? "";
$user = $_POST['access'];
$Description = trim($_POST['Description']);
$dateOpen = $_POST['dateOpen'];
$file = $_FILES['file_upload'] ?? null;

if($new_ticket=='yes'){
$Priority = $_POST['Priority'];
$Category = $_POST['Category'];
$Location = $_POST['Location'];
$Status = 'Open';
	
	// need to get first empty ticket num
	require_once "query.php";	
	$sql = "SELECT MAX(Id) AS lastId FROM ticketinfo";	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);	
	$lastInsertId = $row['lastId'];
	$nextId = $lastInsertId + 1;
	
	// picture upload
	if ($file !== null) {
	$allowedExtensions = ["jpg", "jpeg", "png", "pdf"];
	$fileName = $_FILES['file_upload']['name']; // Original name of the uploaded file
	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
	
	if (in_array($fileExtension, $allowedExtensions)){
	$newFileName = $nextId . '_' . $fileName;	
    $tempFilePath = $_FILES['file_upload']['tmp_name']; // Temporary path of the uploaded file
	
    // Move the uploaded file to your desired directory (e.g., "uploads")
    $upload_dir = 'docs/';
    $targetFilePath = $upload_dir . $newFileName;
	
	move_uploaded_file($tempFilePath, $targetFilePath);
	}
	}
	// insert ticket info to database
	$insertquery = "INSERT INTO ticketinfo (DateOpen, UserOpen, Priority, Location, Category, Status, Description, Image) VALUES (?,?,?,?,?,?,?,?);";			
	$stmt = $con->prepare($insertquery);

	$stmt->bind_param("ssssssss", $dateOpen, $user, $Priority, $Location, $Category, $Status, $Description, $newFileName);
	$stmt->execute();

	//send out email	
	$Email = $user;
	$misEmail = 'mis@sccmail.org';
	
	$to = $misEmail . "," . $Email;
	$subject = "SCC Support Ticket #$nextId Received ";
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
	$redirectUrl = "ticket_list.php?access=$user";
    header("Location: $redirectUrl");
}
else{

$Id = $_POST['ticket_num'];
$Status = $_POST['Status'];
$CloseDesc = trim($_POST['End_Notes']);
$dateUpdate = $_POST['dateUpdate'];
if($Status == 'Closed'){
	$DateClose = $_POST['dateClose'];
}

require_once "query.php";

$sqlupdate = "UPDATE ticketinfo
               SET Status = ?,
				   DateUpdate = ?,
				   DateClose = ?, 
				   CloseDesc = ?,
                   UserUpdate = ?           
                WHERE Id = ?";			   
			   
$stmt = $con->prepare($sqlupdate);		   
$stmt->bind_param('sssssi', $Status, $dateUpdate, $DateClose, $CloseDesc, $user, $Id);
$stmt->execute();

	$stmtEmail = $con->prepare("SELECT UserOpen FROM ticketinfo where Id = ?");	
	$stmtEmail->bind_param("i", $Id);
	$stmtEmail->execute();	
	$result = $stmtEmail->get_result();
	$row = mysqli_fetch_assoc($result);
	$emailToUser = $row['UserOpen'];
	
	

	
if($Status =='Closed'){		
		
	$Email = $emailToUser;
	$misEmail = 'mis@sccmail.org';
	$to = $misEmail . "," . $Email;
	$subject = "SCC Support Ticket #$Id Closed";	
	$message = "
	
Support ticket #$Id has been resolved and closed.  Here is the resolution:

{$CloseDesc}

If you encounter any further issues, please submit a new support ticket.<br>
<a href='http://sccapps6/applications/tickets/login.php'>Click here to view your ticket</a><br><br>
	

MIS Department
Senior Connection Center";
$headers = 'From: mis@sccmail.org';
$headers .= "\r\nContent-Type: text/html; charset=UTF-8";

	if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Error sending email.';
}
	
}	
else{		
	
	$Email = $emailToUser;		
	$misEmail = 'mis@sccmail.org';
	$to = $misEmail. ",". $Email;
	$subject = "SCC Support Ticket #$Id Pending";	
	$message = "
	
Our team is working diligently to resolve your ticket #$Id as quickly as possible.  
We will provide you with another update as soon as we have more information..<br>
<a href='http://sccapps6/applications/tickets/login.php'>Click here to view your ticket</a><br><br>

MIS Department
Senior Connection Center";

	$headers = 'From: mis@sccmail.org';
	$headers .= "\r\nContent-Type: text/html; charset=UTF-8";
	
	if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Error sending email.';
}	
}	
	$redirectUrl = "ticket_list.php?access=$user";
    header("Location: $redirectUrl");
}
?>




