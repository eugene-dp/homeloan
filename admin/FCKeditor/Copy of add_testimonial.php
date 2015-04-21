<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 19-02-2010
	FUNCTION   : add /edit testimonials
	********************************************************/
	ob_start();
	session_start();
	
	include("includes/config.php");
	include("includes/functions.php");
	include("includes/image_functions.php");		
	require_once("FCKeditor/fckeditor.php");	
	
	dbconnect();
	Admin_authorize();
	
	//fck editor2 start
	$fckWidth	=	'525';
	$fckHeight	=	'200';
	$sBasePath 	=	'FCKeditor/';	
	$oFCKeditor =	new FCKeditor('FCKeditorHdr');
	$oFCKeditor->BasePath = $sBasePath;				
	$htmlBodyHdr = $htmlwhatcontent;	
	$oFCKeditor->Width  =  $fckWidth;
	$oFCKeditor->Height = $fckHeight;
	
	//menu management
	$open_menu		=	5;

	//page details
	$id 			= @$_REQUEST['id'];
	$page 			= @$_REQUEST['page'];
	$search			= @$_REQUEST['search'];
	$sorts			= @$_REQUEST['sort'];
	$orderby		= @$_REQUEST['orderby'];
	$table_name     = "pt_testimonial";	

	//get title
	if(is_numeric($id)){
		$page_heading	= "Edit Testimonial";
	}else{
		$page_heading	= "Add Testimonial";
		
		$sql = "select max(testimonial_sort_order) from  pt_testimonial";
		$rs  = Query($sql);
		$no  = @mysql_num_rows($rs);
		
		if($no > 0){
         	list($sortord) = mysql_fetch_row($rs);

		 	 if($sortord == ""){
				 $testimonial_sort_order = 1;
			 }else{
				 $testimonial_sort_order = $sortord + 1;
			 }  
		}

	}
	//page heading
	if(is_numeric($id)&&(!$_POST))
	{
		//retrieving values
		$sql="Select * from pt_testimonial where testimonial_id='$id'";
		$rs=Query($sql);
		if(mysql_num_rows($rs)>0)
		{
			$row_arr				=	mysql_fetch_array($rs);
			$testimonial_id				=	$row_arr['testimonial_id'];
			$title					=	$row_arr['testimonial_title'];
			$short_des			    =	$row_arr['testimonial_short_des'];
			$description			=	$row_arr['testimonial_des'];			
		    $testimonial_sort_order	    =	$row_arr['testimonial_sort_order'];	
			$sortb4					=	$testimonial_sort_order;
			$dtestimonial_photo         =	$row_arr['testimonial_photo'];					
			$testimonial_active			=	$row_arr['testimonial_active'];
			
			$description =  html_entity_decode(trim(stripslashes($description))); 			
			$oFCKeditor->Value	  = $description;
			
		}
	}


	//sort order requirements
	$rs_sort	=	Query("SELECT testimonial_id,testimonial_sort_order FROM pt_testimonial ORDER BY testimonial_sort_order DESC");
	$arr_sort	=	mysql_fetch_array($rs_sort);
	$sort_max	=	$arr_sort["testimonial_sort_order"];
	$max_id		=	$arr_sort["testimonial_id"];



	$frm_server_side_error ="1";
	//Get details
	if($_POST){

		$title					=	trim($_REQUEST['title']);	
		$short_des			    =	trim($_REQUEST['short_des']);	
		//$description			=	trim($_REQUEST['description']);	
		$sort				 	=	trim($_REQUEST['testimonial_sort_order']);	
		$testimonial_sort_order     =	$sort;				
		$testimonial_photo          =	$_FILES['photo']['name'];	
		$dtestimonial_photo			=	trim($_REQUEST['dtestimonial_photo']);						
		$testimonial_active			=	trim($_REQUEST['testimonial_active']);	
		$sortb4					=	$_POST['sortb4'];
		
		$description   = htmlentities($_POST['FCKeditorHdr']);
		$description   = addslashes(html_entity_decode(trim($description)));
		//$description = html_entity_decode(trim(stripslashes($description))); 			
	    $oFCKeditor->Value= trim(stripslashes(html_entity_decode(trim(stripslashes($description))))); 
								
		//error settings
		//title validation
		if($title==""){
			$frm_server_side_error .= 'TITLE<br>';
		}
		
		//short description validation
		if($short_des==""){
			$frm_server_side_error .= 'SHORT<br>';
		}

		//description validation
		/*if($description==""){
			$frm_server_side_error .= 'DES<br>';
		}*/
		if(strlen(trim(strip_tags($_POST['FCKeditorHdr'])))=="0"){
			$frm_server_side_error	.=	"DES<br>";
		}

	//sort order numeric checking
		if($sort){
			if(!is_numeric($sort)){
				$frm_server_side_error	.=	"sort<br>";
			}
		}

		  if($sort == "0"){
				$frm_server_side_error	.=	"NOT ZERO<br>";		  
		  }
		  
		if($sort == ""){
			$frm_server_side_error .= 'ENTERSOR<br>';		
		}		


		/*if(($_FILES['photo']['name'] == "") and (!$id)){
			$frm_server_side_error .= 'UPPHOTO<br>';						
		}	
*/

		if($_FILES['photo']['name']!="" ){
		
		    $testimonial_photo__ext  =   strtolower(substr($_FILES['photo']['name'],strpos($_FILES['photo']['name'],'.')));
			if(($testimonial_photo__ext  !=".jpg") && ($testimonial_photo__ext  !=".jpeg") && ($testimonial_photo__ext  !=".gif") ){						
			$frm_server_side_error .= 'IMG<br>';							
			}else{					


				if($_FILES["photo"]["size"]>= "2048000"){
					$frm_server_side_error .= 'imgsize<br>';
				}
			}
	    }
		
		if($frm_server_side_error=="1"){
			if($id){
			
				if($sort > $sort_max){
					$ins_fields	=	"testimonial_sort_order=testimonial_sort_order-1";
					$condition = "WHERE testimonial_sort_order>'$sortb4' and testimonial_id!='$id'";
					update_rows($table_name,$ins_fields,$condition);
						
					$sort	=	$sort_max;
				}
				elseif(($sort!=$sortb4)&&($sort <= $sort_max)){
					$ins_fields	=	"testimonial_sort_order=testimonial_sort_order-1";
					$condition = "WHERE testimonial_sort_order>'$sortb4'";
					update_rows($table_name,$ins_fields,$condition);
					
					$ins_fields	=	"testimonial_sort_order=testimonial_sort_order+1";
					$condition = "WHERE testimonial_sort_order>='$sort'";
					update_rows($table_name,$ins_fields,$condition);
				}
				
			}
			
			if(!$id){
				if($sort > $sort_max){
					$sort	=	$sort_max+1;
				}
				elseif(($sort!=$sortb4)&&($sort <= $sort_max)){
					$ins_fields	=	"testimonial_sort_order=category_sort_order+1";
					$condition = "WHERE testimonial_sort_order>='$sort'";
					update_rows($table_name,$ins_fields,$condition);
				}
			}
			if(($sort=="")||($sort=="0")){
				$sort	=	$sort_max+1;
			}
			


// now upload photo

	    	if($_FILES['photo']['name'] != ""){	
			    

				@unlink("../uploads/testimonials/".$dtestimonial_photo);
				@unlink("../uploads/testimonials/thumb/".$dpartner_photo);				
					
		        $testimonial_photo = $_FILES['photo']['name'];		
				$no = "";
			
				if(!is_numeric($id)){
					$sql_id = "select max(testimonial_id) from pt_testimonial";
					$rs     =  Query($sql_id);
					$dd     = @mysql_fetch_array($rs);
					$no     = $dd[0] + 1; 
				}else{
					$no = $id;
				}
			 
			 
			    $testimonial_photo	=	$no."_".$testimonial_photo;

				$img_size	=	"191x74";
				$photo_img	=	THUMPCREATIONFUNCTION($_FILES['photo']['tmp_name'],$testimonial_photo,"../uploads/testimonials/thumb/",$img_size);									
				
				$img_size1	=	"67x26";
				$photo_img	=	THUMPCREATIONFUNCTION($_FILES['photo']['tmp_name'],$testimonial_photo,"../uploads/testimonials/thumb1/",$img_size1);									
				
			}else{
				$testimonial_photo = $dtestimonial_photo;
			}
			
		
			
			if(!is_numeric($id)){
			
				//insert into table
				$sql	=	"INSERT INTO  pt_testimonial SET ";
				$sql	.=	"  testimonial_title='$title' ";
				$sql	.=	", testimonial_short_des='$short_des' ";
				$sql	.=	", testimonial_des='$description' ";
				$sql	.=	", testimonial_photo='$testimonial_photo' ";				
				$sql	.=	", testimonial_sort_order='$sort' ";
				$sql	.=	", testimonial_active='$testimonial_active' ";								
				Query($sql);
			
			}else{
			
				//update article
				$sql	=	"UPDATE pt_testimonial SET ";
				$sql	.=	"  testimonial_title='$title' ";
				$sql	.=	", testimonial_short_des='$short_des' ";
				$sql	.=	", testimonial_des='$description' ";
				$sql	.=	", testimonial_photo='$testimonial_photo' ";				
				$sql	.=	", testimonial_sort_order='$sort' ";
				$sql	.=	", testimonial_active='$testimonial_active' ";								
				$sql	.=	" WHERE testimonial_id='$id' ";
				Query($sql);
				
			}
			
			//redirect to manage page
			redirect("manage_testimonials.php?page=$page&search=$search&sort=$sorts&order=$orderby");
			
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
	<div id="Container">

<!--Logo Banner Starts-->
	<?php
		include("includes/header.php");
	?>
<!--Logo Banner Ends-->

<!--Links starts-->	
  	<?php
	include("includes/leftlink.php");
	?>
<!--Links ends-->	
	
			<!--Rightside contents starts-->
			<div id="rightMain">
				<h2 class="pageheading"><?=$page_heading?></h2> 
				<!--Page Heading-->
			
		<!--Errors starts-->
		  <?php 
		  if($frm_server_side_error!="1"){?>
			<ul id="errors">
				<?
				}
				if(strstr($frm_server_side_error,'TITLE')){?>
					<li>Enter title</li>
				    <?
				}
				
				if(strstr($frm_server_side_error,'SHORT')){?>
					<li>Enter short description</li>
				    <?
				}

				if(strstr($frm_server_side_error,'DES')){?>
					<li>Enter description</li>
				    <?
				}
				
				if(strstr($frm_server_side_error,'sort')){?>
				<li>Sort order should be numeric</li>
				 <?
				}		
				
				if(strstr($frm_server_side_error,'NOT ZERO')){?>
				<li>Sort order should not be zero</li>
				 <?
				}		

				if(strstr($frm_server_side_error,'ENTERSOR')){?>
				<li>Enter sort order</li>
				 <?
				}		

				if(strstr($frm_server_side_error,'UPPHOTO')){?>
				<li>Upload image</li>
				 <?
				}		
				
				if(strstr($frm_server_side_error,'IMG')){?>
					<li>Uploaded article photo should be jpg or gif</li>
				    <?
				}	

				if(strstr($frm_server_side_error,'imgsize')){?>
					<li>Image size exceeds the maximum limit</li>
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
				 <a href="manage_testimonials.php?search=<?=$search?>&sort=<?=$sort?>&page=<?=$page?>">Edit/View</a>
		  		</div>
				<!--Button Block ends-->
			
				<!--Table Listing Starts-->
				<form action="add_testimonial.php" enctype="multipart/form-data" name="form1" id="form1" method="post" >
				<table width="100%" border="0" cellpadding="0" cellspacing="0" id="listing">
				<tr>
			    <td width="27%" align="right" valign="middle"><span class="mandatory">*</span>Title</td>
			    <td width="4%" align="center" valign="middle">:</td>
			    <td width="71%" align="left" valign="middle">
				<input type="text" name="title"  class="textbox1" value="<?=$title?>" size="85"/>  
				</td>
			  </tr>
  <tr class="alternative">
    <td align="right" valign="middle"><span class="mandatory">*</span>Short Description </td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle"><textarea name="short_des" rows="4" cols="60"><?=$short_des?></textarea>      
      &nbsp;    </td>
  </tr>
  <tr>
    <td align="right" valign="middle"> <span class="mandatory">*</span>Description</td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle">
	<!--<textarea name="description" rows="10" cols="65"><?=$description?></textarea>-->
	<?php
		$oFCKeditor->create();
	?>
	</td>
  </tr>
  <tr class="alternative">
    <td align="right" valign="middle"><span class="mandatory">*</span>Sort Order</td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle">
	<input name="testimonial_sort_order" type="text" class="textbox1" size="5" value="<?=$testimonial_sort_order?>" /></td>
  </tr>
  <tr >
    <td align="right" valign="middle">Image (gif or jpg) </td>
    <td align="center" valign="middle">:</td>
    <td align="left" valign="middle">
	 <input name="photo" type="file" class="textbox2" />
  <br />
  <font color="#006633">[ NOTE : Image should be jpg, jpeg or gif, size should be less than 2MB ]  </font>	


				<div id="photo" style="display:none"><img src="../uploads/testimonials/thumb/<?=$dtestimonial_photo?>" />			   
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   <a href="#photos" onclick="showdiv(1)" title="close">			  
			   <img src="images/d2.jpg" /></a>
			   </div>  
			   
			   <?php if($dtestimonial_photo != ""){ ?>			   			   			   
			   
			    <div > 			   
			    <a href="#photos" onclick="showdiv(0)" ><?=$dtestimonial_photo?></a>
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			   
			    </div>
			   
			   <?php } ?>             
  </td>
  </tr>
  <tr class="alternative">
    <td align="right" valign="middle">Active</td>
    <td width="4%" align="center" valign="middle">:</td>
    <td align="left" valign="middle">
 <input name="testimonial_active" type="radio" value="1" checked="checked" <?php if($testimonial_active=="1") {?>checked="checked"<?php }?>  />
Yes              
<input name="testimonial_active" type="radio" value="0"  <?php if($testimonial_active=="0") {?>checked="checked"<?php }?> />
No			
    </td>
  </tr>
</table>
<!--Table Listing Ends-->
		  
				<!--Bottom Button Block Starts-->
		    <div id="BottombuttonBlock">
			<input name="submit" type="submit" class="update" value="" />
			<input name="reset" type="Reset" class="reset" value="" />	  
			<input name="id" id="id" type="hidden" value="<?=$id?>" />	  
			<input name="page" id="page" type="hidden" value="<?=$page?>" />	  
			<input name="search" id="search" type="hidden" value="<?=$search?>" />	  
			<input name="sort" id="sort" type="hidden" value="<?=$sort?>" />
			<input type="hidden" value="<?=$sortb4?>" name="sortb4"/> 
			<input name="orderby" id="orderby" type="hidden" value="<?=$orderby?>" />	
			<input name="dtestimonial_photo" id="dtestimonial_photo" type="hidden" value="<?=$dtestimonial_photo?>" />					  
			  </div>
				</form>
				<!--Bottom Button Block ends-->
			</div>
			<!--Rightside contents ends-->	
  		</div>
  		<!--Links & contents ends-->
	</div>
</body>
</html>