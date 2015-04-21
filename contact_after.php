<?php

include("admin/includes/config.php");
include("admin/includes/functions.php");

dbconnect();

ob_start();
session_start();

$activemenu = 20;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type"  content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="5;url=index.php" />
<title> Smith & Ken Home Loans ~ Dubai Mortgages ~ Dubai Home Loans ~ Brokers Rates Calculator Laws </title>
<meta name="description" content="Smith & Ken home loans the number 1 website for Dubai Mortgages & Home Loans, for rates on Apartments, Villas and Offices Call +9714 439 4300 now." />
<meta name="keywords" content="dubai mortgage, dubai mortgages, dubai mortgage calculator, dubai mortgage rates, dubai mortgage broker, dubai mortgage brokers, dubai mortgage law, dubai mortgage interest rates, dubai loan, dubai home loan " />

<link href="styles/oxygen.css" rel="stylesheet" type="text/css" />

<!--Floatbox -->
<script type="text/javascript" src="floatbox/floatbox.js"></script>
<link type="text/css" rel="stylesheet" href="floatbox/floatbox.css" />
</head>

<body>
<!--Begin Header -->
<div id="HeaderOuter">
<div class="HeaderAlign">
<div id="LogoCont">
<div class="logo"><h1><a href="index.php" title="Oxygen Home Loans"><span class="hide">Oxygen Home Loans</span></a></h1></div>
</div>




<?php

include("includes/navigation.php"); 

?>


<div class="clear"></div>
</div>
</div>
<!--End Header --> 


<!--Begin Banner -->
<div id="BannerInsideOuter">
<div class="Banner"><img src="images/banner_inside_03.jpg" align="" /> <div class="clear"></div></div>
</div>
<!--End Banner --> <div class="clear"></div>


<!--Begin Middle Area -->
<div id="MiddleArea">

<?php
include("includes/leftlink.php"); 
?>

<div id="ContentAreaInside">
<h1>Contact Us</h1>


<strong>Your message has been sent successfully</strong>






</div>





<div class="clear"></div>
</div>
<!--End Middle Area -->


<!--Begin Footer -->
<div id="FooterOuter">
<div class="FooterArea">

<div class="FooterLinks">
<ul>
	<li><a href="index.php">Home</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="residential_mortgages.php">Residential Mortgages</a></li>
</ul>
</div>

<div class="FooterLinks">
<ul>
	<li><a href="step_guide.php">Step by Step Guide</a></li>
    <li><a href="checklist.php">Checklist</a></li>
    <li><a href="services_offered.php">Services Offered</a></li>
</ul>
</div>


<div class="FooterLinks">
<ul>
	<li><a href="javascript:;">Contact Us</a></li>
    <li><a href="javascript:;">Conveyancing</a></li>
    <li><a href="javascript:;">Smith &amp; Ken Xtra</a></li>
</ul>
</div>


<div class="FooterLinks" style="margin-right:0px;">
<ul>
	<li><a href="javascript:;">Meet the Team</a></li>
    <li><a href="javascript:;">Become an Introducer Agent</a></li>
    <li><a href="mortgage_calculator.php">Mortgage Calculator</a></li>
</ul>
</div>



<div class="clear"></div>
</div>
</div> <div class="clear"></div>

<div class="CopyRight">Copyright © 2010 Oxygen Home Loans. All rights reserved.</div>
<!--End Footer -->

</body>
</html>
<?php
ob_end_flush();

?>