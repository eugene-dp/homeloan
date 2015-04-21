<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 16-04-2010
	FUNCTION   : Admin login validation
	********************************************************/
	ob_start();
	session_start();

	include("includes/config.php");
	include("includes/functions.php");

	dbconnect();
	
	// retriveing values from client side
	$user		=	$_POST['txt_user'];
	$password	=	$_POST['txt_pass'];
	
	//	encripting pasword
	$pass		=	md5($password);

	//  database serching 	
	$select		=	"select * from  omort_admin where admin_username='$user' and admin_password='$pass'";
	$result		=	Query($select) or die("cannot select".mysql_error());
 
	//  if results get after searching
	if(mysql_num_rows($result)>0){
		$fet_user	=	mysql_fetch_array($result);
		
		// admin user name added to session for further use		
		$_SESSION['AL_MCAL']	=	$fet_user['admin_id'];

		// now redirecting the user to welcome page		
		$url	=	"welcome.php";
		page_redirect($url);
	}else{
		$msg	=	"Invalid Login";
		$url="index.php?msg=$msg";
		page_redirect($url);
		//header("location:welcome.php");
		
	}
?>