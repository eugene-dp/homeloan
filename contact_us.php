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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Smith & Ken Home Loans ~ Dubai Mortgages ~ Dubai Home Loans ~ Brokers Rates Calculator Laws</title>
<meta name="description" content="Smith & Ken home loans the number 1 website for Dubai Mortgages & Home Loans, for rates on Apartments, Villas and Offices Call +9714 439 4300 now." />
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
<script type="text/javascript" >
function echeck(value) {
	    //alert("in function");
    	var re = new RegExp(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i);
    	if (re.test(value)) {
       		return true;
    	} 
    	else {
    		return false;
    	} 

}

function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }



function changecolor(id){
    
  
  
   
  	  if( (document.contactform.PersonEmail.value == "Enter email") || (document.contactform.PersonEmail.value == "Enter valid email") )
	  {
    	 	 document.contactform.PersonEmail.value 	  	=	 "";
			 document.contactform.PersonEmail.style.color 	= 	 "#000000";  
	   }
	 
 

 
  	 
 
}
function changecolorname(id){
    
  
  
   
  	  if(document.contactform.FirstName.value == "Enter name") 
	  {
    	 	 document.contactform.FirstName.value 	  	=	 "";
			 document.contactform.FirstName.style.color 	= 	 "#000000";  
	   }
	 
 

 
  	 
 
}

function changecolorname1(id){
    
  
  
   
  	  if( (document.contactform.What_Loan_Amount_are_you_looking_for__c.value == "Enter loan amount")  || (document.contactform.What_Loan_Amount_are_you_looking_for__c.value == "Enter a valid loan amount") ) 
	  {
    	 	 document.contactform.What_Loan_Amount_are_you_looking_for__c.value 	  	=	 "";
			 document.contactform.What_Loan_Amount_are_you_looking_for__c.style.color 	= 	 "#000000";  
	   }
	 
 

 
  	 
 
}
function changecolorcomm(id){
   
  	  if(document.contactform.Notes__c.value == "Enter comments") 
	  {
    	 	 document.contactform.Notes__c.value 	  	=	 "";
			 document.contactform.Notes__c.style.color 	= 	 "#000000";  
	   }	 
 
}
function validateQForm()
{

var flag = true;

	
	if((document.contactform.PersonEmail.value == "") || (document.contactform.PersonEmail.value == "Enter email"))
	{
	  document.contactform.PersonEmail.style.color = "#FF0000"; 
	  document.contactform.PersonEmail.value = "Enter email";
	  flag = false;
	}else{
	
	
		 if(echeck(document.contactform.PersonEmail.value)==false){
			  document.contactform.PersonEmail.style.color = "#FF0000"; 
		 	  document.contactform.PersonEmail.value = "Enter valid email";
			  flag = false;	 
	 	 }
	
	
	}
	if((document.contactform.FirstName.value == "") || (document.contactform.FirstName.value=='Enter name'))
	{
			document.contactform.FirstName.style.color = "#FF0000"; 
		 	document.contactform.FirstName.value = "Enter name";
			  flag = false;	 
	}
	

	if((document.contactform.phone1.value == "") || (document.contactform.Phone.value==''))
	{
		   document.getElementById("perror").style.display = "";
		   flag = false;	 
			
	}else{
	
		   document.getElementById("perror").style.display = "none";	
	}
	
	if((document.contactform.What_Loan_Amount_are_you_looking_for__c.value == "") || (document.contactform.What_Loan_Amount_are_you_looking_for__c.value=='Enter Loan Amount'))
	{
			document.contactform.What_Loan_Amount_are_you_looking_for__c.style.color = "#FF0000"; 
		 	document.contactform.What_Loan_Amount_are_you_looking_for__c.value = "Enter loan amount";
			  flag = false;	 
	}else{
	
	if( (IsNumeric(document.contactform.What_Loan_Amount_are_you_looking_for__c.value) == false  ) ||  (parseInt(document.contactform.What_Loan_Amount_are_you_looking_for__c.value) <= 0) )
			{
			   
					document.contactform.What_Loan_Amount_are_you_looking_for__c.style.color = "#FF0000"; 
				 	document.contactform.What_Loan_Amount_are_you_looking_for__c.value = "Enter a valid loan amount";
				    flag = false;	 
			}
	
	}
	
	if((document.contactform.Notes__c.value == "")  || (document.contactform.Notes__c.value=='Enter comments'))
	{
			document.contactform.Notes__c.style.color = "#FF0000"; 
		 	document.contactform.Notes__c.value = "Enter comments";
			flag = false;	 
	}
	if(flag == false){
	 return false;
	}else{
	sendRequest();
	 return true;
	}

	return flag;
}

</script>
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
function sendRequest() {
new Ajax.Request("ajaxvalidate.php",
{
method: 'post',
parameters: 'name='+$F('FirstName')+'&phonetype='+$F('phonetype')+'&phone1='+$F('phone1')+'&Phone='+$F('Phone')+'&InterestedIn='+$F('InterestedIn')+'&What_Loan_Amount_are_you_looking_for__c='+$F('What_Loan_Amount_are_you_looking_for__c')+'&Notes__c='+$F('Notes__c')+'&email='+$F('PersonEmail')+'&lname='+$F('LastName'),
onComplete: showResponse
});

}
function showResponse(req){


if(req.responseText=="success")
{
window.location.href="contact_after.php";
}


}
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
include("includes/navigation.php");
?>
    <div class="clear"></div>
  </div>
