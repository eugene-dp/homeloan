<?php
session_start();

if($_POST){

include("admin/includes/config.php");
include("admin/includes/functions.php");
	
dbconnect();

$adminemailaddress=getColumn("omort_admin","admin_email","admin_id=1");

	
//extract form inputs

$name 		  	  =	   $_POST['txtName'];
$Lname 		  	  =	   $_POST['txtLName'];
$email            =    $_POST['txtEmail'];
$phonetype    	  =    $_POST['phonetype'];
$phone1  	  	  =    $_POST['phone1'];
$phone2  	  	  =    $_POST['phone2'];
$LoanAmount 	  =	   $_POST['LoanAmount'];

$mailbody	      =    file_get_contents("mailer1.html");

$mailbody	      =    str_replace("[NAME]",$name,$mailbody);
$mailbody	      =    str_replace("[LNAME]",$Lname,$mailbody);
$mailbody         =    str_replace("[EMAIL]",$email,$mailbody);
$mailbody		  =	   str_replace("[PTYPE]",$phonetype,$mailbody);
$mailbody		  =	   str_replace("[PHONE1]",$phone1,$mailbody);
$mailbody		  =	   str_replace("[PHONE2]",$phone2,$mailbody);
$mailbody		  =	   str_replace("[LOAN]",$LoanAmount,$mailbody);

// mail to admin

	$from	     =	$email;
	$to			 =   $adminemailaddress;
	$headers  	 =	"MIME-Version: 1.0\r\n";
	$headers	.=	"Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
	$headers	.=	"From:".$from."\r\n";
	$subject     =  "Mortgage Calculator";	

	@mail($to,$subject,$mailbody,$headers);
	


// mail to client
$subject  = "Oxygen Home Loans";

// now sending thanks mail to customer

$replymail ='
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="" content="" />
<meta name="keywords" content="" />

<title>Oxygen Home Loans</title>
</head>

<body>
   <table width="462" border="0" cellspacing="0" cellpadding="0" style="margin:0px; padding:1px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px;  border:#000859 solid 1px;">
     <tr>
       <td align="left" valign="top" height="50" style="padding:0px; background:#e9e9e9" ><img  src="http://o2homeloans.com/images/mailer-logo.gif" alt="Oxygen Home Loan" style="padding:1px 0 0 10px;"    border="0" /></td>
     </tr>
     <tr>
       <td><table width="100%" border="0" cellspacing="10" cellpadding="5" style="background:#fff; color:#333;" >
           <tr>
             <td width="100%" align="left" valign="top" style=" border:1px solid #cfcfcf;">Thanks for using Oxygen Home Loans mortgage calculator.</td>
           </tr>
       </table></td>
     </tr>
   </table>
 </body>
</html>';


$from	    =	$adminemailaddress;
$to			=   $email;
$headers  	=	"MIME-Version: 1.0\r\n";
$headers	.=	"Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
$headers	.=	"From:".$from."\r\n";

@mail($to,$subject,$replymail,$headers);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dubai Mortgages ~ Dubai Home Loans ~ Brokers Rates Calculator Laws</title>
<meta name="description" content="In partnership with Smith & Ken the number 1 website for Dubai Mortgages & Home Loans, for rates on Apartments, Villas and Offices Call +9714 439 4322 now." />
<meta name="keywords" content="dubai mortgage, dubai mortgages, dubai mortgage calculator, dubai mortgage rates, dubai mortgage broker, dubai mortgage brokers, dubai mortgage law, dubai mortgage interest rates, dubai loan, dubai home loan " />

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
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
function sendRequest() {
new Ajax.Request("mcal.php",
{
method: 'post',
parameters: 'show_progress=1&form_complete=1&sale_price='+$F('lAmount')+'&down_percent='+$F('DownPay')+'&annual_interest_percent='+$F('Interest').replace('%','')+'&year_term='+$F('Years')+'&fPayDate='+$F('fPayDate'),
onComplete: showResponse
//mcal.php?form_complete=1&sale_price=150000&down_percent=10&year_term=30&annual_interest_percent=7&show_progress=1
});
}
function showResponse(req){
document.getElementById("show").innerHTML=req.responseText;
reCal();




}
function reCal()
{
document.getElementById('EMI').innerHTML=document.getElementById('EMIVal').value;
var iid='I'+document.getElementById('txtYear').value
var pid='P'+document.getElementById('txtYear').value
var oid='R'+document.getElementById('txtYear').value
var did='D'+document.getElementById('txtYear').value
var mon=document.getElementById('txtYear').value*12;
var years=document.getElementById('Years').value*12;

document.getElementById('InterestYear').innerHTML='AED '+document.getElementById('intere'+mon).value;
document.getElementById('PrincipleYear').innerHTML='AED '+document.getElementById('prici'+mon).value;
document.getElementById('OutYear').innerHTML='AED '+document.getElementById('balance'+mon).value;

document.getElementById('DDates').innerHTML=document.getElementById('datebal'+mon).value;
document.getElementById('textrapay').innerHTML=(document.getElementById('Years').value*12)*document.getElementById('DownPay').value;
document.getElementById('TotalPay').innerHTML=document.getElementById('TAmount').value;
//document.getElementById('TPay').innerHTML=document.getElementById('TAmount').value;
document.getElementById('TotalInterest').innerHTML='AED '+document.getElementById('intere'+years).value;

document.getElementById('lastpaydate').innerHTML=document.getElementById('datebal'+years).value;


}
function validateQForm()
{
	var flag = true;
	if(document.contactform.lAmount.value=='')
	{
		alert("Enter amount");
		document.contactform.lAmount.focus();
		flag=false;
		
	}else if(document.contactform.Interest.value=='')
	{
		alert("Enter interest");
		document.contactform.Interest.focus();
		flag=false;
		
	}else if(document.contactform.Years.value=='')
	{
		alert("Enter year");
		document.contactform.Years.focus();
		flag=false;
		
	} else if(document.contactform.fPayDate.value=='')
	{
		alert("Enter date");
		document.contactform.fPayDate.focus();
		flag=false;
		
	} 
	
	
	
	if(flag == false){
	 return false;
	}else{
	sendRequest();

	 return true;
	}
	}
</script>
</head>

<body>

<script type="text/javascript">



var offsetfromcursorX=12 //Customize x offset of tooltip
var offsetfromcursorY=10 //Customize y offset of tooltip

var offsetdivfrompointerX=10 //Customize x offset of tooltip DIV relative to pointer image
var offsetdivfrompointerY=14 //Customize y offset of tooltip DIV relative to pointer image. Tip: Set it to (height_of_pointer_image-1).

document.write('<div id="dhtmltooltip"></div>') //write out tooltip DIV
document.write('<img id="dhtmlpointer" src="images/arrow2.gif">') //write out pointer image

var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

var pointerobj=document.all? document.all["dhtmlpointer"] : document.getElementById? document.getElementById("dhtmlpointer") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thewidth, thecolor){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var nondefaultpos=false
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var winwidth=ie&&!window.opera? ietruebody().clientWidth : window.innerWidth-20
var winheight=ie&&!window.opera? ietruebody().clientHeight : window.innerHeight-20

var rightedge=ie&&!window.opera? winwidth-event.clientX-offsetfromcursorX : winwidth-e.clientX-offsetfromcursorX
var bottomedge=ie&&!window.opera? winheight-event.clientY-offsetfromcursorY : winheight-e.clientY-offsetfromcursorY

var leftedge=(offsetfromcursorX<0)? offsetfromcursorX*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth){
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=curX-tipobj.offsetWidth+"px"
nondefaultpos=true
}
else if (curX<leftedge)
tipobj.style.left="5px"
else{
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetfromcursorX-offsetdivfrompointerX+"px"
pointerobj.style.left=curX+offsetfromcursorX+"px"
}

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight){
tipobj.style.top=curY-tipobj.offsetHeight-offsetfromcursorY+"px"
nondefaultpos=true
}
else{
tipobj.style.top=curY+offsetfromcursorY+offsetdivfrompointerY+"px"
pointerobj.style.top=curY+offsetfromcursorY+"px"
}
tipobj.style.visibility="visible"
if (!nondefaultpos)
pointerobj.style.visibility="visible"
else
pointerobj.style.visibility="hidden"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
pointerobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>

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
<div class="Banner">
  <img src="images/banner_inside_02.jpg" align="" />
  <div class="clear"></div></div>
