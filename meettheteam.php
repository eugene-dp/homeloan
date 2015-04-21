<?php
include("admin/includes/config.php");
include("admin/includes/functions.php");
dbconnect();
ob_start();
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Smith & Ken Home Loans ~ Dubai Mortgages ~ Meet The Teem ~ Mortgages Team </title>
<meta name="description" content="Smith & Ken home loans the number 1 website for Dubai Mortgages & Home Loans, for rates on Apartments, Villas and Offices Call +9714 439 4300 now." />
<meta name="keywords" content="dubai mortgage, dubai mortgages, dubai mortgage calculator, dubai mortgage rates, dubai mortgage broker, dubai mortgage brokers, dubai mortgage law, dubai mortgage interest rates, dubai loan, dubai home loan " />

<link href="styles/oxygen.css" rel="stylesheet" type="text/css" />
<!--Floatbox -->
<link rel="stylesheet" href="colorbox.css" />
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/common.js"></script>

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
<div class="Banner"><img src="images/banner_inside_04.jpg" align="" /> <div class="clear"></div></div>
</div>
<!--End Banner --> <div class="clear"></div>


<!--Begin Middle Area -->
<div id="MiddleArea">

<?php
$leftactive=1;
include("includes/leftlink.php"); 
?>

<!--<div id="ContentAreaInside">
<h1>Meet the Team</h1>
<?php
$sql_home="select pagecontents from omort_pagecontents where page_id=10";
$rs_home=Query($sql_home);
$contents=mysql_fetch_array($rs_home);
echo stripslashes($contents[0]);
?>


</div>-->

<div id="ContentAreaInside">
<h1>Meet the Team</h1>
<p><strong><img width="635" hspace="10" height="127" align="left" alt="" src="code/userfiles/Ben-MD.gif" /><br />
<br />
</strong></p>
<p>&nbsp;</p>
<p><br />
<br />
<br />
Benjamin J Smith is the Managing Director of Smith &amp; Ken Home Loans as well as being a young entrepreneur and owner of several businesses in the UAE and UK.&nbsp;<br />
<br />
Benjamin formed Smith &amp; Ken Home Loans to cater for the growing demand for excellent and transparent mortgage advice. It is Benjamin&rsquo;s forward thinking and assertive strategies which are making Smith &amp; Ken Home Loans the number one choice for mortgagees.</p>
<p>Benjamin is a big football fan which has led to him sponsoring a local football team.&nbsp;&nbsp;&nbsp;&nbsp; <br />
<br />
<!--
<strong><img width="635" vspace="5" hspace="10" height="127" align="left" alt="" src="code/userfiles/arran.gif" /></strong></p>
<p>&nbsp;</p>
<p><br />
<br />
<br />
<br />
<br />
Arran Summerhill (Head of Mortgages) relocated from his hometown of Manchester to set up and establish the mortgage arm of the business, &ldquo;Smith &amp; Ken Home Loans.&rdquo;&nbsp;&nbsp;<br />
<br />
After graduating from University and having become fully CEMAP (Certificate of Mortgage Advice and Practice) qualified in 2004, Arran plied his trade in the UK for Countrywide who are the UK&rsquo;s largest Estate Agent Group.&nbsp; Despite the success he received with Countrywide, leading his branch regularly into the top 20 offices nationwide (from more than 1000!) he sought a new challenge and saw Dubai as an exciting, interesting opportunity.&nbsp; He has not looked back and looks forward to the next ten years in the UAE, watching the country grow to become a worldwide center of business and tourism. <br />
<br />
Arran is a passionate Manchester United fan and is also the captain of a local football team who have been champions for the last two seasons. He enjoys travelling and recently spent time trekking in the Himalaya&rsquo;s.</p>
<p><br />-->


<strong><img width="635" vspace="5" hspace="10" height="127" align="left" alt="" src="code/userfiles/jeremy.jpg" /></strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
<br />
<br />
Jeremy Bentley is Head of Mortgages for Smith & Ken Home Loans, which is a Fully Independent Mortgage Brokerage operating in Dubai in excess of 6 years. <br />
<br />
Being independent means Smith & Ken Home Loans can provide unbiased advice and recommendation service to arrange the most suitable mortgage to reflect the client's individual circumstances.  <br />
<br />
Jeremy has a wide knowledge of the Dubai Mortgage Market and holds strong relationships with banks in the UAE and internationally. Having in excess of 7 years mortgage experience, Jeremy has worked in varying markets with both end users and investors. 
Prior to this Jeremy enjoyed many successful years working in the UK real estate market.  <br />
<br />
Jeremy is fully qualified, having attained a full CeMAP (Certificate of Mortgage Advice and Practice). The internationally recognized certification qualifies Jeremy to advise on mortgage related products. 
Under his guidance, Smith & Ken Home Loans have become one of the largest and most successful mortgage brokers in the Middle East. Being an in-house broker offers clients convenience with the under one roof approach. 
<br />
The service offered by Smith & Ken Home Loans is not only limited to Smith & Ken properties. Our services are available on all properties throughout 
Dubai and Jeremy maintains a good relationship with outside real estate agents and regularly receives recommendations. 
<br />

</p>

</div>

<div class="clear"></div>
</div>
<!--End Middle Area -->


<!--Begin Footer -->
<?php
include("includes/footer.php");
?>
<!--End Footer -->

</body>
</html>
<?php
ob_end_flush();

?>