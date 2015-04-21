
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
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
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
function sendRequest() {
new Ajax.Request("mcal.php",
{
method: 'post',
parameters: 'show_progress=1&form_complete=1&sale_price='+$F('lAmount')+'&down_percent='+$F('DownPay')+'&annual_interest_percent='+$F('Interest')+'&year_term='+$F('Years')+'&fPayDate='+$F('fPayDate'),
onComplete: showResponse
//mcal.php?form_complete=1&sale_price=150000&down_percent=10&year_term=30&annual_interest_percent=7&show_progress=1
});
}
function showResponse(req){
document.getElementById("show").innerHTML=req.responseText;
document.getElementById('form_cal').style='display:none';
}

function validateQForm()
{

var flag = true;
	if(document.contactform.Years.value=='')
	{
		alert("Enter year");
		document.contactform.Years.focus();
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

<form action="calculate_in.php" method="post" name="contactform" id="contactform" onSubmit="return false;">
<div id="form_cal">
<table>
<tr>
<td>
Enter Amount :</td><td> <input type="text" name="lAmount" id="lAmount"/></td>
</tr>
<tr>
<td>
Annual Interest :</td><td> <input type="text" name="Interest" id="Interest" /></td>
</tr>
<tr>
<td>
Length (In Year) :</td><td> <input type="text" name="Years" id="Years" /></td>
</tr>
<tr>
<td>
First Payment Date :</td><td> <input type="text" name="fPayDate" id="fPayDate" /></td>
</tr>
<tr>
<td>
First Payment Amount:</td>
<td> <input type="text" name="DownPay" id="DownPay" /></td>
</tr>
<tr>
<td>
<input type="submit" value="Calculate" onclick="return  validateQForm();" />
</td><td>&nbsp; </td>
</tr>
</table>
</div>
<div id="show"></div>
</form>

</body>
</html>