</div>
<!--End Banner --> <div class="clear"></div>


<!--Begin Middle Area -->
<div id="MiddleArea">

<form action="calculate_in.php" method="post" name="contactform" id="contactform" onSubmit="return false;">
<div id="form_cal">

<div id="ContentAreaInside" style="width:100%;">
<h1>Mortgage Calculator</h1>


<!--Begin Mortgage Calculator -->
<div class="Mortgage">
<div class="Coll">

<div class="Box">
<h2>Mortgage Information</h2>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Loan Amount (AED) </td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Loan Amount:</strong><br> This is the amount that you have borrowed, not the sale price of the home. If you enter the current balance of your mortgage, make sure you adjust the Term Length to be the amount of years (or months/12) you have left on your mortgage.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="lAmount" type="text"  class="MortField01" id="lAmount" value="<?=$LoanAmount?>" /></td>
  </tr>
  
  <tr>
    <td>Annual Interest Rate</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Annual Interest Rate:</strong><br> This is the rate quoted by the lender. ',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="Interest" value="8.5%" class="MortField01" id="Interest" /></td>
  </tr>
  
  <tr>
    <td>Term Length (in Years)</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Term (Amortization Period)</strong><br> The total number of years it will take to pay off the mortgage. Typical values: 30, 20, 15 <br/>',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="Years" value="10" class="MortField01" id="Years" /></td>
  </tr>
  
  <tr>
    <td>First Payment Date (mm/dd/yyyy) </td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>First Payment Date</strong><br> Assumes that the first payment date is at the end of the first period.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="fPayDate" value="<?php echo date('m-d-Y'); ?>" class="MortField01" id="fPayDate" /></td>
  </tr>
  
  <tr>
    <td>Compound Period	</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Compound Period:</strong><br> The number of times per year that the quoted annual interest rate is compounded.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">Monthly</span></td>
  </tr>
  
  <tr>
    <td><strong>Payment</strong></td>
    <td>:</td>
    <td></td>
    <td class="MortFix"><span class="FixBlue" id="EMI" > AED 16,118.14</span></td>
  </tr>
  
