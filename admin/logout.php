<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 16-04-2010
	FUNCTION   : Logout page
	********************************************************/
	session_start();
	
	// include section	
	include("includes/functions.php");
	include("includes/config.php");
	
	// session variable reinitialization
	$_SESSION['WL_USER'] = "";
	
	// destroying session
	session_destroy();
	
	// now move to index page
	page_redirect("index.php");
?>