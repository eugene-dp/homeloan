<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 19-02-2010
	FUNCTION   : Manage Testimonials
	********************************************************/
	
	ob_start();
	session_start();

	include("includes/config.php");
	include("includes/functions.php");
	
	dbconnect();

	// user validation	
	Admin_authorize();

	// menu settings section
	$open_menu		=	5;

	
	if(empty($order)){
		$order		=	"asc";
	}
	
	$order		=	@$_REQUEST['order'];
	$orderby	=	@$_REQUEST['order'];

	if($order	==	"asc")
		$order	=	"desc";
	else
		$order	=	"asc";
	
	if(empty($search)) $search	=	"";	
	$search		=	trim(@$_REQUEST["search"]);
	$condition	=	"";
	if($search	!=	"")
		$condition	=	" where testimonial_title like '%$search%'";
		
	//sorting
	$sort=@$_REQUEST["sort"];
	if($sort=="title")
		$condition.=" order by testimonial_title ".$order;
	else if($sort=="sort")
		$condition.=" order by testimonial_sort_order ".$order;
	else if($sort=="active")
		$condition.=" order by testimonial_active ".$order;
	else
		$condition.=" order by testimonial_id desc";
		
	$sql	=	"select testimonial_id,testimonial_title,testimonial_sort_order,testimonial_active from pt_testimonial ".$condition;
	$rs		=	Query($sql);
	$total	=	mysql_num_rows($rs);
	if(($total==0)&&($search=="")){
		header("location:add_testimonial.php");
	}
	$max	=	LISTING_COUNT;
	
	if(empty($page)) $page=0;
	$page	=	@$_REQUEST['page'];
	$start	=	$page*$max;
	if($start==-LISTING_COUNT){
		$start=0;
	}
	
	$sql	=	$sql." LIMIT $start,$max";
	$rs		=	query($sql);
	$pages	=	ceil($total/$max);
	
	if (mysql_num_rows($rs)<=0){
		$prv	=	$page-1;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE_PROJECT ?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">
	function deleteAll(){
		document.form1.action="delete_listing.php?act=testimonial&page=<?=$page?>&sort=<?=$sort?>&orderby=<?=$orderby?>&search=<?=$search?>";
		document.form1.submit();
	}

	function selectAll(){
		var chkList = document.form1.elements["del[]"];
		 // Is it an array
		if (chkList.length) {
		if(document.form1.checkbox.checked==true)
		{
			for(var i=0;i<chkList.length;i++)
				chkList[i].checked=true;
		}else{
			for(var i=0;i<chkList.length;i++)
				chkList[i].checked=false;
			}
		}else{
			if(document.form1.checkbox.checked==true)
				chkList.checked=true;
			else
				chkList.checked=false;
		}
		
	}

	function DeletionConfirmation(){
		var check	= document.getElementsByTagName("input");
		var	count	= 0;
		for(var i=0;i<check.length;i++){
			if(check[i].type=="checkbox"){
				if(check[i].checked==true){
					count	=	count+1;
				}
			}
		}
		
		if(count<=0){
			alert("No record selected!!");
			return false;
		}
		
		return confirm('Are you sure you want to delete?\nIf OK all the data associated with this record will be deleted!\nYou can not UNDO this process!');

	}
</script>
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
 	<?php
	include("includes/leftlink.php");
	?>
			<!--Links ends-->	
	
	<!--Rightside contents starts-->
			<form action="" method="post" name="form1" id="form1" enctype="multipart/form-data">	
			<div id="rightMain">
				<h2 class="pageheading">Manage testimonials </h2> 
				<!--Page Heading-->
			
				<!--Search and Current Page starts-->
				<div id="searchBlockMain">
					<!--Search starts-->
					<div id="searchBlock-buttons">
					  <input type="text" name="search" id="search" class="s" value="<?=$search?>"/>
					  <a href="javascript:;"><input type="submit" name="Submit" value="" class="search" /></a>
				  </div>
					<!--Search ends-->
					<!--Page Number starts-->
		<?php 
		if($pages>1) 
		{
		?>
		<div id="pagenumber">
		<div id="goSection">
		<span>Go to</span>
  		<select name="page" class="textbox2" onChange="javascript:document.form1.submit();">
  		<?php 
				for($i=0;$i<$pages;$i++){
				  $i=$i+1;
				  $j=$i-1;
				  if($page==$i-1) { 
				  $sel="selected='selected'"; 
							  
				  echo '<option value='.$j.' '.$sel.'>'. $i .'</option>';}
				  else{
				  echo '<option value='.$j.'>'. $i .'</option>';}
							  $i=$i-1;
				  }
		?>
        </select>					
		</div>
			
		<?php
		
// Updating the Previous Next button status
		$page		=	@$_REQUEST['page'];
		$page_name	=	"manage_testimonials.php";
		if($order	==	"asc")
		$order_page	=	"desc";
		else
		$order_page	=	"asc";
						
		if($pages>1){
			if ($page==0){
				$nt		=	$page+1;
				$prev	=	"<img src='images/prevbut_inactive.gif' alt='Previous' width='54' height='22' border='0' />";
				$next	=	"<a href='$page_name?page=$nt&sort=$sort&search=$search&order=$order_page'><img src='images/nextbut.gif' alt='Next' border='0' width='54' height='22' /></a>";				
			}else if ($page==($pages-1)){
				$pv		=	$page-1;
				$prev	=	"<a href=\"$page_name?page=$pv&sort=$sort&search=$search&order=$order_page\"><img src='images/prevbut.gif' alt='Previous' border='0' width='54' height='22' /></a>";
				$next	=	"<img src='images/nextbut_inactive.gif' alt='Previous' width='54' height='22' border='0' />";				
			}else {
				$pv		=	$page-1;
				$nt		=	$page+1;
				$prev	=	"<a href=\"$page_name?page=$pv&sort=$sort&search=$search&order=$order_page\"><img src='images/prevbut.gif' alt='Previous' border='0' width='54' height='22' /></a>";
				$next	=	"<a href='$page_name?page=$nt&sort=$sort&search=$search&order=$order_page'><img src='images/nextbut.gif' alt='Next' border='0' width='54' height='22' /></a>";		
			}
		}else{
			$prev	=	"";
			$next	=	"";
		}	
?>
		<div id="currentpage">
		<span>PAGE <?=($page+1)."/".$pages?></span><?php echo $prev.$next;?>
		</div>
		</div>
<?php }?>
				  <!--Page Number ends-->
				</div>
				<!--Search and Current Page ends-->
				<!--Button Block Starts-->
				<div id="buttonBlock">
		 	        <a onclick="javascript: return DeletionConfirmation();" href="javascript:deleteAll();">Delete</a>
					<a href="add_testimonial.php">Add New</a>
				</div>
				<!--Button Block ends-->
			
				<!--Table Listing Starts-->
				<table width="100%" border="0" cellpadding="0" cellspacing="0" id="listing">
					<tr class="ColumnHeadings">
						<th width="8%" align="center" valign="middle">
					    <input name="checkbox" type="checkbox" id="checkbox" onclick="selectAll();" value="checkbox" />	
						</th>
						<th width="8%" align="center" valign="middle">Sl No </th>
						<?php
						if($order=="asc")
						$imgsrc="images/sort_up.gif";
						else
						$imgsrc="images/sort_down.gif";
						?>						
						<th width="39%" align="left" valign="middle">
						<a href="<?php echo "manage_testimonials.php?sort=title&page=0&search=$search&order=$order";?>">Title</a>
						<?php				
						if($sort=="title"){		
						?><img src="<?=$imgsrc?>" width="12" height="11" /><?php }?>						
						</th>
						<th width="22%" align="center" valign="middle">
						<a href="<?php echo "manage_testimonials.php?sort=order&page=0&search=$search&order=$order";?>">Sort Order</a> 
						<?php if($sort=="order"){?> 
						<img src="<?=$imgsrc?>" width="12" height="11" /><?php }?>						
						</th>
						<th width="23%" align="center" valign="middle">
						<a href="<?php echo "manage_testimonials.php?sort=active&page=0&search=$search&order=$order";?>">Active</a> 
						<?php if($sort=="active"){?> 
						<img src="<?=$imgsrc?>" width="12" height="11" /><?php }?>						
						</th>
					</tr>
		  
		    <?php			
			if ($page > 0 ) {$cnt=$page*$max;}else{$cnt=0;	}
			while(list($testimonial_id,$testimonial_title,$testimonial_sort_order,$testimonial_active)=mysql_fetch_row($rs)):
				$cnt++;
				$css_set=$cnt%2;	
		    ?>					
					<tr <?php if($css_set==0) echo "class='alternative'"; ?> >
						<td align="center" valign="middle">
						<input name="del[]" type="checkbox" id="del[]" value="<?php echo($testimonial_id);?>"/>						</td>
						<td align="center" valign="middle"><?=$cnt?></td>
						<td align="left" valign="middle">
<a href="<?php echo "add_testimonial.php?page=".$page."&id=".$testimonial_id."&search=".$search."&sort=".$sort."&orderby=".$orderby;?>">
<?=$testimonial_title?>
</a>						</td>
						<td align="center" valign="middle"><?=$testimonial_sort_order?></td>
						<td align="center" valign="middle"><?php if($testimonial_active==1) echo "Yes"; else echo "No"; ?></td>
					</tr>
          <?php endwhile;
		  if(($total<=0)&&($search!="")){
		  ?>
			  <tr><td colspan="7" align="center" valign="middle">No Record found !!</td></tr>
		  <?php 
		  } ?>
				</table>
				<!--Table Listing Ends-->
			</div>
			</form>
			<!--Rightside contents ends-->	
		</div>
	    <!--Links & contents ends-->	 
	</div>
</body>
</html>