</div>
<!--End Header --> 

<!--Begin Banner -->
<div id="BannerInsideOuter">
  <div class="Banner"><img src="images/banner_inside_01.jpg" align="" />
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
    <a href="calculator_popup.php" rel="floatbox.first"><img src="images/morgate_calculator.gif" alt="" /></a> <img src="images/phone_icon.gif" style="margin-top:5px;" alt="" /> </div>
  <div id="ContentAreaInside">
    <h1>Contact Us</h1>
    <div class="contactrigh">
      <form action="http://www.smithandkenhomeloans.com/salesForceHomeLoansCRM.php" method="post" name="contactform" id="contactform" onSubmit="return validateQForm();">
        <input name="PersonLeadSource" type="hidden" value="Generated Lead - Smith & Ken Home Loans" />
        <input name="record_type" type="hidden" value="Mortgage Prospect"/>
        <input name="Website_form__c" type="hidden" value="Contact Us Page - Home Loans Website" />
        <div class="smalltxtCntct"> <span class="label">First Name<span class="mandatory">*</span></span><span style="margin-right:19px;" class="col">:</span>
          <input name="FirstName" id="FirstName" value="" style="width:250px" size="43" maxlength="40" class="textfield" onmousedown="changecolorname(this);" onfocus="if(this.value=='Enter name') this.value='';"  />
        </div>
        <div class="smalltxtCntct"> <span class="label">Last Name</span><span style="margin-right:19px;" class="col">:</span>
          <input name="LastName" id="LastName" value="" style="width:250px" size="43" maxlength="40" class="textfield" />
        </div>
        <div class="smalltxtCntct"> <span class="label">Email<span class="mandatory">*</span></span><span style="margin-right:19px;" class="col">:</span>
          <input name="PersonEmail" id="PersonEmail"  style="width:250px" size="43" maxlength="40" class="textfield" type="text"  onmousedown="changecolor(this);"  value=""  onfocus="if(this.value==this.defaultValue) this.value='';" />
        </div>
        <div class="smalltxtCntct"> <span class="label">Contact no.<span class="mandatory">*</span></span><span style="margin-right:19px;" class="col">:</span>
          <select name="phonetype" id="phonetype"  title="" class="select2" style="width:90px;">
            <option  value="Mobile">Mobile</option>
            <option  value="Work Phone">Work Phone</option>
            <option  value="Fax">Fax</option>
            <option  value="Home Phone">Home Phone</option>
          </select>
          <input name="phone1" id="phone1" value="" style="width:35px" size="43" maxlength="3" class="textfield" />
          <input name="Phone" id="Phone" value="" style="width:105px" size="43" maxlength="10" class="textfield" />
          <span id="perror" style="color:#FF0000;display:none; margin-left:189px;">Enter phone number</span> </div>
        <div class="smalltxtCntct"> <span class="label">What are you interested in?<span class="mandatory"></span></span><span style="margin-right:19px;" class="col">:</span>
          <select name="InterestedIn" id="InterestedIn"  title="" class="select">
            <option  value="Residential Mortgage">Residential Mortgage</option>
            <option  value="Commerical Finance">Commerical Finance</option>
            <option  value="International Finance">International Finance</option>
            <option  value="Agents Referral (Introducer) Agreement">Agents Referral (Introducer) Agreement</option>
            <option  value="Other">Other</option>
          </select>
        </div>
        <div class="smalltxtCntct"> <span class="label">Loan Amount Required<span class="mandatory">*</span></span><span style="margin-right:19px;" class="col">:</span>
          <input name="What_Loan_Amount_are_you_looking_for__c" id="What_Loan_Amount_are_you_looking_for__c" value="" style="width:250px" size="43" maxlength="40" class="textfield" onmousedown="changecolorname1(this);" onfocus="if(this.value=='Enter Loan Amount') this.value='';" />
        </div>
        <div class="smalltxtCntct"> <span class="label">How can we help?<span class="mandatory">*</span></span><span class="col" style="margin-right:19px;" >:</span>
          <textarea name="Notes__c" class="textfield01" id="Notes__c" style="width:250px" onmousedown="changecolorcomm(this);"   onfocus="if(this.value=='Enter comments') this.value='';"></textarea>
        </div>
        <div class="smalltxtchk-butcntct" style="padding:2px 0 0 190px;">
          <input name="Submit" type="submit" value="" class="apply" />
          <div class="clear"></div>
        </div>
      </form>
    </div>
    <div class="address">
      <?php
/*$sql_home="select pagecontents from omort_pagecontents where page_id=3";
$rs_home=Query($sql_home);
$contents=mysql_fetch_array($rs_home);
echo stripslashes($contents[0]);
*/
?>
      <strong>Address:</strong><br />
      <p>Smith &amp; Ken Home Loans<br />
        1107 Concorde Tower<br />
        Dubai Media City<br />
        Dubai, UAE.</p>
      <strong>Office Contacts:</strong><br />
      <p><img src="images/icons/telephone.png"  alt="phone" height="12"  />+971 4 439 4300<br />
        <img src="images/icons/email.png"  alt="email" height="12" />support@smithandken.com <br />
        <img src="images/icons/sms.png" alt="SMS" height="12" />+971 50 115 5690 <br />
        <img src="images/icons/fax.png" alt="fax" height="12" />+971 4 439 4399 </p>
      <p>&nbsp;</p>
    </div>
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