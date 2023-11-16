<div class="container">
<div class="flexing">
<div class="header">
<h2>Ticket submitted by:  <?php echo $userOpen ?></h2>
</div>

</div>
<div class="flexing">
<div style="width: 450px;">
<h3>
<p style="margin-left: 20px;margin-top:-40px;">
Priority:  <?php echo $Priority?><br>
Location:  <?php echo $Location  ?><br>
Category:  <?php echo $Category ?><br>
Image: <span id="imageName" style="cursor: pointer; color: blue; text-decoration: underline;" > <?php echo $Image; $imagePath = 'docs/' . $Image;?> </span><br>

Status: <Select name = "Status">
	<option><?php echo $Status; ?></option>
	<?php while($row = mysqli_fetch_assoc($result5)){?>
	<option value="<?php echo $row['Status'];?>"><?php echo $row['Status'];?></option>    
	<?php } ?>
	</SELECT>
    </p>

	</h3>

</div>

	</div>
	
	<div class="textbox">      
   
    <textarea rows = "10" cols = "150" name = "Description"><?php echo trim($Description);?></textarea>
        	
     
	</div>
	
    <div class="MIS"> 
     	
        <textarea rows = "6" cols = "150" name = "End_Notes" placeholder="Mis notes to resolve TA" required><?php echo trim($CloseDesc);?></textarea>
	</div>

<script>
    
        // Get the image name element
        var imageNameElement = document.getElementById("imageName");

        // Add a click event listener to the image name element
        imageNameElement.addEventListener("click", function() {
            // Get the image path
            var imagePath = '<?php echo $imagePath; ?>';

            // Open the image in a new window or tab
            window.open(imagePath, "_blank");
        });
</script>

</div>
