// JavaScript Document
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
		   document.contactform.phone1.style.color = "#FF0000"; 
		 	document.contactform.phone1.value = "Phone code";
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
