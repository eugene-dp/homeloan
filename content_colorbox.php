<style type="text/css">
.blue{ color: #1d1160; }
.clear{  clear:both; }
.dash_line{border-top:dashed #949ca1 1px; margin:1px 5px; width:97%; margin-bottom:8px;}
#homer{}
h2{ font-size:16px; font-weight:bold; margin:5px; margin:2px 2px; }
#homer #content_packages_id{width:290px; background:#FFF; padding:5px; float:left; min-height:500px;}
#homer .inputf{ float:left; width:285px;   min-height:18px; padding:1px; color:#333; font-size:13px;  }
#homer .inlined{color: #1d1160; font-size:13px; font-weight:bold; clear:both; }
.#homer required{ color:#F00;}
#homer .input_field_divs{ float:left; margin:0px; padding:0px; margin-top:-8px; }
#homer .input_field_div{ margin:-2px 0px 0px 0px; width:290px;  float:left; clear:both;font-size: 11px; color:#1D1160; font-weight: bold; }			  
#homer inp_div{ width:280px !important; }
#homer .inp_div input{ clear:right;}
#homer .input_left_div_rel{ width:108px; float:left;  margin-top:2px; }
#homer .input_right_div_rel{ width:90px;  float:left;  margin-top:2px; }

.input_txt{  background:url("images/bg-input.png") no-repeat scroll 0 0 transparent; border:1px solid #BBBBBB;  
color:#999; display:block; height:15px; line-height:13px; margin:0; padding:4px 1px 4px 6px; margin-top:-24px; position:relative; text-shadow:0 0 1px #FFFFFF;  width:270px; }
.input_txt_select{ background:url("images/bg-input.png") no-repeat scroll 0 0 transparent !important; border:1px solid #BBBBBB; height:24px; color:#999; font-size:12px; margin:0px; padding:0px; clear:both; margin-top:-24px; }
#homer .small_txt{ font-size:10px; color:#949ca1; font-weight:normal;   }

#homer #content_ultimate_id{width:580px; background:#FFF; padding:5px; float:left; min-height:345px;}
#homer .error{ color:#F00; font-size:10px; font-weight:normal; width:200px; margin:0px 2px !important; height:13px !important; }
#homer .untimate_rows{ float:left; width:578px;   }
#homer .untimate_row{ float:left; width:578px; margin:0px 0px; }
#homer .untimate_row_left{ float:left;  width:280px; min-height:20px;  }
#homer .untimate_row_right{ float:left; width:280px; min-height:20px;  margin-left:10px; }

label.inlined{background-color:#FFFFFF; display:block; overflow:hidden; padding:4px 0 3px 6px; position:relative; white-space:nowrap; color:#999; font-weight:normal; font-size:12px; }
.smtxt{ font-size:12px; color:#999; font-weight:normal; }
</style>
<script type="text/javascript" language="javascript">
function postForm(){
	var valid = true;
	var FirstName , LastName , PersonEmail , Country__c , Where_Are_You_Relocating_From__c , Phone;
		FirstName = document.getElementById('FirstNamep').value;
	if(FirstName == '') {
		document.getElementById('FirstName_span').innerHTML = '<span> This field is required.</span>';
		document.getElementById('FirstNamep').focus();
		valid = false; return valid;
	}
	LastName = document.getElementById('LastNamep').value;
	if(LastName == '') {
		document.getElementById('LastName_spanp').innerHTML = '<span> This field is required.</span>';
		document.getElementById('LastNamep').focus();
		valid = false; return valid;
	}
	PersonEmail = document.getElementById('PersonEmailp').value;
	var msgPersonEmail = isValidEmailAddress(PersonEmail);
	if(PersonEmail == '' || msgPersonEmail == false) {
		if(PersonEmail == '') {
			document.getElementById('PersonEmail_spanp').innerHTML = '<span> This field is required. </span>'; 
		}else{
			document.getElementById('PersonEmail_spanp').innerHTML = '<span> Please enter a valid email address. </span>'; 
		}
		document.getElementById('PersonEmailp').focus();
		valid = false; return valid;
	}
	Country__c = document.getElementById('Country__c').value;
	if(Country__c == '') {
		document.getElementById('Country__c_spanp').innerHTML = '<span> This field is required.</span>';
		document.getElementById('Country__c').focus();
		valid = false; return valid;
	}
	Where_Are_You_Relocating_From__c = document.getElementById('Where_Are_You_Relocating_From__cp').value;
	if(Where_Are_You_Relocating_From__c == '') {
		document.getElementById('Where_Are_You_Relocating_From__c_spanp').innerHTML = '<span> This field is required.</span>';
		document.getElementById('Where_Are_You_Relocating_From__cp').focus();
		valid = false; return valid;
	}
	Phone = document.getElementById('Phonep').value;
		var reg=/[0-9]/	
		if(reg.test(Phone)) {
		var msgPhone = true;
		} else {
		var msgPhone = false;
		}
   if(Phone=='' || msgPhone == false) {
			if(Phone == '') {
				document.getElementById('Phone_spanp').innerHTML = '<span> This field is required. </span>'; 
			}else{
				document.getElementById('Phone_spanp').innerHTML = '<span> Please enter a valid  Phone. </span>'; 
			}
		document.getElementById('Phonep').focus();
		valid = false; return valid;	
	}
	When_are_you_looking_to_relocate__c = document.getElementById('When_are_you_looking_to_relocate__cp').value;
	if(When_are_you_looking_to_relocate__c=='') {
		document.getElementById('When_are_you_looking_to_relocate__c_spanp').innerHTML = '<span> This field is required.</span>';
		document.getElementById('When_are_you_looking_to_relocate__c_spanp').focus();
		valid = false; return valid;
	}
	return valid;
}
function mouseOverFunc(Ids){
	var LastName , PersonEmail , Country__c , Where_Are_You_Relocating_From__c , Phone;
	if(Ids == 'FirstName') {
		var FirstName;
		FirstName = document.getElementById(Ids).value;
		if(FirstName == '') {
			document.getElementById('FirstName_span').innerHTML = '<span> This field is required.</span>';
			valid = false; return valid;
		}else{
			document.getElementById('FirstName_span').innerHTML = '';
		}
	}
	if(Ids == 'LastName') {
		var LastName;
		LastName = document.getElementById(Ids).value;
		if(LastName == '') {
			document.getElementById('LastName_span').innerHTML = '<span> This field is required.</span>';
			valid = false; return valid;
		}else{
			document.getElementById('LastName_span').innerHTML = '';
		}
	}
  if(Ids == 'PersonEmail') {
		var PersonEmail;
		PersonEmail = document.getElementById(Ids).value;
		var msgPersonEmail = isValidEmailAddress(PersonEmail);
		if(PersonEmail == '' || msgPersonEmail == false) {
			if(PersonEmail == '') {
				document.getElementById('PersonEmail_span').innerHTML = '<span> This field is required. </span>'; 
			}else{
				document.getElementById('PersonEmail_span').innerHTML = '<span> Please enter a valid email address. </span>'; 
			}
			valid = false; return valid;
		}else{
			document.getElementById('PersonEmail_span').innerHTML = '';
		}
  }
 if(Ids == 'Country__c') {
		var Country__c;
		Country__c = document.getElementById(Ids).value;
	if(Country__c == '') {
		document.getElementById('Country__c_span').innerHTML = '<span> This field is required.</span>';
		valid = false; return valid;
	}else{
		document.getElementById('Country__c_span').innerHTML = '';
	}
 }

  if(Ids == 'Phone') {
		var Phone;
		Phone = document.getElementById(Ids).value;
			var reg=/[0-9]/	
			if(reg.test(Phone)) {
			var msgPhone = true;
			} else {
			var msgPhone = false;
			}
		if(Phone=='' || msgPhone == false) {
				if(Phone == '') {
					document.getElementById('Phone_span').innerHTML = '<span> This field is required. </span>'; 
				}else{
					document.getElementById('Phone_span').innerHTML = '<span> Please enter a valid  Phone. </span>'; 
				}
			valid = false; return valid;	
		}else{
			document.getElementById('Phone_span').innerHTML = ''; 
		}
  }
	if(Ids == 'When_are_you_looking_to_relocate__c') {
		var When_are_you_looking_to_relocate__c;
		When_are_you_looking_to_relocate__c = document.getElementById(Ids).value;
		
		if(When_are_you_looking_to_relocate__c == '') {
		document.getElementById('When_are_you_looking_to_relocate__c_spanp').innerHTML = '<span> This field is required.</span>';
		valid = false; return valid;
		}else{
		document.getElementById('When_are_you_looking_to_relocate__c_spanp').innerHTML = '';
		}
	}
}
function isValidEmailAddress(PersonEmailAddress) {
 		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
 		return pattern.test(PersonEmailAddress);
}
function checkInternationalPhone(strPhone){
	s=stripCharsInBag(strPhone,validWorldPhoneChars); return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}
function country_to_code(varc) {
	var x=document.getElementById("Country__c").selectedIndex;
	var y=document.getElementById("Country__c").options;
	document.getElementById('country_name_code').selectedIndex=x;
}
</script>