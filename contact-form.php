<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Smith & Ken Home Loans ~ Dubai Mortgages ~ Dubai Home Loans </title>
<link rel="stylesheet" type="text/css" href="styles/float.css"  />
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
    
 if( (document.contactform.What_Loan_Amount_are_you_looking_for__c.value == "Enter loan amount") || (document.contactform.What_Loan_Amount_are_you_looking_for__c.value == "Enter a valid loan amount")) 
	  {
    	 	 document.contactform.What_Loan_Amount_are_you_looking_for__c.value 	  	=	 "";
			 document.contactform.What_Loan_Amount_are_you_looking_for__c.style.color 	= 	 "#000000";  
	   }
	   
}
function changecolorcomm(id){
    
  
  
   
  	  if(document.contactform.Description.value == "Enter comments") 
	  {
    	 	 document.contactform.Description.value 	  	=	 "";
			 document.contactform.Description.style.color 	= 	 "#000000";  
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
	
	if((document.contactform.What_Loan_Amount_are_you_looking_for__c.value == "") || (document.contactform.What_Loan_Amount_are_you_looking_for__c.value=='Enter loan amount'))
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


	
	if((document.contactform.Description.value == "")  || (document.contactform.Description.value=='Enter comments'))
	{
			document.contactform.Description.style.color = "#FF0000"; 
		 	document.contactform.Description.value = "Enter comments";
			flag = false;	 
	}
	

	
	if(flag == false){
	 return false;
	}else{
	sendRequest();
	 return true;
	}

	
}

</script>
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
function sendRequest() {



new Ajax.Request("ajaxvalidate.php",
{
method: 'post',
parameters: 'name='+$F('FirstName')+'&phonetype='+$F('phonetype')+'&phone1='+$F('phone1')+'&Phone='+$F('Phone')+'&Type_of_Loan__c='+$F('Type_of_Loan__c')+'&What_Loan_Amount_are_you_looking_for__c='+$F('What_Loan_Amount_are_you_looking_for__c')+'&Description='+$F('Description')+'&email='+$F('PersonEmail')+'&lname='+$F('txtLName'),
onComplete: showResponse
});

}

function showResponse(req){

	if(req.responseText=="success")
	{
	
		document.getElementById('formid').style.display='none';
		document.getElementById('after').style.display='';

	}

}

</script>
</head>
<body style="background:#000538; margin:0;  padding:0px; overflow:hidden;">
<!--         banner            -->

       <div class="enquireBg" >
      <h3 style="font-size:16px; font-weight:bold; padding-top:0px">Quick Contact</h3>
	  
      <form action="salesforceCRM.php" method="post" name="contactform" id="contactform" onSubmit="return false;" >	
          <input name="PersonLeadSource" type="hidden" value="Smith and Ken Home Loans Website" />  
            <input name="record_type" type="hidden" value="Mortgage Prospect" />
            <input name="Website_form__c" type="hidden" value="Quick Contact of Home Loans Website" /> 
	  <div id="formid">
        <table border="0"  width="450"cellpadding="0" cellspacing="0" class="enquire">
          <tr>
            <td width="200" >First Name<span class="mandatory">*</span></td>
		    <td width="39">:</td>
		    <td width="200"><input name="FirstName" id="FirstName" size="25" maxlength="100" class="txtFldnorml" type="text" onmousedown="changecolorname(this);" onfocus="if(this.value=='Enter name') this.value='';"></td>
		    </tr>
			<tr>
            <td width="200" >Last Name</td>
		    <td width="39">:</td>
		    <td width="200">
		      <input name="LastName" id="LastName" size="25" maxlength="100" class="txtFldnorml" type="text" ></td>
		    </tr>            
            <tr>
            <td>Email<span class="mandatory">*</span></td>
		    <td>:</td>
		    <td><input name="PersonEmail" id="PersonEmail" size="25" maxlength="100" class="txtFldnorml" type="text" onmousedown="changecolor(this);"  value=""  onfocus="if(this.value==this.defaultValue) this.value='';"  ></td>
		    </tr>
            
            <tr>
            <td>Country of Residence <span class="mandatory"></span></td>
		    <td>:</td>
		    <td>
			<select name="Country__c" id="Country__c"  title="" class="txtFldnorml">

<option value="">Country of Residence</option>
<option value="Afganistan" >Afganistan</option><option value="Alaska" >Alaska</option><option value="Albania" >Albania</option><option value="Algaria" >Algaria</option><option value="Andorra" >Andorra</option><option value="Angola" >Angola</option><option value="Anguilla" >Anguilla</option><option value="Antigua &amp; Barbuda" >Antigua &amp; Barbuda</option><option value="Argentine" >Argentine</option><option value="Armenia Rep." >Armenia Rep.</option><option value="Aruba" >Aruba</option><option value="Ascension Island" >Ascension Island</option><option value="Australia" >Australia</option><option value="Australian External" >Australian External</option><option value="Austria" >Austria</option><option value="Azerbaizan" >Azerbaizan</option><option value="Bahamas" >Bahamas</option><option value="Bahrain" >Bahrain</option><option value="Bangladesh" >Bangladesh</option><option value="Barbados" >Barbados</option><option value="Belarus" >Belarus</option><option value="Belgium" >Belgium</option><option value="Belize" >Belize</option><option value="Benin (Dhaomey)" >Benin (Dhaomey)</option><option value="Bermuda" >Bermuda</option><option value="Bhutan" >Bhutan</option><option value="Bolivia" >Bolivia</option><option value="Bosnia &amp; Herzegovina" >Bosnia &amp; Herzegovina</option><option value="Bosnia &amp; Herzegovina" >Bosnia &amp; Herzegovina</option><option value="Botswana" >Botswana</option><option value="Botswana" >Botswana</option><option value="Brazil" >Brazil</option><option value="Brunei Darussalam" >Brunei Darussalam</option><option value="Bulgaria" >Bulgaria</option><option value="Burkina Faso" >Burkina Faso</option><option value="Burma/Myanmar" >Burma/Myanmar</option><option value="Burundi" >Burundi</option><option value="Cambodia" >Cambodia</option><option value="Cameroon Rep." >Cameroon Rep.</option><option value="Canada" >Canada</option><option value="Cape Verde" >Cape Verde</option><option value="Caymen Islands" >Caymen Islands</option><option value="Certral African Rep." >Certral African Rep.</option><option value="Chad Rep." >Chad Rep.</option><option value="Chile" >Chile</option><option value="China" >China</option><option value="Colombia" >Colombia</option><option value="Comoros" >Comoros</option><option value="Congo" >Congo</option><option value="Cook Island" >Cook Island</option><option value="Costa Rica" >Costa Rica</option><option value="Crostia" >Crostia</option><option value="Cuba" >Cuba</option><option value="Cyprus" >Cyprus</option><option value="Czech Rep." >Czech Rep.</option><option value="Denmark" >Denmark</option><option value="Diego Garcia" >Diego Garcia</option><option value="Djibouti Rep." >Djibouti Rep.</option><option value="Doha (Qatar)" >Doha (Qatar)</option><option value="Dominican British" >Dominican British</option><option value="Dominican Rep." >Dominican Rep.</option><option value="Ecuador" >Ecuador</option><option value="Egypt" >Egypt</option><option value="El Salvador" >El Salvador</option><option value="Equatorial Guinea Re" >Equatorial Guinea Re</option><option value="Eriteria" >Eriteria</option><option value="Eriteria" >Eriteria</option><option value="Estonia Rep." >Estonia Rep.</option><option value="Ethiopia (F.D.R )" >Ethiopia (F.D.R )</option><option value="Falkland Island" >Falkland Island</option><option value="Faroe Is. (Denmark )" >Faroe Is. (Denmark )</option><option value="Fiji (Republic of )" >Fiji (Republic of )</option><option value="Finland" >Finland</option><option value="Finland" >Finland</option><option value="France" >France</option><option value="French Polynesia (Ta" >French Polynesia (Ta</option><option value="Gabon Rep." >Gabon Rep.</option><option value="Gambia" >Gambia</option><option value="Gayana" >Gayana</option><option value="Georgia" >Georgia</option><option value="Germany" >Germany</option><option value="Ghana" >Ghana</option><option value="Gibraltar" >Gibraltar</option><option value="Greece" >Greece</option><option value="Greenland (Denmark )" >Greenland (Denmark )</option><option value="Grenade" >Grenade</option><option value="Guadeloupe" >Guadeloupe</option><option value="Guam" >Guam</option><option value="Guatemala" >Guatemala</option><option value="Guina ( French )" >Guina ( French )</option><option value="Guinea Bissau Rep." >Guinea Bissau Rep.</option><option value="Guinea Rep." >Guinea Rep.</option><option value="Haiti Rep." >Haiti Rep.</option><option value="Hawai" >Hawai</option><option value="Honduras Rep." >Honduras Rep.</option><option value="Honkong" >Honkong</option><option value="Hungary Rep." >Hungary Rep.</option><option value="Iceland" >Iceland</option><option value="India Rep." >India Rep.</option><option value="Indonesia" >Indonesia</option><option value="Inmarsat (Atlantic o" >Inmarsat (Atlantic o</option><option value="Inmarsat (Atlantic o" >Inmarsat (Atlantic o</option><option value="Inmarsat (Indian oce" >Inmarsat (Indian oce</option><option value="Inmarsat (Pacific oc" >Inmarsat (Pacific oc</option><option value="Iran" >Iran</option><option value="Iraq" >Iraq</option><option value="Ireland" >Ireland</option><option value="Italy" >Italy</option><option value="Ivory Coast" >Ivory Coast</option><option value="Jamaica" >Jamaica</option><option value="Japan" >Japan</option><option value="Jordan" >Jordan</option><option value="Kazakstan" >Kazakstan</option><option value="Kazakstan" >Kazakstan</option><option value="Kenya" >Kenya</option><option value="Kirghistan" >Kirghistan</option><option value="Kirghistan" >Kirghistan</option><option value="Kirghistan" >Kirghistan</option><option value="Kiribati" >Kiribati</option><option value="Korea (South)" >Korea (South)</option><option value="Kuwait" >Kuwait</option><option value="Laos P.D.R" >Laos P.D.R</option><option value="Latvia Rep." >Latvia Rep.</option><option value="Lebanon" >Lebanon</option><option value="Lesotho" >Lesotho</option><option value="Liberia Rep." >Liberia Rep.</option><option value="Libya" >Libya</option><option value="Liechtenstein(Princi" >Liechtenstein(Princi</option><option value="Liechtenstein(Princi" >Liechtenstein(Princi</option><option value="Lithuania Rep." >Lithuania Rep.</option><option value="Luxembourg" >Luxembourg</option><option value="Macao" >Macao</option><option value="Macedonia" >Macedonia</option><option value="Malagasy(Madagascar)" >Malagasy(Madagascar)</option><option value="Malawi" >Malawi</option><option value="Malaysia" >Malaysia</option><option value="Maldives" >Maldives</option><option value="Maldova Rep." >Maldova Rep.</option><option value="Mali Rep." >Mali Rep.</option><option value="Malta" >Malta</option><option value="Marshall Islands Rep" >Marshall Islands Rep</option><option value="Martinique (French)" >Martinique (French)</option><option value="Mauritania Rep." >Mauritania Rep.</option><option value="Mauritius" >Mauritius</option><option value="Mayanmar" >Mayanmar</option><option value="Mexico" >Mexico</option><option value="Monaco" >Monaco</option><option value="Monaco" >Monaco</option><option value="Mongolia" >Mongolia</option><option value="Monserrat" >Monserrat</option><option value="Morocco" >Morocco</option><option value="Mozambique Rep." >Mozambique Rep.</option><option value="Muscat(Oman)" >Muscat(Oman)</option><option value="Namibia Rep." >Namibia Rep.</option><option value="Nauru Rep." >Nauru Rep.</option><option value="Nepal" >Nepal</option><option value="Netherlands" >Netherlands</option><option value="Netherlands Antil." >Netherlands Antil.</option><option value="New Caledonia" >New Caledonia</option><option value="New Zealand" >New Zealand</option><option value="Nicaragua" >Nicaragua</option><option value="Niger Rep." >Niger Rep.</option><option value="Nigeria" >Nigeria</option><option value="North Korea" >North Korea</option><option value="Northern Mariana Is." >Northern Mariana Is.</option><option value="Norway" >Norway</option><option value="Pakistan" >Pakistan</option><option value="Panama Rep." >Panama Rep.</option><option value="Papua New Guinea" >Papua New Guinea</option><option value="Paraguay Rep." >Paraguay Rep.</option><option value="Peru" >Peru</option><option value="Philippines Rep." >Philippines Rep.</option><option value="Poland Rep." >Poland Rep.</option><option value="Portugal" >Portugal</option><option value="Puerto Rico" >Puerto Rico</option><option value="Qatar" >Qatar</option><option value="Rawanda" >Rawanda</option><option value="Reunion (French)" >Reunion (French)</option><option value="Romania" >Romania</option><option value="Russia" >Russia</option><option value="Russia" >Russia</option><option value="Saint Kitts And Nevi" >Saint Kitts And Nevi</option><option value="Saint Lucia" >Saint Lucia</option><option value="Saint Thomas" >Saint Thomas</option><option value="Saint Vincent" >Saint Vincent</option><option value="San Marino Rep." >San Marino Rep.</option><option value="Saudi Arabia" >Saudi Arabia</option><option value="Senegal" >Senegal</option><option value="Seychelles Rep." >Seychelles Rep.</option><option value="Sierraleone" >Sierraleone</option><option value="Singapore Rep." >Singapore Rep.</option><option value="Slovak Rep." >Slovak Rep.</option><option value="Slovenia Rep." >Slovenia Rep.</option><option value="Solomon Is." >Solomon Is.</option><option value="Somalia" >Somalia</option><option value="South Africa" >South Africa</option><option value="Spain" >Spain</option><option value="Sri Lanka" >Sri Lanka</option><option value="Sudan Rep." >Sudan Rep.</option><option value="Suriname Rep." >Suriname Rep.</option><option value="Swaziland" >Swaziland</option><option value="Sweden" >Sweden</option><option value="Switzerland" >Switzerland</option><option value="Syrian Arab ReP." >Syrian Arab ReP.</option><option value="Taiwan" >Taiwan</option><option value="Tajikistan Rep." >Tajikistan Rep.</option><option value="Tajikistan Rep." >Tajikistan Rep.</option><option value="Tanzania" >Tanzania</option><option value="Thailand" >Thailand</option><option value="Togo" >Togo</option><option value="Tonga" >Tonga</option><option value="Trinidad and Tobago" >Trinidad and Tobago</option><option value="Tunisia" >Tunisia</option><option value="Turkey" >Turkey</option><option value="Turkmanistan" >Turkmanistan</option><option value="Turkmanistan" >Turkmanistan</option><option value="Turkmanistan" >Turkmanistan</option><option value="Turks and Caicos Is." >Turks and Caicos Is.</option><option value="Tuvalu" >Tuvalu</option><option value="U.K" >U.K</option><option value="U.S.A" >U.S.A</option><option value="Uganda" >Uganda</option><option value="Ukrain" >Ukrain</option><option value="United Arab Emirates" >United Arab Emirates</option><option value="Uruguay" >Uruguay</option><option value="Uzbekistan" >Uzbekistan</option><option value="Vanuatu Rep." >Vanuatu Rep.</option><option value="Vanuatu Rep." >Vanuatu Rep.</option><option value="Venezuela Rep." >Venezuela Rep.</option><option value="Viet Nam" >Viet Nam</option><option value="Virgin Island (U.S." >Virgin Island (U.S.</option><option value="Virgin Island(Britis" >Virgin Island(Britis</option><option value="Western Samoa" >Western Samoa</option><option value="Yemen (P.D.R)" >Yemen (P.D.R)</option><option value="Yemen Rep." >Yemen Rep.</option><option value="Yugoslavia" >Yugoslavia</option><option value="Zaire (Dem.Rep.congo" >Zaire (Dem.Rep.congo</option><option value="Zambia Rep." >Zambia Rep.</option><option value="Zimbabwe Rep." >Zimbabwe Rep.</option>            </select>

			</select></td>
		    </tr> 
            
            <tr>
            <td>Contact no.<span class="mandatory">*</span></td>
		    <td>:</td>
		    <td>
	        
			<select name="phonetype" id="phonetype"  title="" class="select2" style="width:85px;">
			<option  value="Mobile">Mobile</option>
			<option  value="Work Phone">Work Phone</option>
			<option  value="Fax">Fax</option>
			<option  value="Home Phone">Home Phone</option>
			</select>
			
	        <input name="phone1" id="phone1" size="25" maxlength="3" class="txtFldnorml" type="text" style="width:30px;">
 	        <input name="Phone" id="Phone" size="25" maxlength="10" class="txtFldnorml" type="text" style="width:90px;">
			
			  <div id="perror" style="color:#FF0000;display:none; font-size:11px;">Enter phone number</div>
			
            </td>
		    </tr>
            <tr>
            <td>What are you interested in?<span class="mandatory">*</span></td>
		    <td>:</td>
		    <td>
			<select name="Type_of_Loan__c" id="Type_of_Loan__c"  title="" class="txtFldnorml">
				<option  value="Residential Mortgage">Residential Mortgage</option>
			    <option  value="Commerical Finance">Commerical Finance</option>
			    <option  value="International Finance">International Finance</option>
			    <option  value="Agents Referral (Introducer) Agreement">Agents Referral (Introducer) Agreement</option>
		    	<option  value="Other">Other</option>
			</select></td>
		    </tr>           
           
           <tr>
            <td>Loan Amount Required<span class="mandatory">*</span></td>
		    <td>:</td>
		    <td><input name="What_Loan_Amount_are_you_looking_for__c" id="What_Loan_Amount_are_you_looking_for__c" size="25" maxlength="100" class="txtFldnorml" type="text" onmousedown="changecolorname1(this);" onfocus="if(this.value=='Enter Loan Amount') this.value='';" ></td>
		    </tr>         
            <tr>
            <td>How can we help?<span class="mandatory">*</span></td>
		    <td>:</td>
		    <td><textarea name="Description" id="Description" class="txtFldcmnt" onmousedown="changecolorcomm(this);"   onfocus="if(this.value=='Enter comments') this.value='';" ></textarea></td>
		    </tr>
          <tr>
          <td>&nbsp;</td><td>&nbsp;</td>
		  <td>
		  <input value="" type="submit" class="submitButton_form" onclick="return  validateQForm();">
		  
		  </td>
		  </tr>
		  <tr id="now" style="display:none;">
          <td>&nbsp;</td><td>&nbsp;</td>
		  <td>
		  
		  
		  </td>
		  </tr>
        </table>
		 </div>
		   <div id="after" style="display:none; height:270px;">Your message has been sent successfully </div>
	      </form>
      <div class="googlemap"><a href="javascript:;"></a></div>
    </div>
	</div>
</body>
</html>
