<?php
	/********************************************************
	CREATED BY : JVK
	DATE	   : 16-04-2010
	FUNCTION   : Manage Pagecontents
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
	
	//table
	$table_name	=	TBL."pagecontents";
	
	// get all pages
	$sql	=	"select page_id, page_title from $table_name where 1 ";
	$res	=	Query($sql);	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=TITLE_PROJECT?></title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="" name="form1" method="post">
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
		<h2 class="pageheading">Manage Page Contents </h2> 
		<!--Page Heading-->
		
		<!--Table Listing Starts-->
		<table width="100%" border="0" cellpadding="0" cellspacing="0" id="listing">
          <tr class="ColumnHeadings">
            <th width="8%" align="center" valign="middle">Sl No</th>
            <th width="92%" align="left" valign="middle">Pages</th>
          </tr>
		<?php
			if($res){
				$cnt	=	0;
				while(list($page_id, $page_title)=@mysql_fetch_row($res)){
					$cnt++;
					$css_set=$cnt%2;	
		?>
           <tr <?php if($css_set==0) echo "class='alternative'"; ?>>
             <td align="center" valign="middle"><?=$cnt?></td>
             <td align="left" valign="middle">			
			 	<a href="edit_content.php?id=<?=$page_id?>"><?=$page_title?></a>
			
			</td>
           </tr>		
		 <?php
				
				}			
			}		  
		?>  
      </table>
	  <!--Table Listing Ends-->
	</div>
    <!--Rightside contents ends-->	
  </div>
  <!--Links & contents ends-->
 
</div>
</form>
</body>
</html>