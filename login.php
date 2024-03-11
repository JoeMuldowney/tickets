<html>
<?php include '../tickets/headers/header.php'; ?>

<body>

  <div class="page-list">
    <div>
      <h1>Welcome to the MIS ticket app!</h1>
    </div>
    <div>
      <h2>Please enter your email and password</h2>
    </div>

  
<FORM NAME="LOGON" METHOD="POST" ACTION="/applications/tickets/menu.php" style="display: flex; flex-direction: column; align-items: center;">  

  <input NAME="UserName" SIZE="40" MAXLENGTH="40" placeholder="Email" autocomplete="Username" style="height: 30px; line-height: 28px;font-size: 17px;">
<div style="margin: 5px 0;">
  <input TYPE="password" NAME="Password" SIZE="25" MAXLENGTH="25" placeholder="Password" autocomplete="Password" style="height: 30px; line-height: 28px;font-size: 17px;">
</div>
  <div class ="buttons">
    <input TYPE="button" value="  Exit  "onClick='window.location.href = "http://sccintranet/wordpress/"'>
      
    <input TYPE="submit" value=" LOGIN ">
</FORM>   
     
  </div> 

	<div class ="buttons">
		<h3>If you have not used the MIS ticket app before please click the "Create Login" button </h3>
    <input TYPE="button" value="Create login" onClick='window.location.href = "http://sccapps6/applications/tickets/login_info.php"'>
    </div>
    <div class ="buttons">
    <h3>If you have forgotten your password please click the "Reset Login" button </h3>
    <input TYPE="button" value="Reset login" onClick='window.location.href = "http://sccapps6/applications/tickets/passwordreset.php"'>
	</div>

 </div>
</body>
</html>

