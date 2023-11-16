<html>

<?php include '../tickets/headers/headerform.php'; ?>

<body>

<?php 

$new_ticket=$_GET['new_ticket'] ?? "";
$ticketId = $_GET['ticket_num'] ?? "";
$user = $_GET['access'];

	require "query.php";		  
	
	$sql = $con->prepare("SELECT UserOpen, Priority, Location, Category, Status, Description, CloseDesc, Image FROM ticketinfo WHERE Id = ?");
	$sql->bind_param("i", $ticketId);
	$sql2 = "SELECT Priority, Id FROM lookuppriority";
	$sql3 = "SELECT Location, Id FROM lookuplocation";
	$sql4 = "SELECT Category, Id FROM lookupcategory";	
	$sql5 = "SELECT Status, Id FROM lookupstatus";
 
    $sql->execute();
	$result = $sql->get_result();
	$result2 = mysqli_query($con, $sql2);
	$result3 = mysqli_query($con, $sql3);
	$result4 = mysqli_query($con, $sql4);
	$result5 = mysqli_query($con, $sql5);
  
?> 

<FORM NAME="TICKET" ENCTYPE="multipart/form-data" METHOD="post" ACTION="/applications/tickets/ticket_save.php">


  <input type="hidden" name="access" value = "<?php echo $user ?>">  
  <input type="hidden" name="User_Updated"  value="<?php echo $user?>">  
    
  <input type="hidden" name="new_ticket"  value="<?php echo $new_ticket?>">
  <input type="hidden" name="ticket_num"  value="<?php echo $ticketId?>">
    
  <input type="hidden" name="dateOpen"  value="<?php echo date("Y-m-d H:i:s")?>">
  <input type="hidden" name="dateUpdate"  value="<?php echo  date("Y-m-d H:i:s")?>">
  <input type="hidden" name="dateClose"  value="<?php echo  date("Y-m-d H:i:s")?>">
<?php 
if($new_ticket == 'yes'){
	
	include '../tickets/NewTicketForm.php';
}
else{
while($row = mysqli_fetch_assoc($result)){	

    $userOpen = $row['UserOpen'];
    $Priority = $row['Priority'];
    $Location = $row['Location'];
    $Category = $row['Category'];
    $Status = $row['Status'];
    $Description = $row['Description'];
    $CloseDesc = $row['CloseDesc'];
	$Image = $row['Image'];
		
		include '../tickets/ExistingTicketForm.php';
}
}?>
<div class="buttons">
	
	<?php if($new_ticket == 'yes'): ?>
	<input TYPE="button" VALUE="<< CANCEL" onClick="history.go(-1)" >
	<input TYPE="submit" VALUE="Submit" style="cursor:pointer;" title="create a ticket">
	
	
	
	<?php else : ?>
	<input TYPE="button" VALUE="<< Cancel" onClick="history.go(-1)" >
	<input TYPE="submit" VALUE="Update" style="cursor:pointer;" title="update ticket info">
	

	<?php endif; ?>
</FORM>
</div>



</body>



</html>