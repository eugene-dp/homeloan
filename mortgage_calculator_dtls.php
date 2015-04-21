<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Oxygen Home Loans...</title>
<link href="styles/oxygen.css" rel="stylesheet" type="text/css" />

<!--Floatbox -->
<script type="text/javascript" src="floatbox/floatbox.js"></script>
<link type="text/css" rel="stylesheet" href="floatbox/floatbox.css" />
</head>

<body>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script II- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

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
<div class="logo"><h1><a href="index.html" title="Oxygen Home Loans"><span class="hide">Oxygen Home Loans</span></a></h1></div>
</div>

<div class="header_top">
<a href="about.html" class="about">About Us</a>
<a href="contact_us.html" style="margin-right:0px;" class="contact">Contact Us</a>
</div>


<div class="Navigation">
<ul>
	<li><a href="index.html" class="home"><span>Home</span></a></li>
    <li><a href="residential_mortgages.html" class="residential"><span>Residential Mortgages</span></a></li>
    <li><a href="step_guide.html" class="step"><span>Step by Step Guide</span></a></li>
    <li><a href="checklist.html" class="checklist"><span>Checklist </span></a></li>
    <li style="margin-right:0px;"><a href="services_offered.html" class="services"><span>Services Offered</span></a></li>
</ul>
</div>

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



<div id="ContentAreaInside" style="width:100%;">
<h1>Mortgage Calculator</h1>


<!--Begin Mortgage Calculator -->
<div class="Mortgage">
<div class="Coll">

<div class="Box">
<h2>Mortgage Information</h2>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Loan Amount</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Loan Amount:</strong><br> This is the amount that you have borrowed, not the sale price of the home. If you enter the current balance of your mortgage, make sure you adjust the Term Length to be the amount of years (or months/12) you have left on your mortgage.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="AED 1,300,000.00" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>Annual Interest Rate</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Annual Interest Rate:</strong><br> This is the rate quoted by the lender. ',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="8.50%" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>Term Length (in Years)</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Term (Amortization Period)</strong><br> The total number of years it will take to pay off the mortgage. Typical values: 30, 20, 15 <br/><br/> OR, enter the number of years you have LEFT on your loan. You can enter 10 years + 3 months by entering =10+3/12',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="10" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>First Payment Date</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>First Payment Date</strong><br> Assumes that the first payment date is at the end of the first period.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="12/30/2010" class="MortField01" /></td>
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
    <td class="MortFix"><span class="FixBlue">AED 16,118.14 </span></td>
  </tr>
  
</table>
</div>



<div class="Box">
<h2>Extra Payments</h2>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Extra Payment</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Extra Payment:</strong><br> To make regularly scheduled prepayments on the principal, enter the value in this field, and the payment interval in the next field. <br>To estimate Accelerated Bi-Weekly payments, make an Extra Payment of Payment/12 each month. Enter &quot;=payment/12&quot; in the Extra Payment field and &quot;1&quot; in the Payment Interval field.',330)";
onMouseout="hideddrivetip()" />
    </td>
    <td><input name="" value="AED 1,300,000.00" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>Payment Interval (months)</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Payment Interval:</strong><br>Specifies that the Extra Payment amount will be made every N months. For example, enter 1 to make the extra payment every month, or 2 to make the extra payment every 2 months.<br> <strong>payments by</strong> choosing an Extra Payment Interval period of 1 and making the Extra Payment amount equal to the Payment/12.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="8.50%" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>Extra Annual Payment</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Extra Annual Payment:</strong><br>In addition to the Extra Payment above, you can specify an Extra Annual Payment, and choose the month that you want to make the payment.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="10" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>Month of Annual Payment</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Month of Extra Annual Payment:</strong> <br>Lets you specify which month of the year you want to make your extra annual payment. For example, it might be the month after you get annual bonus (depending on your company s fiscal year). Enter a number between 1 and 12.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><input name="" value="12/30/2010" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td><strong>Total Extra Payments</strong></td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Extra Payments:</strong><br>This is sum of the Extra Payments and the Additional Payments columns.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey"><strong>0.00</strong></span></td>
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
    <td><input name="" value="AED 1,300,000.00" class="MortField01" /></td>
  </tr>
  
  <tr>
    <td>Date</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey">11/30/2013</span></td>
  </tr>
  
  <tr>
    <td>Interest Paid</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey">AED 298,038</span></td>
  </tr>
  
  <tr>
    <td>Principal Paid</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey">AED 282,215</span></td>
  </tr>
  
  <tr>
    <td><strong>Outstanding Balance</strong></td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey"><strong>AED 1,017,785</strong></span></td>
  </tr>
  
