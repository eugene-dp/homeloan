<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 16-04-2010
	FUNCTION   : Edit Pagecontents
	********************************************************/
	ob_start();
	session_start();

	// include section
	include("includes/config.php");
	include("includes/functions.php");
	require_once("FCKeditor/fckeditor.php");
	// database connection
	dbconnect();
	
	// user validation	
	Admin_authorize();

	//fck editor1 start
	$fckWidth	=	'550';
	$fckHeight	=	'350';
	$sBasePath 	=	'FCKeditor/';	
	$oFCKeditor =	new FCKeditor('desc');
	$oFCKeditor->BasePath = $sBasePath;				
	$htmlBodyHdr = $htmlwhatcontent;	
	$oFCKeditor->Width  =  $fckWidth;
	$oFCKeditor->Height = $fckHeight;

	//get page information
	$id		=	@$_REQUEST['id'];
	
	//return URL Preparation
	$table_name	=	TBL."pagecontents";
	$return_url	= "manage_content.php";

	//heading
	if(is_numeric($id)){
		$heading	=	"Edit Content";
	
		//get the current details
		$sql		=	"SELECT * FROM $table_name WHERE page_id='$id'";
		$rs			=	Query($sql);
		
		if(mysql_num_rows($rs)>0){
			list($id,$title,$desc,$db_image)=mysql_fetch_row($rs);
			$oFCKeditor->Value	  = stripslashes($desc);
		}
	}
	
	$frm_server_side_error ="1";
	if(@$_POST){
		$title	    = trim(@$_REQUEST["title"]);
		$desc   	= htmlentities(trim(@$_POST['desc']));
		$desc		= addslashes(html_entity_decode(trim($desc)));
		$banners_image	=	$_FILES['banners_image']['name'];
		
		
		if($title==""){
			$frm_server_side_error	.=	"name<br>";
		}
		
		if($desc==""){
			$frm_server_side_error	.=	"Desc<br>";
		}
		
		// image validations
		if(($banners_image=="") and (!$id)){
			$frm_server_side_error .= 'IMAGE<br>';
		}	
			
		if($banners_image != ""){
			$img_ext	=	strtolower(substr($banners_image,strpos($banners_image,'.')));
				
			// image extension validations
			if($img_ext!='.swf')	{
				$frm_server_side_error .= 'imageext<br>';
			}else{	
				
				// image size validations
				if(($_FILES["banners_image"]["size"]>= "2048000")||($_FILES["banners_image"]["size"]==0)){
					$frm_server_side_error .= 'imgsize<br>';
				}else{
					// image dimension validation
					
				}
			}
		}
		
		
		if($frm_server_side_error == "1"){
			//update content
			$sql	=	"UPDATE $table_name SET ";
			$sql	.=	" page_title='$title' ";								
			$sql	.=	", pagecontents='$desc' ";								
			$sql	.=	"  WHERE page_id='$id' ";
			Query($sql); 
			
			if($_FILES['banners_image']['name']){
				//delete existing image			
				@unlink("../uploads/banners/".$db_image);
				 
				$tmp_img				=	@$_FILES["banners_image"]["tmp_name"];
			
				$img_size	=	"905x126";
				$prd_image	=	$id."_".$banners_image;
				
				//$photo_img	=	THUMPCREATIONFUNCTION($tmp_img, $prd_image,"../uploads/banners/",$img_size);
				copy($tmp_img,"../uploads/banners/".$prd_image);
				
				//update image
				$sql	=	"UPDATE $table_name SET ";
				$sql	.=	" page_banner='$prd_image' ";								
				$sql	.=	"  WHERE page_id='$id' ";
				Query($sql); 
			}
			//exit();
			page_redirect("$return_url");	
		}
		
		
		//stripslashes
		$title	   =	stripslashes($title);
		$desc	   =	stripslashes($desc);
	}
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?=TITLE_PROJECT?></title>
	<link href="styles/style.css" rel="stylesheet" type="text/css" />
	<script language="javascript">
		function showdiv(id){
			if(id ==0){
				var a11=document.getElementById('photo');
				a11.style.display = ""; 
			}else{
				var a11=document.getElementById('photo');
				a11.style.display = "none"; 
			}
		}
	</script>
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
  		
		$open_menu	=	1;
		include("includes/leftlink.php");
 	 ?>