</table>
</div>



<div class="Box">
<h2>Extra Payments</h2>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Extra Payment(AED)</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Extra Payment:</strong><br> To make regularly scheduled prepayments on the principal, enter the value in this field, and the payment interval in the next field. <br>To estimate Accelerated Bi-Weekly payments, make an Extra Payment of Payment/12 each month. Enter &quot;=payment/12&quot; in the Extra Payment field and &quot;1&quot; in the Payment Interval field.',330)";
onMouseout="hideddrivetip()" />
    </td>
    <td><input name="DownPay" value="0" class="MortField01" id="DownPay" /></td>
  </tr>
  
  <tr>
    <td>Payment Interval (months)</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Payment Interval:</strong><br>Specifies that the Extra Payment amount will be made every N months. For example, enter 1 to make the extra payment every month, or 2 to make the extra payment every 2 months.<br> <strong>payments by</strong> choosing an Extra Payment Interval period of 1 and making the Extra Payment amount equal to the Payment/12.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">1</span></td>
  </tr>
  
  <tr>
    <td>Extra Annual Payment</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Extra Annual Payment:</strong><br>In addition to the Extra Payment above, you can specify an Extra Annual Payment, and choose the month that you want to make the payment.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">10</span></td>
  </tr>
  
  <tr>
    <td>Month of Annual Payment</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Month of Extra Annual Payment:</strong> <br>Lets you specify which month of the year you want to make your extra annual payment. For example, it might be the month after you get annual bonus (depending on your company s fiscal year). Enter a number between 1 and 12.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">12-30-2010</span></td>
  </tr>
  
  <tr>
    <td><strong>Total Extra Payments</strong></td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Extra Payments:</strong><br>This is sum of the Extra Payments and the Additional Payments columns.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey"><strong>
    <div id="textrapay">0</div>
    </strong></span></td>
  </tr>
  
</table>
</div>

</div>




<div class="Coll" style="margin-right:0px;">

<div class="Box">
<h2>Balance at a Specified Year</h2>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Balance at Year</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Balance Due at Year ...</strong><br>Useful if you are selling your house after a number of years, or just want to know what the balance due is after a certain number of years.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="txtYear" id="txtYear" value="3" class="MortField01" onfocus="if(this.value==this.defaultValue) this.value='';" onchange="javascript:reCal();" onkeyup="reCal();"  /></td>
  </tr>
  
  <tr>
    <td>Date</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey" id="DDates">11/30/2013</span></td>
  </tr>
  
  <tr>
    <td>Interest Paid</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey" id="InterestYear">AED 5,728,442.22</span></td>
  </tr>
  
  <tr>
    <td>Principal Paid</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey" id="PrincipleYear">AED 5,006,238.72</span></td>
  </tr>
  
  <tr>
    <td><strong>Outstanding Balance</strong></td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey" id="OutYear"><strong>AED 1,017,785</strong></span></td>
  </tr>
  
</table>
</div>
<input name="submitCal" type="submit" class="update" value="" style="margin-top:10px;" onclick="return  validateQForm();" />

</div>
</div></div></div>


<div class="clear"></div>


<div id="show"></div>
</form>
</div>





<div class="clear"></div>
<!--End Middle Area -->


<!--Begin Footer -->
<?php
include("includes/footer.php");
?>
<!--End Footer -->

</body>
</html>
