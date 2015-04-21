<?php
	include("admin/includes/config.php");
	include("admin/includes/functions.php");
	dbconnect();
	ob_start();
	session_start();
	$sql_home="select pagecontents,page_banner from omort_pagecontents where page_id=1";
$rs_home=Query($sql_home);
$contents=mysql_fetch_array($rs_home);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dubai Mortgages ~ Dubai Home Loans ~ Brokers Rates Calculator Laws</title>
<meta name="description" content="In partnership with Smith & Ken the number 1 website for Dubai Mortgages & Home Loans, for rates on Apartments, Villas and Offices Call +9714 439 4322 now." />
<meta name="keywords" content="dubai mortgage, dubai mortgages, dubai mortgage calculator, dubai mortgage rates, dubai mortgage broker, dubai mortgage brokers, dubai mortgage law, dubai mortgage interest rates, dubai loan, dubai home loan " />
<!-- SEO Mark Wallington -->
<link href="styles/oxygen.css" rel="stylesheet" type="text/css" />
<!--Floatbox -->
<link rel="stylesheet" href="colorbox.css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script language="javascript"  type="text/javascript">
    $(document).ready(function(){
        $(".ajax").colorbox();
    });
</script>
</head>

<body>
<!--Begin Header -->
<div id="HeaderOuter">
  <div class="HeaderAlign">
    <div id="LogoCont">
      <div class="logo">
        <h1><a href="index.php" title="Oxygen Home Loans"><span class="hide">Oxygen Home Loans</span></a></h1>
      </div>
    </div>
    <?php
$activemenu=1;
include("includes/navigation.php"); 
?>
    <div class="clear"></div>
  </div>
</div>
<!--End Header --> 

<!--Begin Banner -->
<div id="BannerHomeOuter">
  <div class="Banner" style="background:#FFF url(images/banner_home_bg.jpg) no-repeat; height:314px;">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="930" height="314" id="FlashID" title="Banner">
      <param name="movie" value="uploads/banners/<?php echo $contents[1];?>" />
      <param name="quality" value="high" />
      <param name="wmode" value="transparent" />
      <param name="swfversion" value="8.0.35.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. --> 
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="images/home_banner.swf" width="930" height="314">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="transparent" />
        <param name="swfversion" value="8.0.35.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
    <div class="clear"></div>
  </div>
</div>
<!--End Banner -->
<div class="clear"></div>

<!--Begin Middle Area -->
<div id="MiddleArea">
  <div id="LeftCont">
    <?php
include("includes/left_links_home.php");
?>
  </div>
  <div style="margin:8px 0px; margin-bottom:0px; "> <a href="http://www.smithandken.com/octobarsales/" style="text-decoration:none;"> <img src="userfiles/love-discount-banner.jpg" width="654"   alt="love-discount-banner"> </a> </div>
  <div id="ContentAreaHome">
    <?php

echo stripslashes($contents[0]);
?>
  </div>
  <div id="RightCont"> <a href="content/mortgagecalculatorpop.php" class="ajax"><img src="images/morgate_calculator.gif" alt="" /></a> <a href="content/quickcontactpop.php"  class="ajax"> <img src="images/quick_contact.gif" alt="" style="margin-top:12px;" /></a> </div>
  <div class="clear"></div>
  <div class="bank-logos" style="float:left;height:75px; width:100%;padding:10px; border-top:5px #ccc solid;">
    <div class="bank"> <img src="images/icons/ADCB.jpg" height="" width="" /> </div>
    <div class="bank"> <img src="images/icons/Ajman-Bank.jpg" /> </div>
    <div class="bank"> <img src="images/icons/CBD.jpg" /> </div>
    <div class="bank"> <img src="images/icons/DIB.jpg" /> </div>
    <div class="bank"> <img src="images/icons/dubai-bank.jpg" /> </div>
    <div class="bank"> <img src="images/icons/SCB.jpg" /> </div>
    <div class="bank"> <img src="images/icons/RAK-Bank.jpg" /> </div>
  </div>
  <div class="clear"></div>
</div>

<!--End Middle Area --> 

<!--Begin Footer -->
<?php
include("includes/footer.php");
?>
<!--End Footer --> 
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
<?php
ob_end_flush();

?>