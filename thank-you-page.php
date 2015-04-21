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
<title> Smith & Ken Home Loans ~ Residential Mortages ~ Mortages at Residentional Apartments  </title>
<meta name="description" content="Smith & Ken home loans the number 1 website for Dubai Mortgages & Home Loans, for rates on Apartments, Villas and Offices Call +9714 439 4300 now." />
<meta name="keywords" content="dubai mortgage, dubai mortgages, dubai mortgage calculator, dubai mortgage rates, dubai mortgage broker, dubai mortgage brokers, dubai mortgage law, dubai mortgage interest rates, dubai loan, dubai home loan " />

<link href="styles/oxygen.css" rel="stylesheet" type="text/css" />

<!--Floatbox 
<script type="text/javascript" src="floatbox/floatbox.js"></script>
<link type="text/css" rel="stylesheet" href="floatbox/floatbox.css" />
-->
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
<div class="logo"><h1><a href="index.php" title="Oxygen Home Loans"><span class="hide">Oxygen Home Loans</span></a></h1></div>
</div>



<?php
$activemenu=2;
include("includes/navigation.php"); 
?>


<div class="clear"></div>
</div>
</div>
<!--End Header --> 


<!--Begin Banner -->
<div id="BannerInsideOuter">
<div class="Banner"><img src="images/banner_inside_02.jpg" align="" /> <div class="clear"></div></div>
</div>
<!--End Banner --> <div class="clear"></div>


<!--Begin Middle Area -->
<div id="MiddleArea">

<?php
include("includes/leftlink.php"); 
?>

<div id="ContentAreaInside">
<h1> Thank you for your enquiry </h1>

<p>
One of our consultants will contact you shortly. 
Please feel free to contact us on +971 4 4394300 should you need any further assistance.
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