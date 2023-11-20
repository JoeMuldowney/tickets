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


try{	

	require_once "query.php";	
	$sql = "SELECT MAX(Id) AS lastId FROM ticketinfo";	
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);	
	$lastInsertId = $row['lastId'];
	$nextId = $lastInsertId + 1;
	
	

	
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
	
	
	$insertquery = "INSERT INTO ticketinfo (DateOpen, UserOpen, Priority, Location, Category, Status, Description, Image) VALUES (?,?,?,?,?,?,?,?);";			
		
	
	$stmt = $con->prepare($insertquery);

	$stmt->bind_param("ssssssss", $dateOpen, $user, $Priority, $Location, $Category, $Status, $Description, $newFileName);
	$stmt->execute();	
/*	
	require_once "emailquery.php";
	
	$emailquery = "SELECT First_Name, Email FROM Staff WHERE Login_ID = :user";	
	$stmte = $db->prepare($emailquery);
	$stmte->bindParam(':user', $user);
	$stmte ->execute();
	$results = $stmte->fetch(PDO::FETCH_ASSOC);	
	
	$db = null;
	$stmte = null;
	
	if($results){
		$Name = $results['First_Name'];
		$Email = $results['Email'];
		$misEmail = 'mis@sccmail.org';
	}
	$to = $misEmail . "," . $Email;
	$subject = "SCC Support Ticket #$nextId Received ";
	$message = "Dear $Name,
	
We've received your support ticket and are actively working on it. Expect a response from our team soon.

Thank you for your patience.
	

MIS Department
Senior Connection Center";
	$headers = 'From: mis@sccmail.org';
	
	
if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
}  else {
    echo 'Error sending email: ' . error_get_last()['message'];
}
	
	

	
	
	

*/
$redirectUrl = "ticket_list.php?access=$user";
header("Location: $redirectUrl");	
}catch (PDOException $e){
	die("Query failed: " . $e->getMessage());
}
}

else{

$Id = $_POST['ticket_num'];
$Status = $_POST['Status'];
$CloseDesc = trim($_POST['End_Notes']);
$dateUpdate = $_POST['dateUpdate'];
if($Status == 'Closed'){
	$DateClose = $_POST['dateClose'];
}


try{
	require_once "query.php";

$sqlupdate = $queryupdate = "UPDATE ticketinfo
               SET Status = ?,
				   DateUpdate = ?,
				   DateClose = ?, 
				   CloseDesc = ?,
                   UserUpdate = ?           
                WHERE Id = ?";			   
			   
$stmt = $con->prepare($sqlupdate);
		   
$stmt->bind_param('sssssi', $Status, $dateUpdate, $DateClose, $CloseDesc, $user, $Id);

$stmt->execute();

$getUser = "Select UserOpen From Ticketinfo Where Id = ?";
$stmt1 = $con->prepare($getUser);
$stmt1->bind_param('i', $Id);	
	
$stmt1->execute();
	
    $stmt1->bind_result($userOpen);
    $stmt1->fetch();

$stmt1->close();	
/*
require_once "emailquery.php";
	
	$emailquery = "SELECT First_Name, Email FROM Staff WHERE Login_ID = :getUser";	
	$stmte = $db->prepare($emailquery);
	$stmte->bindParam(':getUser', $userOpen);
	$stmte ->execute();
	$results = $stmte->fetch(PDO::FETCH_ASSOC);
	
	$db = null;
	$stmte = null;
	
if($Status =='Closed'){	
	
	if($results){
		$Name = $results['First_Name'];
		$Email = $results['Email'];
		$misEmail = 'mis@sccmail.org';
	}
	$to = $misEmail. ",". $Email;
	$subject = "SCC Support Ticket #$Id Closed";
	
	
	
	$message = "Dear $Name,
	
Support ticket #$Id has been resolved and closed.  Here is the resolution:

{$CloseDesc}

If you encounter any further issues, please submit a new support ticket.
	

MIS Department
Senior Connection Center";
$headers = 'From: mis@sccmail.org';

	if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Error sending email.';
}
	
}	
else{
	
		if($results){
		$Name = $results['First_Name'];
		$Email = $results['Email'];
		
	}
	$to = $Email;
	$subject = "SCC Support Ticket #$Id Pending";
	
	
			$message = "Dear $Name,
	
Our team is working diligently to resolve your ticket #$Id as quickly as possible.  
We will provide you with another update as soon as we have more information..

MIS Department
Senior Connection Center";

	$headers = 'From: mis@sccmail.org';
	if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Error sending email.';
}	
}	



}
*/
$redirectUrl = "ticket_list.php?access=$user";
header("Location: $redirectUrl");
}catch (PDOException $e){
	die("Query failed: " . $e->getMessage());
}}	
?>




