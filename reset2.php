<html>
<?php include '../tickets/headers/header.php'; ?>

<body>

  <div class="page-list">

    <div>
      <h2>Please enter your new password</h2>
    </div>
    <form method="POST" action="">
<div>
 
  <input TYPE= "Password" NAME="Password" SIZE="25" MAXLENGTH="25" placeholder="New Password" style="height: 30px; line-height: 28px;font-size: 17px;">
  
</div>
  <div class ="buttons">    
      
    <input TYPE="submit" value=" Submit ">
    
  </div>
  </form>
 </div>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$user = $_GET['access'];
$pass = $_POST['Password']; 
$Epass = password_hash($pass, PASSWORD_DEFAULT);
 

	require_once "query.php";

    $sqlupdate = "UPDATE login
        SET Password = ?         
        WHERE Email = ?";			


$stmt = $con->prepare($sqlupdate);

$stmt->bind_param("ss", $Epass, $user);

$stmt->execute();

$redirectURL = "../tickets/ticket_list.php?access=$user";
header('Location: ' . $redirectURL);
exit();

   

} 
?>
 
</body>
</html>