<html>
<?php include '../tickets/headers/dashboardHeader.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    var toggleOn = $("#toggleButton").data("toggled") === true;

    // Function to toggle elements
    function toggleElements() {
        if (toggleOn) {
            $("#toggleButton").text("All Tickets");
            $(".content:contains('Closed')").hide();
        } else {
            $("#toggleButton").text("Open Tickets");
            $(".content").show();
        }
    }

    // Call the function initially to set the initial state
    toggleElements();

    // Add a click event handler to the button
    $("#toggleButton").click(function () {
        toggleOn = !toggleOn; // Toggle the state
        toggleElements(); // Call the function to toggle elements
    });
});
$(document).ready(function () {
    $("#search").on("keyup", function () {
        var searchTerm = $(this).val().toLowerCase();
        $(".content").each(function () {
            var text = $(this).text().toLowerCase();
            if (text.indexOf(searchTerm) === -1) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    });
});
</script>
</head>
<body>
<?php 
$new_ticket = 'yes';
$Total_Ticket = 0;
$Open_tickets = 0;
$user = $_GET['access'];
?>
<div class="buttons-list">	


	<input TYPE="button" VALUE="Create Ticket" onClick="window.location='ticket.php?new_ticket=<?php echo $new_ticket; ?>&access=<?php echo $user; ?>'" >
	
	<button id="toggleButton" data-toggled="true">Open Tickets</button>

	<input type="text" id="search" placeholder="Search..."> 
	
	
	<input TYPE="button" VALUE="Exit" onClick='window.location.href = "http://sccintranet/wordpress/"' title="return to intranet" >
</div>



<div class="page-list"> 


<div class="container-list-names">  
<div class="grid-item-titleticket" title="ticket number">Ticket</div>

<div class="grid-item-titledate" title="Opened date">Date Opened</div> 

<div class="grid-item-titlestatus"title="ticket status">Status</div> 

<div class="grid-item-titleuser"title="Opened by">User Name</div> 

<div class="grid-item-titlecat"title="Kind of device">Category</div> 
     
<div class="grid-item-titlelocation"title="location">Location</div> 

<div class="grid-item-titleprior"title="ticket priority">Priority</div> 

<div class="grid-item-titledate"title="updated date">Updated</div> 

<div class="grid-item-titleuser"title="updated by">Assigned</div> 

<div class="grid-item-titledate"title="ticket status">Closed</div> 
</div> 

       
   


<div class="container-list" id ="ticketInfo">
<?php




try{
	
	if($user == 'joe.muldowney@sccmail.org' || $user == 'frank.wagoner@sccmail.org' || $user == 'trevor.buitron@sccmail.org'){
	require_once('query.php');

    $sql = "SELECT Id, DateOpen, UserOpen, Category, Status, Location, Priority, UserUpdate, DateUpdate, DateClose FROM ticketinfo";
	$result = mysqli_query($con, $sql); 
	}
	else{
	require_once('query.php');

    $stmt = $con->prepare("SELECT Id, DateOpen, UserOpen, Category, Status, Location, Priority, UserUpdate, DateUpdate, DateClose FROM ticketinfo WHERE UserOpen = ?");
	// Bind the parameter
	$stmt->bind_param("s", $user);

	// Execute the statement
	$stmt->execute();	
	$result = $stmt->get_result();}	
      

while($row = mysqli_fetch_assoc($result)){
	$Total_Ticket++;	
	if($row['Status'] == 'Open') {
       $Open_tickets++;
	}
	$row['Id'];  
    $row['DateOpen'];
    $row['UserOpen'];
	$row['Status'];
    $row['Category'];
    $row['Location'];  
    $row['Priority'];
    $row['DateUpdate'];
    $row['UserUpdate'];
    $row['DateClose'];

?>
 
<div class="content">
	<div class="grid-item-ticket"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['Id'];?></div>
	<div class="grid-item-date"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php  echo $row['DateOpen']; ?></div>
	<div class="grid-item-status"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['Status']; ?></div>
	<div class="grid-item-user"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['UserOpen'];?></div>
	<div class="grid-item-cat"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['Category'];?></div>
	<div class="grid-item-location"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['Location']; ?></div>
    <div class="grid-item-prior"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['Priority'];?></div>	
	<div class="grid-item-date"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['DateUpdate'];?></div>		
    <div class="grid-item-user"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['UserUpdate'];?></div>		 
	<div class="grid-item-date"onclick="window.location.href = 'ticket.php?access=<?php echo $user ?>&ticket_num=<?php echo $row['Id']?>'"><?php echo $row['DateClose'];?></div>
	</div> 
<?php
}
}catch (PDOException $e){
	die("Query failed: " . $e->getMessage());
}
?>


</div>


<div style="margin: 35px;">
	<div>Open Tickets: <?php echo $Open_tickets ?></div>
    <div>Total Tickets: <?php echo $Total_Ticket ?></div>

</div>

</body>
</html>
