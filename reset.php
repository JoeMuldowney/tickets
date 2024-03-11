<html>
<?php include '../tickets/headers/header.php'; ?>

<body>

  <div class="page-list">

    <div>
    <h2>Please enter your email and four-digit reset pin</h2>
    </div>
    <form method="POST" action="">
<div>

  <input NAME="UserName" SIZE="40" MAXLENGTH="40" placeholder="Email" style="height: 30px; line-height: 28px;font-size: 17px;">

  <input TYPE= "Password" NAME="Pin" SIZE="25" MAXLENGTH="25" placeholder="Pin" style="height: 30px; line-height: 28px;font-size: 17px;">
  
</div>
  <div class ="buttons">

    <input TYPE="button" value="  Exit  "onClick='window.location.href = "http://sccintranet/wordpress/"'>
      
    <input TYPE="submit" value=" Submit ">
    
  </div>
  </form>
 </div>

<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

 $user = $_POST['UserName'];
 $pass = $_POST['Pin'];
 
 

	require_once "query.php";

    $stmt = $con->prepare("SELECT Email, Password FROM login WHERE Email = ?");
	// Bind the parameter
	$stmt->bind_param("s", $user);

	// Execute the statement
	$stmt->execute();	
	$result = $stmt->get_result();
	
    $row = mysqli_fetch_assoc($result);

    if($user == $row['Email'] && password_verify($pass, $row['Password'])) {
    

    $redirectURL = "../tickets/reset2.php?access=$user";
    header('Location: ' . $redirectURL);
    exit();

   
    }
    else{	
    	$redirectURL = "http://sccintranet/wordpress/";	
	header('Location: ' . $redirectURL);
	exit();	
        
    }
}?>
 
</body>
</html>