/*
	Project Name		: cwl
   	Program name		: news_letter.js
 	Program function	: Validation newsletter page
	Author				: Shehran
	Developed by	   	: CAMS
 	Created Date  		: 21 Nov, 03
 	
	Update History
    -------------------------------------------------------------------
    Date       		By 					short desc. of what updated 
    11 Nov, 03   programer name 2		description 2
	11 Nov, 03   programer name 3		description 3

--------------------------------------------------------------------- */
// load htmlarea
_editor_url = "./html_editor/";                     // URL to htmlarea files
var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
if (win_ie_ver >= 5.5) {
  document.write('<scr' + 'ipt src="' +_editor_url+ 'editor.js"');
  document.write(' language="Javascript1.2"></scr' + 'ipt>');  
} else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
// end html editor

function confirm_cleanup(){
   if (confirm("Are you sure you want to delete this Newsletter?")) {
	  return true;
   }
   return false;
}

function confirm_send(){
   if (confirm("Are you sure you want to send this Newsletter to all the subscribers?")) {
	  return true;
   }
   return false;
}

function validate(theform){	
    if(isEmpty(theform.frm_title.value)){
  		alert("Please enter your title.");
		theform.frm_title.focus();
		return false;
	}
	if (isEmpty(theform.frm_subject.value)){  
  		alert("Please enter your subject.");
		theform.frm_subject.focus();
		return false; 
	}
	if (isEmpty(theform.frm_content.value)){  
  		alert("Please enter your content.");
		theform.frm_content.focus();
		return false; 
	}
	return true;
}
