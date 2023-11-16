<?php

	require_once "emailquery.php";
	
	$emailquery = "SELECT First_Name, Email FROM Staff WHERE Login_ID = :user";	
	$stmte = $db->prepare($emailquery);
	$stmte->bindParam(':user', $user);
	$stmte ->execute();
	$results = $stmte->fetch(PDO::FETCH_ASSOC);	
	
	$db = null;
	$stmte = null;
	foreach($results as $row){
	
		$Name = $row['First_Name'];
		$Email = $row['Email'];
		$misEmail = 'mis@sccmail.org';
	}
	$to = $misEmail . "," . $Email;
	$subject = "SCC Support Ticket Received - $nextId";
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

?>    
else{

$ticket_num = $_POST['ticket_num'];
$MIS_Notes = trim($_POST['End_Notes']);
if($Status == 'Closed'){
	$Date_Closed = $_POST['Close_Date'] ?? "";
}


try{
	require_once "query.php";

	$queryupdate = "UPDATE Ticket SET Status = :Status, User_Update = :User_Updated, Updated = :Update, Description = :Description, 
	Date_Closed =:Closed, End_Notes =:End_Notes WHERE Ticket_Num = :Ticket";
	$stmt = $db->prepare($queryupdate);	
	$stmt->bindParam(':Ticket', $ticket_num);		
	$stmt->bindParam(':Status', $Status);
	$stmt->bindParam(':User_Updated', $user);
	$stmt->bindParam(':Update', $Updated);
	$stmt->bindParam(':Description', $Description);
	$stmt->bindParam(':Closed', $Date_Closed);
    $stmt->bindParam(':End_Notes', $MIS_Notes);
	
	
	$getUser = "Select User_Add From Ticket Where Ticket_Num = :Ticket";
	$stmt1 = $db->prepare($getUser);
	$stmt1->bindParam(':Ticket', $ticket_num);	
	

	$stmt->execute();
	$stmt1->execute();
	
	$nameResults  = $stmt1->fetch(PDO::FETCH_ASSOC);
	
	$emailUser = $nameResults['User_Add'];
	
	$stmt = null;
	$stmt1 = null;
	$db = null;
	
	require_once "emailquery.php";
	
	$emailquery = "SELECT First_Name, Email FROM Staff WHERE Login_ID = :getUser";	
	$stmte = $db->prepare($emailquery);
	$stmte->bindParam(':getUser', $emailUser);
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
	$to = $misEmail . "," . $Email;
	$subject = "$ticket_num - SCC Support Ticket Closed";
	
	
	
	$message = "Dear $Name,
	
Support ticket #$ticket_num has been resolved and closed.  Here is the resolution:

{$MIS_Notes}

If you encounter any further issues, please submit a new support ticket.
	

MIS Department
Senior Connection Center";
	
}	
else{
	
		if($results){
		$Name = $results['First_Name'];
		$Email = $results['Email'];
		
	}
	$to = $Email;
	$subject = "$ticket_num - SCC Support Ticket Pending";
	
	
			$message = "Dear $Name,
	
Our team is working diligently to resolve your ticket #$ticket_num as quickly as possible.  
We will provide you with another update as soon as we have more information..

MIS Department
Senior Connection Center";
}
	$headers = 'From: mis@sccmail.org';
	if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'Error sending email.';
}
	
	$redirectUrl = "ticket_list.php?access=$user";
    header("Location: $redirectUrl");
	
}
catch (PDOException $e){
		die("Query failed: " . $e->getMessage());
}
}




	
?>
onerror="displayDefaultImage()"