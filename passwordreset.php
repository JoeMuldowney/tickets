<html>
<?php include '../tickets/headers/header.php'; ?>

<body>

  <div class="page-list">

    <div>
      <h2>Please enter your scc email to receive pin to reset your password</h2>
    </div>
    <form method="POST" action="">
<div>
  <input NAME="UserName" SIZE="40" MAXLENGTH="40" placeholder="Email" style="height: 30px; line-height: 28px;font-size: 17px;">
  
</div>
  <div class ="buttons">

    <input TYPE="button" value="  Exit  "onClick='window.location.href = "http://sccintranet/wordpress/"'>
      
    <input TYPE="submit" value=" Submit ">
    
  </div>
  </form>
 </div>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $user = $_POST['UserName'];
 $randomNumber = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); 
 $Epass = password_hash($randomNumber, PASSWORD_DEFAULT);

	require_once "query.php";

    $sqlupdate = "UPDATE login
               SET Password = ?         
               WHERE Email = ?";			
		
	
	$stmt = $con->prepare($sqlupdate);

	$stmt->bind_param("ss", $Epass, $user);
  
	$stmt->execute();

  //send out email	
	$to = $user;
	$subject = "MIS Ticket Password Reset Pin ";
	$message = "
	
We've received your request to change your password.<br>
Please copy your reset pin number $randomNumber and click on the link below.<br>
<a href='http://sccapps6/applications/tickets/reset.php'>Click here to reset your password</a><br><br>

Thank you for your patience.
	

MIS Department
Senior Connection Center";
	$headers = 'From: mis@sccmail.org';
	$headers .= "\r\nContent-Type: text/html; charset=UTF-8";

  if (mail($to, $subject, $message, $headers)) {
  $redirectURL = "http://sccintranet/wordpress/";	
  header('Location: ' . $redirectURL);       
  exit();
} else {
    echo 'Error sending email.';
}



}

?>
 
</body>
</html>
