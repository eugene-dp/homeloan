<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 16-04-2010
	FUNCTION   : Welcome page
	********************************************************/
	ob_start();
	session_start();

	include("includes/config.php");
	include("includes/functions.php");
	
	dbconnect();

	// user validation	
	Admin_authorize();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE_PROJECT ?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="Container">
<!--Logo Banner Starts-->
<?php
	include("includes/header.php");
	?>
<!--Logo Banner Ends-->

<!--Links & contents starts-->

  <div id="LinksNContents">
  	<?php
	include("includes/leftlink.php");
	?>
<!--Links ends-->	

<!--Rightside contents starts-->
	<div id="rightMain">
 	 	<div align="center" class="welcome">
			
			  <div id="CurvedBox">
	  		  <div id="Curvedtopbg"></div>
			  <div id="welcomeText">
			  Welcome to Admin Panel</div>
  			  <div id="Curvedbotbg"></div>
          </div>
 	 	</div>
	</div>
<!--Rightside contents ends-->
  </div>
  <!--Links & contents ends--> 
</div>
</body>
</html>