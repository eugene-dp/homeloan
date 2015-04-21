<?php
/********************************************************

DATE	   : 20-03-2010
FUNCTION   : Forgot password

********************************************************/

	ob_start();
	session_start();
	
	include("includes/config.php");
	include("includes/functions.php");
			
	dbconnect();
	
	if(isset($_POST['Submit'])){
	
	// taking values from client side
	$user_name=$_REQUEST['txt_username'];
	$email_id=$_REQUEST['txt_email'];
	
	// searching the table
	$recovery="select * from  ". TBL . "admin where admin_username='$user_name' and admin_email='$email_id' ";
	$recovery_result=Query($recovery);

	 for($i=0;$i<mysql_num_rows($recovery_result);$i++){
		 $email_db=mysql_result($recovery_result,$i,'admin_email');
					
		 if($email_db==$email_id){ 
		
			//  creating new password
			 $newpass	=	makeRandomPassword();
		
			// 	making new password to lowercase
			 $newpass1	=	strtolower($newpass);
					
			//  encripting new apssword
			$enpass	=	md5($newpass1);
			
		
		/*			
			$fields	=	"admin_password ='$enpass'";
			$condition	=	"where admin_email='$email_id'";
			$table_name=	" ". TBL . "admin";
		*/	
					
			$sql = "update ". TBL . "admin set admin_password='".$enpass."' where admin_username = '".$user_name."' ";
		
			Query($sql);
			
			// now sending admin new password
			$mailbody=' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="" content="" />
<meta name="keywords" content="" />

<title>Oxygen Home Loans</title>
</head>

<body>
   <table width="600" border="0" cellspacing="0" cellpadding="0" style="margin:0px; padding:1px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px;  border:#000859 solid 1px;">
     <tr>
       <td align="left" valign="top" height="50" style="padding:0px; background:#e9e9e9" ><img  src="http://o2homeloans.com/code/images/mailer-logo.gif" alt="Oxygen Home Loan" style="padding:1px 0 0 10px;"    border="0" /></td>
     </tr>
     <tr>
       <td><table width="100%" border="0" cellspacing="10" cellpadding="5" style="background:#fff; color:#333;" >
           <tr>
             <td align="left" valign="top" colspan="5" style=" border:1px solid #cfcfcf;">Please find the login details below</td>
           </tr>
           <tr>
             <td width="40%" align="left" valign="top"  style=" border:1px solid #cfcfcf;">User Name</td>
             <td colspan="3" width="60" align="left" valign="top"  style=" border:1px solid #cfcfcf;" >'.$user_name.'</td>                          
           </tr><tr>
             <td align="left" valign="top"  style=" border:1px solid #cfcfcf;" >Password</td>
             <td colspan="3" align="left" valign="top"  style=" border:1px solid #cfcfcf;" >'.$newpass1.'</td>                          
           </tr>  
		    
       </table></td>
     </tr>
   </table>
 </body>
</html>

';

		
	$from	    =	$email_db;
	$to			= $email_id;
	$headers  	=	"MIME-Version: 1.0\r\n";
	$headers	.=	"Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
	$headers	.=	"From:".$from."\r\n";
	$subject 	=	"Oxygen Home Loans - Admin Login Details";
			
	@mail($to,$subject,$mailbody,$headers);
	$str	  = "Password sent to YOUR Mail ..Please Check It Out";
			
	}else{
	$frm_server_side_error="1";
	}
}
		
	if(mysql_num_rows($recovery_result)==0){
		$frm_server_side_error="1";
	}
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE_PROJECT ?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />

<script language="javascript">

//check file type
function valid(){
	if(document.frm.txt_username.value==""){
		alert("Please Enter User Name");
		document.frm.txt_username.focus();
		return false;
	}			  
	if(document.frm.txt_email.value==""){
		alert("Please Enter Email");
		document.frm.txt_email.focus();
		return false;
	}
	return true;
}
	
</script>
</head>
<body>
<div id="Container">
<!--Logo Banner Starts-->

	<div id="logoBanner">
		<a href="index.php" class="logout"><strong>Login</strong></a>	
		<a href="index.php"><img src="images/logo.gif" alt="Oxygen Home Loans" style="padding:7px 0 0 0;" border="0" /></a>	
	</div>
<!--Logo Banner Ends-->

<!--Links & contents starts-->

	<div id="LinksNContents">
	  <div id="PasswordtopMargin">
	  	<div align="center">
		<form action="<?=$_SERVER['PHP_SELF']?>"  method="post" name="frm" onsubmit="return valid();">
			  <div class="PasswordContent">
		  		<h2 class="Passwordheading">Forgot Password?</h2> 
		  		<!--Page Heading-->
				If you forgot your password. please fill in below and submit to us. <br />
				You will receive your password via e-mail. <br /><br />
				<ul id="errors">
				<?php if($frm_server_side_error==1){?>
				<li><b><font color="#FF00FF" >Username and Email Id does not match</font></b></li></ul>
				<?php } else if($email_db==$email_id){?><b><font color="#006600"  ><? echo $str;?></font></b><br /> <br />
				<?php } ?> 
				<div id="CurvedBox_pass">
	  				  <div id="Curvedtopbg_pass"></div>
					  <div id="PasswordForm">
						<div class="PasswordFields">
						<label><span class="mandatory">*</span> Username</label>
						<input name="txt_username" type="text" id="txt_username" />
						</div>
						<div class="PasswordFields">
						  <label><span class="mandatory">*</span> Email ID</label>
						  <input name="txt_email" type="text" id="txt_email" />
						</div>
					  </div>
  			  	    <div id="Curvedbotbg_pass"></div>
       		    </div>
        <!--Bottom Button Block Starts-->
	  <div id="BottombuttonBlock">
	  <input name="Submit" type="submit" class="send_btn" value="" />
	  <input name="cancel" type="reset" class="reset_bttn" value="" />
	  </div>
		<!--Bottom Button Block ends-->
				
	  </div>
	  </form>
      </div>
	  </div>
</div>
<!--Links & contents ends-->
</div>
</body>
</html>