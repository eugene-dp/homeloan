<?php
	/********************************************************
	DATE	   : 16-04-2010
	FUNCTION   : Manage index page
	********************************************************/
	ob_start();
	session_start();

	include("includes/config.php");
	include("includes/functions.php");
	
	dbconnect();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE_PROJECT?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="Container">
<!--Logo Banner Starts-->
	<div id="logoBanner">
		<a href="index.php"><img src="images/logo.gif" alt="Oxygen Home Loans" style="padding:7px 0 0 0;" border="0" /></a>	</div>
<!--Logo Banner Ends-->

<!--Links & contents starts-->

	<div id="LinksNContents">
	
	<form name="frmlogin" action="validate_user.php" method="post" enctype="multipart/form-data">
	
	  <div id="loginBoxtopMargin">
	  	<div align="center">
		  <div id="loginBox">
		  	<div id="logintopbg"></div>
	  	  	<div id="loginPic">
				<div id="loginError">
				<?php
				if(@$_REQUEST['msg']!='') { ?><img src="images/login_error.gif" alt="Error" width="16" height="14" />
				Invalid Username and Password 
				<?php } ?>				
				</div>
			 		<div id="loginForm">
					<input type="submit" name="btn_login" class="loginbutton" value="" />				
					<div class="loginFields"><label>Username</label>
					<input name="txt_user" type="text" id="txt_user" />
					</div>
					<div class="loginFields"><label>Password</label><input name="txt_pass" type="password" id="txt_pass" />
					</div>
					
				  <div id="forgotpass">
				    <span class="notice">*</span> Forgot Password? <span class="blueNbold">
					<a href="forgot_password.php">Click Here</a></span></div>
		  	  	</div>
		    </div>
		  	 <div id="loginbotbg"></div>
		  </div>
        </div>
	  </div>	  
	  </form>
	  
  </div>
<!--Links & contents ends-->
</div>
</body>
</html>
