/*  Program name		: form_check.js
 	Program function	: general form checking client side js functions 	
	Author				: Shehran
	Developed by	    : CAMS
	
sample usage of some of the functions declared below are as follows:
<SCRIPT language=javascript src="./js/form_check.js"></SCRIPT>
<script language="javascript">
<!---  
function Validate(theform)
{
	if (isEmpty(theform.City.value)){    //this is text box validation example
  		alert("Please enter your City.\nNo spaces or blanks allowed.");
		theform.City.focus();
		return false; 
	}
		
	if(theform.int_country_id.selectedIndex == 0){  //this is dropdown validation example
	  alert("Please Select your Counrty");
	  theform.int_country_id.focus();
	  return false;	
	}	
	
	var retval = usernameCheck(theform.dealer_username.value) //sample username validation example
	if (retval == false){
		theform.dealer_username.focus();
  		return false;
	}	
	
	var retval = emailCheck(theform.email.value)  // email validation example
	if (retval == false){
		theform.email.focus();
  		return false;
	}	 
}	
--->
</script>	
--------------------------------------------------------------------*/
// function to confirm database setup
function confirm_setup(){
	if(confirm("Tables already exists.\nThis action will drop all tables and data and it CANNOT BE UNDONE. \nAre you sure that you want to run Setup again?")){
		return true;
	}
	return false;
}
// function to open a new window
function openWin(windowURL, windowName, windowFeatures){ 
	window.open(windowURL, windowName, windowFeatures);
	return false; 
}

// function to confirm record deletion
function confirmCleanUp(Link) {
   if (confirm("Are you sure you want to delete ?")) {
      location.href=Link;
   }
}

// to simulate the clicking of the browser back button
function fn_back(){
	window.history.back();
}	

// function to check YEAR with 4 digit
function isYear(snum)
{
	var reInteger = /^[1-9]\d{3}$/
	return reInteger.test(snum)
}
// function to check indiger field
function IsInteger(snum)
{
	var reInteger = /^\d+$/
    return reInteger.test(snum)
}

// function to check SSN US
function IsSSN(snum)
{
	var reSSN = /^(\d{3})(-)(\d{2})(-)(\d{4})$/	
    return reSSN.test(snum)
}

// function to check US phone - fomat 999-999-9999
function IsPhone(snum)
{
	var rePhone = /^(\d{3})(-)(\d{3})(-)(\d{4})$/	
    return rePhone.test(snum)
}

// Check whether string s is empty.
function isEmpty(s)
{   
	return ((s == null) || (s.length == 0) || (s.substr(0,1) == " "))
}

// function to check Price value ( with two decimal places )
function isPrice(s)
{  
	var reFloat = /^[\d\.]((\d+(\.\d{0,2})?)|((\d*\.)?\d{0,2}))$/	
	return reFloat.test(s)	   	
}
// function to check float/decimal fileds
function isFloat(s)
{  
	var reFloat = /^((\d+(\.\d*)?)|((\d*\.)?\d+))$/	
	return reFloat.test(s)	   	
}

// function to check username fields
function usernameCheck (s){
  // this is done to avoid any special characters
  var reUsername = /^[a-zA-Z0-9][a-zA-Z0-9_]*$/
  
  if (isEmpty(s)){
  	 alert("Please enter a desired Username. Minimum 8 characters.\nNo spaces, blanks or special characters , except '_'.");
	 return false; 
  } 
  else{
   	 var matchArray = s.match(reUsername); // is the format ok? 
	 if (matchArray == null) { 
		alert("Username should contain only \nalphabets, digits or underscore '_'.\n '_' should not be the first character.");
		return false; 
	 }	 	
	 else{ 
	  	 if(s.length<8){		
			alert("Username should be minimum of 8 characters");	
			return false; 
		 }	
	 }			
  }      	 
  return true;
}

