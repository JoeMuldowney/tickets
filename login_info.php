<html>
<?php include '../tickets/headers/header.php'; ?>

<body>

  <div class="page-list">

    <div>
      <h2>Please enter your email and create a password for your MIS ticket login credentials</h2>
    </div>
    <form method="POST" action="">
<div>
  <input NAME="UserName" SIZE="40" MAXLENGTH="40" placeholder="Email" style="height: 30px; line-height: 28px;font-size: 17px;">
  
  <input TYPE="Password" NAME="Password" SIZE="25" MAXLENGTH="25" placeholder="Password" style="height: 30px; line-height: 28px;font-size: 17px;">
</div>
  <div class ="buttons">
    <input TYPE="button" value="  Exit  "onClick='window.location.href = "http://sccintranet/wordpress/"'>
      
    <input TYPE="submit" value=" Submit ">
    
  </div>
  </form>
  

	<div>
		<h3>Example name: John Doe, User name: john.doe@sccmail.org</h3>
    </div>
 </div>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $user = $_POST['UserName'];
 $pass = $_POST['Password'];

 $Epass = password_hash($pass, PASSWORD_DEFAULT);	

	require_once "query.php";

    $insertquery = "INSERT INTO login (Email, Password) VALUES (?,?);";			
		
	
	$stmt = $con->prepare($insertquery);

	$stmt->bind_param("ss", $user, $Epass);
	$stmt->execute();

    if ($stmt->affected_rows > 0) {
      $redirectURL = "../tickets/";
      header('Location: ' . $redirectURL);
      exit();
 
      
    } else {
        echo "Error inserting record: " . $stmt->error;
    }

}
?>

</body>
</html>