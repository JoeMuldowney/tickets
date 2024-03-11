
<?php

$user = $_POST['UserName'];
$pass = $_POST['Password'];
	
require_once "query.php";


    $stmt = $con->prepare("SELECT Email, Password, Auth FROM login WHERE Email = ?");
	// Bind the parameter
	$stmt->bind_param("s", $user);

	// Execute the statement
	$stmt->execute();	
	$result = $stmt->get_result();
	
$row = mysqli_fetch_assoc($result);


if($user == $row['Email'] && password_verify($pass, $row['Password'])){
	
$redirectURL = "../tickets/ticket_list.php?access=$user";
header('Location: ' . $redirectURL);
exit();

}
else{	
	$redirectURL = "http://sccintranet/wordpress/";	
	header('Location: ' . $redirectURL);
	exit();	
}

?>