</table>
</div>

<a href="#"><img src="images/calculate.gif" alt="" style="margin-top:10px;" /></a></div>



<div class="clear"></div>
<a name="main"></a>


<div style="padding:9px 0 0 0; margin-top:10px; width:97%">

<div class="Coll">

<h2 style="font-size:16px; padding:10px 0 5px 0;">Mortgage Summary</h2>
<div class="Box">
<h2>Balance at a Specified Year</h2>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Total Payments</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Payments:</strong><br>The total amount paid over the course of the loan, including both interest and principal.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">AED 1,934,176.73 </span></td>
  </tr>
  
  <tr>
    <td>Total Interest</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Interest:</strong><br>The total amount of interest paid over the course of the loan.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">AED 634,176.73 </span></td>
  </tr>
  
  <tr>
    <td>Years Until Paid Off</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Years Until Paid Off:</strong><br> If you elect to make extra payments, you may be able to pay off your loan early.<br><strong>Important:</strong> For variable rate mortgages, the monthly payment is adjusted whenever the rate changes! So, even if you make extra payments, you may not end up paying your loan off early.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">10</span></td>
  </tr>
  
  <tr>
    <td>Last Payment Date</td>
    <td>:</td>
    <td></td>
    <td><span class="FixGrey">11/30/2020</span></td>
  </tr>
  
  <tr>
    <td><strong>Interest Savings</strong></td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Interest Savings</strong><br>The reduced interest associated with making extra payments or &quot;prepayments&quot;. When you make extra payments on the principal, then you pay less interest in the long run.<br>This calculation does NOT include any tax deductions.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixBlue">AED 0</span></td>
  </tr>
  
</table>
</div>

</div>




<div class="Coll" style="margin-right:0px;">

<h2 style="font-size:16px; padding:10px 0 5px 0;">&nbsp;</h2>
<div class="Box">
<i>Totals Assuming No Extra Payments</i>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td width="50%">Total Payments</td>
    <td width="15%">:</td>
    <td width="7%">
    <img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Payments:</strong><br>If you dont make any extra payments, this will be the total amount, including interest, paid over the life of the loan (the full amortization period).',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">3</span></td>
  </tr>
  
  <tr>
    <td>Total Interest</td>
    <td>:</td>
    <td><img src="images/help.gif" alt="" onMouseover="ddrivetip('<strong>Total Interest:</strong><br>If you dont make any extra payments, this will be the total amount of interest paid over the life of the loan (the full amortization period). This amount is used to calculate the &quot;Interest Savings&quot;.',330)";
onMouseout="hideddrivetip()" /></td>
    <td><span class="FixGrey">AED 36,587 </span></td>
  </tr>
  
 
</table>
</div>

</div>

<div class="clear"></div>
</div>















<div class="MortgageResult">
<h2 style="font-size:16px; padding:10px 0 5px 0;">Payment Schedule</h2>
<div class="Main">
<div class="Tab">
<table width="920" border="0" cellspacing="0" align="center" height="39">
  <tr>
    <td width="43"><span>No.</span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('Payment Number',110)";
onMouseout="hideddrivetip()" /></td>
    <td width="100"><span>PaymentDate</span></span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<srrong>Payment Date:</strong> This calculator assumes that the payments are made at the END of each period.',300)";
