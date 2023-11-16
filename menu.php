
<?php

$user = $_POST['UserName'];
	
try{

$databasePath = 'I:\cgi-bin\users.mdb';

$db = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$databasePath;");
	
$query = "SELECT Login_ID, Rights_inv FROM SECURITY_USERS WHERE Login_ID = :UserName";

$stmt = $db->prepare($query);

$stmt->bindParam(':UserName', $user);		   
    
$stmt->execute();
     
$results = $stmt->fetch(PDO::FETCH_ASSOC);
	


if($results != false){
	
$redirectURL = "../tickets/ticket_list.php?access=$user";
header('Location: ' . $redirectURL);

}

else{	
	$redirectURL = "http://sccintranet/wordpress/";	
	header('Location: ' . $redirectURL);	
}
$db = null;
$stmt = null;

}catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

?>