// function to check username fields
function passwordCheck (s){
  // this is done to avoid any special characters
  var rePassword = /^[a-zA-Z0-9][a-zA-Z0-9~!@#$%^&*()]*$/
  
  if (isEmpty(s)){
  	 alert("Please enter a desired Password. Minimum 8 characters.\nNo spaces and blanks allowed.");
	 return false; 
  } 
  else{
   	 var matchArray = s.match(rePassword); // is the format ok? 
	 if (matchArray == null) { 
		alert("Password should contain only alphabets, digits\nor only these special characters ~!@#$%^&*()$\nbut not the first character.");
		return false; 
	 }	 	
	 else{ 
	  	 if(s.length<8){		
			alert("Password should be minimum of 8 characters");	
			return false; 
		 }	
	 }			
  }      	 
  return true;
}
	
// function to validate date field
function isValidDate(dateStr) { 
// Checks for the following valid date formats: 
// MM/DD/YY MM/DD/YYYY MM-DD-YY MM-DD-YYYY 
// Also separates date into month, day, and year variables 

var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{2}|\d{4})$/; 

// To require a 4 digit year entry, use this line instead: 
// var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/; 

var matchArray = dateStr.match(datePat); // is the format ok? 
if (matchArray == null) { 
	alert("Date is not in a valid format.") 
	return false; 
} 
month = matchArray[1]; // parse date into variables 
day = matchArray[3]; 
year = matchArray[4]; 
if (month < 1 || month > 12) { // check month range 
alert("Month must be between 1 and 12."); 
return false; 
} 
if (day < 1 || day > 31) {
alert("Day must be between 1 and 31."); 
return false; 
} 
if ((month==4 || month==6 || month==9 || month==11) && day==31) {
alert("Month "+month+" doesn't have 31 days!") 
return false 
} 
if (month == 2) { // check for february 29th 
var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0)); 
if (day>29 || (day==29 && !isleap)) { 
alert("February " + year + " doesn't have " + day + " days!"); 
return false; 
} 
} 
return true; // date is valid 
} 
// End date validation -------------------------------------> 

function emailCheck(emailStr) {
	/* The following pattern is used to check if the entered e-mail address
	   fits the user@domain format.  It also is used to separate the username
	   from the domain. */
	var emailPat=/^(.+)@(.+)$/
	/* The following string represents the pattern for matching all special
	   characters.  We don't want to allow special characters in the address. 
	   These characters include ( ) < > @ , ; : \ " . [ ]    */
	var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
	/* The following string represents the range of characters allowed in a 
	   username or domainname.  It really states which chars aren't allowed. */
	var validChars="\[^\\s" + specialChars + "\]"
	/* The following pattern applies if the "user" is a quoted string (in
	   which case, there are no rules about which characters are allowed
	   and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
	   is a legal e-mail address. */
	var quotedUser="(\"[^\"]*\")"
	/* The following pattern applies for domains that are IP addresses,
	   rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
	   e-mail address. NOTE: The square brackets are required. */
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	/* The following string represents an atom (basically a series of
	   non-special characters.) */
	var atom=validChars + '+'
	/* The following string represents one word in the typical username.
	   For example, in john.doe@somewhere.com, john and doe are words.
	   Basically, a word is either an atom or quoted string. */
	var word="(" + atom + "|" + quotedUser + ")"
	// The following pattern describes the structure of the user
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	/* The following pattern describes the structure of a normal symbolic
	   domain, as opposed to ipDomainPat, shown above. */
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
	
	
	/* Finally, let's start trying to figure out if the supplied address is
	   valid. */
	
	/* Begin with the coarse pattern to simply break up user@domain into
	   different pieces that are easy to analyze. */
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) {
	  /* Too many/few @'s or something; basically, this address doesn't
	     even fit the general mould of a valid e-mail address. */
		alert("Email address seems incorrect (check @ and .'s)")
		return false
	}
	var user=matchArray[1]
	var domain=matchArray[2]
	
	// See if "user" is valid 
	if (user.match(userPat)==null) {
	    // user is not valid
	    alert("The username doesn't seem to be valid.")
	    return false
	}
	
	/* if the e-mail address is at an IP address (as opposed to a symbolic
	   host name) make sure the IP address is valid. */
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
	    // this is an IP address
		  for (var i=1;i<=4;i++) {
		    if (IPArray[i]>255) {
		        alert("Destination IP address is invalid!")
			return false
		    }
	    }
	    return true
	}
	
	// Domain is symbolic name
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("The Domain Name doesn't seem to be valid.")
	    return false
	}
	
	/* domain name seems valid, but now make sure that it ends in a
	   three-letter word (like com, edu, gov) or a two-letter word,
	   representing country (uk, nl), and that there's a hostname preceding 
	   the domain or country. */
	
	/* Now we need to break up the domain to get a count of how many atoms
	   it consists of. */
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
	    domArr[domArr.length-1].length>3) {
	   // the address must end in a two letter or three letter word.
	   alert("The address must end in a three-letter domain, or two letter country.")
	   return false
	}
	
	// Make sure there's a host name preceding the domain.
	if (len<2) {
	   var errStr="This E-mail address is missing a hostname!"
	   alert(errStr)
	   return false
	   }
	   // If we've gotten this far, everything's valid!
	return true	   
}
/////////////
   function FormatNumber(num, decimalNum, bolLeadingZero, bolParens)
   /* IN - num:            the number to be formatted
           decimalNum:     the number of decimals after the digit
           bolLeadingZero: true / false to use leading zero
           bolParens:      true / false to use parenthesis for - num

      RETVAL - formatted number
   */
   {
       var tmpNum = num;

       // Return the right number of decimal places
       tmpNum *= Math.pow(10,decimalNum);
       tmpNum = Math.floor(tmpNum);
       tmpNum /= Math.pow(10,decimalNum);

       var tmpStr = new String(tmpNum);

       // See if we need to hack off a leading zero or not
       if (!bolLeadingZero && num < 1 && num > -1 && num !=0)
           if (num > 0)
               tmpStr = tmpStr.substring(1,tmpStr.length);
           else
               // Take out the minus sign out (start at 2)
               tmpStr = "-" + tmpStr.substring(2,tmpStr.length);                        


       // See if we need to put parenthesis around the number
       if (bolParens && num < 0)
           tmpStr = "(" + tmpStr.substring(1,tmpStr.length) + ")";


       return tmpStr;
   }