<!--Links ends-->	

<!--Rightside contents starts-->
	<div id="rightMain">
		<h2 class="pageheading"><?=$heading?></h2> 
		<!--Page Heading-->
		
		<!--Errors starts-->
		<?php
		  if($frm_server_side_error!="1"){?>
				<ul id="errors">
			<?
			}
			
			if(strstr($frm_server_side_error,'name')){?>
				<li>Please enter title.</li>
			<?
			}
			
			if(strstr($frm_server_side_error,'Desc')){?>
				<li>Please enter content.</li>
			<?
			}
			
			if(strstr($frm_server_side_error,'imageext')){?>
				<li>Uploaded banner should be swf</li>
				<?
			}

			if(strstr($frm_server_side_error,'imgsize')){?>
				<li>Banner file size exceeds the maximum limit</li>
				<?php
			}
			
			if(strstr($frm_server_side_error,'dimension')){?>
				
				<?php
			}

			if($frm_server_side_error!="1"){?>
				</ul>
			<?
			}
			?>
		    <!--Errors ends-->
		
        <!--Button Block Starts-->
	  <div id="buttonBlock">
		 <a href="<?=$return_url?>">Back</a>	  
	  </div>
		<!--Button Block ends-->
		
		<!--Table Listing Starts-->
		<table width="100%" border="0" cellpadding="0" cellspacing="0" id="listing">
          <tr>
            <td width="27%" align="right" valign="middle"><span class="mandatory">*</span>Title   </td>
            <td width="2%" align="center" valign="middle">:</td>
            <td width="71%" align="left" valign="middle">
			<input name="title" type="hidden" class="textbox1" value="<?=$title?>" size="85"/>
			<strong><?=$title?></strong>	
			</td>
          </tr>
		   <tr class="alternative">
		     <td align="right" valign="middle"><span class="mandatory">*</span>Content</td>
		     <td align="center" valign="middle">:</td>
					
		 	<td align="left" valign="middle">
			<!-- <textarea name="desc" cols="85" rows="22" class="textbox2"><?php //echo $desc?></textarea> -->
			<?php
				$oFCKeditor->create();
				?>			</td>
	      </tr>
		  <?php
		  if(@$_REQUEST['id']==1)
		  {
		  ?>
		   <tr>
		     <td align="right" valign="top"><span class="mandatory">*</span> Banner </td>
		     <td align="center" valign="top">:</td>
		     <td align="left" valign="top">
			 <input name="banners_image" type="file" class="textbox1" />	
			  <br />
			  <font color="#006633">[ NOTE : File should be swf, size should be less than 2MB and dimension should be 930px x 314px ]  </font>	

				<div id="photo" style="display:none">
				    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="876" height="240" title="test">
                      <param name="movie" value="../uploads/banners/<?=$db_image?>" />
                      <param name="quality" value="high" />
                      <embed src="../uploads/banners/<?=$db_image?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="100" height="40"></embed>
			      </object>
				    
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="#photos" onclick="showdiv(1)" title="close"><img src="images/d2.jpg" /></a>					</div>  
			   
			   <?php if($db_image != ""){ ?>			   			   			   
					<div style="width: 150px;" > 			   
						<a href="#photos" onclick="showdiv(0)" ><?=$db_image?></a>					</div>
			   <?php } ?>			  </td>
	      </tr>
		  <?php
		  }?>
      </table>
	  <!--Table Listing Ends-->
	  
        <!--Bottom Button Block Starts-->
	  <div id="BottombuttonBlock">
	  <?php if($id=="") { ?><input name="" type="submit" class="save" value="" /><?php } else { ?>
	  <input name="" type="submit" class="update" value="" /><?php } ?>
	  <input name="" type="reset" class="reset" value="" />
	  </div>
	  <input type="Hidden" value="<?=@$_REQUEST['id']?>" name="id">
		<!--Bottom Button Block ends-->
	</div>
    <!--Rightside contents ends-->	
  </div>
  <!--Links & contents ends-->
 
</div>
</form>
</body>
</html>