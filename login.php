<html>
<?php include '../tickets/headers/header.php'; ?>

<body>

  <div class="page-list">
    <div>
      <h1>Welcome to the MIS ticket app!</h1>
    </div>
    <div>
      <h2>Please enter your user name</h2>
    </div>

  
<FORM NAME="LOGON" METHOD="post" ACTION="/applications/tickets/menu.php">  

  <input NAME="UserName" SIZE="25" MAXLENGTH="25" placeholder="USER NAME" style="height: 30px; line-height: 28px;font-size: 17px;">    

  <div class ="buttons">
    <input TYPE="button" value="  Exit  "onClick='window.location.href = "http://sccintranet/wordpress/"'>
      
    <input TYPE="submit" value=" LOGIN ">
  </div>
 
  
</FORM>
	<div>
		<h3>Example name: John Doe, User name: DoeJ</h3>
	</div>
 </div>
</body>
</html>