onMouseout="hideddrivetip()" /></td>
    <td width="100"><span>Interest Rate</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Current Annual Interest Rate:</strong><br>For a variable or adjustable-rate mortgages (ARM), this column indicates what the current annual interest rate is for each payment period.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="90"><span>InterestDue</span> </td>
    <td width="95"><span>PaymentDue</span><img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Payment:</strong><br> The required payment that includes both interest and principal.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="110"><span>ExtraPayments</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Extra Payments (Prepayments)</strong><br>(Assumes no penalties for making prepayments on the principal) <br><br>  The amounts in the Extra Payments column are based on the inputs chosen in the Extra Payments section above. To manually enter extra payments, use the Additional Payment column.<br> <br> The complication of the formula in this column comes from having to prevent overpaying on the last few payments. For example, if you normally make a sizable annual extra payment, the formula must make sure that your last annual payment isnt more than the balance due. If it is, then the extra payment is adjusted to bring the balance exactly to zero.',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="135"><span>Additional Payment</span> <img src="images/help_blue.gif" alt="" onMouseover="ddrivetip('<strong>Additional Principal Payment</strong><br>(Assumes no penalties for making prepayments on the principal)<br><br>This column gives you complete flexibility in making additional payments. Use the Extra Payments to schedule regular extra payments. The Additional Payment column is for the occasional lump sum or irregularly scheduled prepayments.<br><br>You can enter a negative value here if you want to cancel a regularly scheduled extra payment. If you enter a negative value and you end up not paying the interest due, then your balance will increase, resulting in negative amortization (paying interest on interest).',330)";
onMouseout="hideddrivetip()" /></td>
    <td width="90"><span>PrincipalPaid</span></td>
    <td width="110"><span>Balance</span></td>
    <td><span>Year</span></td>
  </tr>
</table>

</div>

<div class="Area">
<table width="930" border="0" cellspacing="0" align="left">
  <tr align="center" bgcolor="#f2f2f2">
    <td width="30">1</td>
    <td width="70">11/30/2010</td>
    <td width="75">8.500%</td>
    <td width="70">531.253</td>
    <td width="80">16,118.14;</td>
    <td width="70">0.00</td>
    <td width="90">&nbsp;</td>
    <td width="50">401.46</td>
    <td width="90">1,293,090.19</td>
    <td width="30">&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>2</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
  
   <tr align="center" bgcolor="#f2f2f2">
    <td>3</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>4</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr align="center" bgcolor="#f2f2f2">
    <td>5</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>6</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
   <tr align="center" bgcolor="#f2f2f2">
    <td>7</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>8</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td></td>
  </tr>
  
  <tr align="center" bgcolor="#f2f2f2">
    <td>9</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center">
    <td>10</td>
    <td>12/30/2010</td>
    <td>8.500%</td>
    <td>9,208.33</td>
    <td>16,118.14;</td>
    <td>0.00</td>
    <td>&nbsp;</td>
    <td>6,909.81</td>
    <td>1,293,090.19</td>
    <td>1</td>
  </tr>  
  
 
  
</table>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>













<div class="clear"></div>
</div>

<div class="clear"></div>
</div>
</div>





<div class="clear"></div>
</div>
<!--End Middle Area -->


<!--Begin Footer -->
<div id="FooterOuter">
<div class="FooterArea">

<div class="FooterLinks">
<ul>
	<li><a href="index.html">Home</a></li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="residential_mortgages.html">Residential Mortgages</a></li>
</ul>
</div>

<div class="FooterLinks">
<ul>
	<li><a href="step_guide.html">Step by Step Guide</a></li>
    <li><a href="checklist.html">Checklist</a></li>
    <li><a href="services_offered.html">Services Offered</a></li>
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
    <li><a href="mortgage_calculator.html">Mortgage Calculator</a></li>
</ul>
</div>



<div class="clear"></div>
</div>
</div> <div class="clear"></div>

<div class="CopyRight">Copyright © 2010 Oxygen Home Loans. All rights reserved.</div>
<!--End Footer -->

</body>
</html>