function urlCheck(emailStr) {
	/* The following pattern is used to check if the entered e-mail address
	   fits the user@domain format.  It also is used to separate the username
	   from the domain. */
	var emailPat=/^(.+)(.+)$/
	/* The following string represents the pattern for matching all special
	   characters.  We don't want to allow special characters in the address. 
	   These characters include ( ) < > @ , ; : \ " . [ ]    */
	var specialChars="\\(\\)<>,;:\\\\\\\"\\.\\[\\]"
	/* The following string represents the range of characters allowed in a 
	   username or domainname.  It really states which chars aren't allowed. */
	var validChars="\[^\\s" + specialChars + "\]"
	/* The following pattern applies if the "user" is a quoted string (in
	   which case, there are no rules about which characters are allowed
	   and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
	   is a legal e-mail address. */
	var quotedUser="(\"[^\"]*\")"
	/* The following pattern applies for domains that are IP addresses,
	   rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
	   e-mail address. NOTE: The square brackets are required. */
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	/* The following string represents an atom (basically a series of
	   non-special characters.) */
	var atom=validChars + '+'
	/* The following string represents one word in the typical username.
	   For example, in john.doe@somewhere.com, john and doe are words.
	   Basically, a word is either an atom or quoted string. */
	var word="(" + atom + "|" + quotedUser + ")"
	// The following pattern describes the structure of the user
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	/* The following pattern describes the structure of a normal symbolic
	   domain, as opposed to ipDomainPat, shown above. */
	var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
	
	
	/* Finally, let's start trying to figure out if the supplied address is
	   valid. */
	
	/* Begin with the coarse pattern to simply break up user@domain into
	   different pieces that are easy to analyze. */
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) {
	  /* Too many/few @'s or something; basically, this address doesn't
	     even fit the general mould of a valid e-mail address. */
		alert("Web site address seems incorrect ")
		return false
	}
	var user=matchArray[1]
	var domain=matchArray[2]
	
	// See if "user" is valid 
	if (user.match(userPat)==null) {
	    // user is not valid
	    alert("The username doesn't seem to be valid.")
	    return false
	}
	
	/* if the e-mail address is at an IP address (as opposed to a symbolic
	   host name) make sure the IP address is valid. */
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) {
	    // this is an IP address
		  for (var i=1;i<=4;i++) {
		    if (IPArray[i]>255) {
		        alert("Destination IP address is invalid!")
			return false
		    }
	    }
	    return true
	}
	
	// Domain is symbolic name
	var domainArray=domain.match(domainPat)
	if (domainArray==null) {
		alert("The domain name doesn't seem to be valid.")
	    return false
	}
	
	/* domain name seems valid, but now make sure that it ends in a
	   three-letter word (like com, edu, gov) or a two-letter word,
	   representing country (uk, nl), and that there's a hostname preceding 
	   the domain or country. */
	
	/* Now we need to break up the domain to get a count of how many atoms
	   it consists of. */
	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (domArr[domArr.length-1].length<2 || 
	    domArr[domArr.length-1].length>3) {
	   // the address must end in a two letter or three letter word.
	   alert("The address must end in a three-letter domain, or two letter country.")
	   return false
	}
	
	// Make sure there's a host name preceding the domain.
	if (len<2) {
	   var errStr="This E-mail address is missing a hostname!"
	   alert(errStr)
	   return false
	   }
	   // If we've gotten this far, everything's valid!
	return true	   
}


//function for domain name check
function checkDomain()
 
