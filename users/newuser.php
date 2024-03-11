<html>
<?php include '../headers/userheader.php'; ?>

<body>

<div class="page-list">

<div>
  <h2>Please enter the new user's preferred name</h2>
</div>
<form method="POST" action="">
<div>
<input NAME="Fname" SIZE="40" MAXLENGTH="40" placeholder="First Name" style="height: 30px; line-height: 28px;font-size: 17px;">

<input  NAME="Lname" SIZE="40" MAXLENGTH="40" placeholder="Last Name" style="height: 30px; line-height: 28px;font-size: 17px;">
</div>
<div class ="buttons">
<input TYPE="button" value="  Exit  "onClick='window.location.href = "http://sccintranet/wordpress/"'>
  
<input TYPE="submit" value=" Submit ">

</div>

</form>

</div>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$fname = $_POST['Fname'];
$lname = $_POST['Lname'];	

require_once "query.php";

$insertquery = "INSERT INTO newuser (firstname, lastname) VALUES (?,?);";			
    

$stmt = $con->prepare($insertquery);

$stmt->bind_param("ss", $fname, $lname);
$stmt->execute();


}
?>

</body>
</html>