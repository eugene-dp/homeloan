<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 20-03-2010
	FUNCTION   : My Account
	********************************************************/
	ob_start();
	session_start();
	
	// include section
	include("includes/config.php");
	include("includes/functions.php");
	
	// database connection
	dbconnect();
	
	// user validation	
	Admin_authorize();

	//get page information
	$msg=@$_REQUEST['msg'];

	//return URL Preparation
	$table_name	=	TBL."admin";
	$return_url	= "my_account.php?msg=1";
	
	//get the current details
	$sql		=	"SELECT admin_username,admin_password,admin_email FROM $table_name where admin_id='".$_SESSION['AL_MCAL']."'";
	$rs			=	Query($sql);
	list($name,$pwd,$mail,$cmail)=mysql_fetch_row($rs);
	$frm_server_side_error ="1";
		
	if(@$_POST){
		 $name		=	trim(@$_REQUEST["txt_user"]);
		 $mail 		=	trim(@$_REQUEST["txt_mail"]);
		 $cmail 	=	trim(@$_REQUEST["txt_cmail"]);
		 $oldpwd	=	trim(@$_REQUEST["txt_pwd"]);
		 $cpwd		=	trim(@$_REQUEST["txt_cpwd"]);
		 $npwd		=	trim(@$_REQUEST["txt_npwd"]);
			
		//validation
		if($name==""){
			$frm_server_side_error	.=	"name<br>";
		}
			
		//usermail validation
		if($mail!=""){
			if(!isvalidemailid($mail)){
				$frm_server_side_error .= 'INVALIDemail<br>';
			}
		}else{
			$frm_server_side_error .= 'EMPTYEmail<br>';
		}
				
		
		if($oldpwd==""){
			$frm_server_side_error .= 'pwd<br>';
		}
		
		if($oldpwd!=""){
			if($pwd!=md5($oldpwd)){
				$frm_server_side_error .= 'nomatch<br>';
			}
		}
		
		//new password validation
		if($npwd==""){
			$frm_server_side_error .= 'newpassword<br>';	
		}
		
		//confirm password validation
		if($cpwd==""){
			$frm_server_side_error .= 'confirmpassword<br>';	
		}
				
		if(($cpwd!="")&&($npwd!="")){
			if($npwd!=$cpwd){
				$frm_server_side_error .= 'MATCH<br>';
			}
		}
			
		if($frm_server_side_error=="1"){
		
			//update accout details
			$field_list	=	"admin_username='$name',admin_password='".md5($npwd)."',admin_email='$mail'";
			$condition	=	"WHERE admin_id='".$_SESSION['AL_MCAL']."'";
			update_rows($table_name,$field_list,$condition);
			page_redirect("$return_url");
		}
		
		//stripslashes
		$name		=	stripslashes(@$_REQUEST["txt_user"]);
		$mail 		=	stripslashes(@$_REQUEST["txt_mail"]);

			
	}	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE_PROJECT?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
	<form name="form1" action="" method="post" enctype="multipart/form-data" id="form1" >
	<div id="Container">
	<!--Logo Banner Starts-->
	<?php 
		include("includes/header.php");
	?>
	<!--Logo Banner Ends-->
	
	<!--Links & contents starts-->
	  <div id="LinksNContents">
		<?php 
			$open_menu	=	11;
			include("includes/leftlink.php");
		?>
	<!--Links ends-->	
	
	<!--Rightside contents starts-->
	<div id="rightMain">
	  <h2 class="pageheading">My Account </h2>
	  <!--Page Heading-->
	  <!--Errors starts-->
	  <?php
		  if($frm_server_side_error!="1"){?>
			<ul id="errors">
				<?
		  }
				
				if(strstr($frm_server_side_error,'name')){?>
					<li>Please enter user name</li>
				<?
				}elseif(strstr($frm_server_side_error,'INVALIDemail')){?>
					<li>Invalid user email ID</li>
				<?
				}elseif(strstr($frm_server_side_error,'EMPTYEmail')){?>
					<li>Please enter user email ID</li>
				<?
				}elseif(strstr($frm_server_side_error,'INVALIDcareermail')){?>
					<li>Invalid career email ID</li>
				<?
				}elseif(strstr($frm_server_side_error,'EMPTYcareermail')){?>
					<li>Please enter career email ID</li>
				<?
				}elseif(strstr($frm_server_side_error,'pwd')){?>
					<li>Specify Old Password</li>
				<?
				}elseif(strstr($frm_server_side_error,'nomatch')){?>
					<li>Incorrect Old Password</li>
				<?
				}elseif(strstr($frm_server_side_error,'newpassword')){?>
					<li>New password cannot be zero length </li>
				<?
				}elseif(strstr($frm_server_side_error,'confirmpassword')){?>
					<li>Confirm password cannot be zero length</li>
				    <?
				}elseif(strstr($frm_server_side_error,'MATCH')){?>
					<li>Confirm password mismatch</li>
				<?
				}
				
		  if($frm_server_side_error!="1"){?>
			  </ul>
		<?
		  }
		?>
	  <!--Errors ends-->
		<!--Button Block Starts-->
		<div id="buttonBlock" style="color:#999999">
			<?php if(($msg=="1")&&($frm_server_side_error=="1")){ ?>Successfully Updated<?php } ?>
		</div>
		<!--Button Block ends-->

	  <!--Table Listing Starts-->
	  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="listing">
		<tr>
		  <td width="21%" align="right" valign="middle"><span class="mandatory">*</span>Username </td>
		  <td width="4%" align="center" valign="middle">:</td>
		  <td width="75%" align="left" valign="middle"><input name="txt_user"  class="textbox" value="<?=$name?>" /></td>
		</tr>
		<tr class="alternative">
		  <td align="right" valign="middle"><span class="mandatory">*</span>User E-Mail ID</td>
		  <td width="4%" align="center" valign="middle">:</td>
		  <td width="75%" align="left" valign="middle"><input name="txt_mail"  class="textbox"  value="<?=$mail?>" /></td>
		</tr>
		<tr class="alternative" >
		  <td width="21%" align="right" valign="middle"><span class="mandatory">*</span>Old Password </td>
		  <td width="4%" align="center" valign="middle">:</td>
		  <td width="75%" align="left" valign="middle"><input name="txt_pwd" type="password" class="textbox" /></td>
		</tr>
		<tr>
		  <td align="right" valign="middle"><span class="mandatory">*</span>New Password </td>
		  <td width="4%" align="center" valign="middle">:</td>
		  <td width="75%" align="left" valign="middle"><input name="txt_npwd" type="password" class="textbox" /></td>
		</tr>
		<tr class="alternative">
		  <td align="right" valign="middle"><span class="mandatory">*</span>Confirm Password</td>
		  <td width="4%" align="center" valign="middle">:</td>
		  <td width="75%" align="left" valign="middle"><input name="txt_cpwd" type="password" class="textbox" /></td>
		</tr>
	  </table>
	  <!--Table Listing Ends-->
	  <!--Bottom Button Block Starts-->
	  <div id="BottombuttonBlock">
		<input name="" type="submit" class="update" value="" />
		<input name="" type="reset" class="reset" value="" />
	   </div>
	  <!--Bottom Button Block ends-->
	</div>
	<!--Rightside contents ends-->	
	  </div>
	  <!--Links & contents ends-->
	 
	</div>
</form>
</body>
</html>