{
var arr = new Array(
'.com','.net','.org','.biz','.coop','.info','.museum','.name',
'.pro','.edu','.gov','.int','.mil','.ac','.ad','.ae','.af','.ag',
'.ai','.al','.am','.an','.ao','.aq','.ar','.as','.at','.au','.aw',
'.az','.ba','.bb','.bd','.be','.bf','.bg','.bh','.bi','.bj','.bm',
'.bn','.bo','.br','.bs','.bt','.bv','.bw','.by','.bz','.ca','.cc',
'.cd','.cf','.cg','.ch','.ci','.ck','.cl','.cm','.cn','.co','.cr',
'.cu','.cv','.cx','.cy','.cz','.de','.dj','.dk','.dm','.do','.dz',
'.ec','.ee','.eg','.eh','.er','.es','.et','.fi','.fj','.fk','.fm',
'.fo','.fr','.ga','.gd','.ge','.gf','.gg','.gh','.gi','.gl','.gm',
'.gn','.gp','.gq','.gr','.gs','.gt','.gu','.gv','.gy','.hk','.hm',
'.hn','.hr','.ht','.hu','.id','.ie','.il','.im','.in','.io','.iq',
'.ir','.is','.it','.je','.jm','.jo','.jp','.ke','.kg','.kh','.ki',
'.km','.kn','.kp','.kr','.kw','.ky','.kz','.la','.lb','.lc','.li',
'.lk','.lr','.ls','.lt','.lu','.lv','.ly','.ma','.mc','.md','.mg',
'.mh','.mk','.ml','.mm','.mn','.mo','.mp','.mq','.mr','.ms','.mt',
'.mu','.mv','.mw','.mx','.my','.mz','.na','.nc','.ne','.nf','.ng',
'.ni','.nl','.no','.np','.nr','.nu','.nz','.om','.pa','.pe','.pf',
'.pg','.ph','.pk','.pl','.pm','.pn','.pr','.ps','.pt','.pw','.py',
'.qa','.re','.ro','.rw','.ru','.sa','.sb','.sc','.sd','.se','.sg',
'.sh','.si','.sj','.sk','.sl','.sm','.sn','.so','.sr','.st','.sv',
'.sy','.sz','.tc','.td','.tf','.tg','.th','.tj','.tk','.tm','.tn',
'.to','.tp','.tr','.tt','.tv','.tw','.tz','.ua','.ug','.uk','.um',
'.us','.uy','.uz','.va','.vc','.ve','.vg','.vi','.vn','.vu','.ws',
'.wf','.ye','.yt','.yu','.za','.zm','.zw');

var mai = form1.ext_path.value;
var val = true;

var dot = mai.lastIndexOf(".");
var dname = mai.substring(0,dot);
var ext = mai.substring(dot,mai.length);
//alert(ext);
	
if(dot>2 && dot<57)
{
	for(var i=0; i<arr.length; i++)
	{
	  if(ext == arr[i])
	  {
	 	val = true;
		break;
	  }	
	  else
	  {
	 	val = false;
	  }
	}
	if(val == false)
	{
	  	 alert("Your domain extension "+ext+" is not correct");
		 return false;
	}
	else
	{
		for(var j=0; j<dname.length; j++)
		{
		  var dh = dname.charAt(j);
		  var hh = dh.charCodeAt(0);
		  if((hh > 47 && hh<59) || (hh > 64 && hh<91) || (hh > 96 && hh<123) || hh==45 || hh==46)
		  {
			 if((j==0 || j==dname.length-1) && hh == 45)	
		  	 {
		 	  	 alert("Domain name should not begin are end with '-'");
			      return false;
		 	 }
		  }
		else	{
		  	 alert("Your domain name should not have special characters");
			 return false;
		  }
		}
	}
}
else
{
 alert("Your Domain name is too short/long");
 return false;
}	

return true;
}


function check(){
 if(form1.mailf.value!=""){
   checkDomain();
   form1.mailf.focus();
   return false;
  }
 return true;
}

//function for textarea character check
 function check_length(my_form)
{
maxLen = 199; // max number of characters allowed
if (my_form.s_disc.value.length > maxLen) {
// Alert message if maximum limit is reached. 
// If required Alert can be removed. 
var msg = "You have reached your maximum limit of characters allowed";
alert(msg);
// Reached the Maximum length so trim the textarea
my_form.s_disc.value = my_form.s_disc.value.substring(0, maxLen);
}
else{ // Maximum length not reached so update the value of my_text counter
my_form.text_num.value = maxLen - my_form.s_disc.value.length;}
}

// end o