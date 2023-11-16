<div class="container">
<div class="flexing">
<div class="image">
<img src="/applications/tickets/images/photo.png" alt="tech picture" width="850" height = 100>
</div>

<div class="right">
	
    <SELECT NAME="Priority" required>
	<option value>Priority</option>
	<?php while($row = mysqli_fetch_assoc($result2)){?>
	
	<option value="<?php echo $row['Priority'];?>"><?php echo $row['Priority'];?> </option>
	<?php } ?>
		
	</SELECT>
    
    <SELECT NAME="Location" required>
	<option value>Location</option>
	<?php while($row = mysqli_fetch_assoc($result3)){?>
	<option value="<?php echo $row['Location'];?>"><?php echo $row['Location'];?> </option>
	<?php } ?>
	</SELECT>
		
 		
	<select name = "Category" required>
	<option value>Issue</option>
	<?php while($row3 = mysqli_fetch_assoc($result4)){?>
	<option value="<?php echo $row3['Category'];?>"><?php echo $row3['Category'];?></option>
	<?php } ?>
    </SELECT>
	</div>
    </div>
	
	<div class="flexing">
	<div class="textbox">      
   
    <textarea rows = "14" cols = "100" name = "Description" id="descriptionTextarea" placeholder="Please provide a detailed description of the issue" required></textarea>
        	
    </div>

		
	<div class="right">		
    <div class="upload">
    Click the <b>Choose File</b> button below to include an image or a document:<br>
    <br>
    <input type="file"name="file_upload">
	</div>
    </div>
	</div>
</div>
