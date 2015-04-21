<?php
include("admin/includes/config.php");
include("admin/includes/functions.php");
	
dbconnect();

$adminemailaddress		 =	 getColumn("omort_admin","admin_email","admin_id=1");

	
//extract form inputs

$name 		  	  =	   $_POST['name'];
$lname 		  	  =	   $_POST['lname'];
$email            =    $_POST['email'];
$phonetype    	  =    $_POST['phonetype'];
$phone1  	  	  =    $_POST['phone1'];
$phone2  	  	  =    $_POST['phone2'];
$what  	          =    $_POST['InterestedIn'];
$LoanAmount 	  =	   $_POST['LoanAmount'];
$comments 	      =    $_POST['txtComments'];




$mailbody	      =    file_get_contents("mailer.html");
$mailbody	      =    str_replace("[NAME]",$name,$mailbody);
$mailbody	      =    str_replace("[LNAME]",$lname,$mailbody);
$mailbody         =    str_replace("[EMAIL]",$email,$mailbody);
$mailbody		  =	   str_replace("[PTYPE]",$phonetype,$mailbody);
$mailbody		  =	   str_replace("[PHONE1]",$phone1,$mailbody);
$mailbody		  =	   str_replace("[PHONE2]",$phone2,$mailbody);
$mailbody		  =	   str_replace("[WHAT]",$what,$mailbody);
$mailbody		  =	   str_replace("[LOAN]",$LoanAmount,$mailbody);
$mailbody		  =    str_replace("[COMMENTS]",nl2br($comments),$mailbody);
$mailbody		  =	   str_replace("[URL]",MAILER_LOGO,$mailbody);

// mail to admin
//SendMail($email,$adminemailaddress,$subject,$mailbody,$Cc='',$Bcc='',$attachment='');


			$from	    =   $email;
			$to			=	$adminemailaddress;
			$headers  	=	"MIME-Version: 1.0\r\n";
			$headers	.=	"Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
			$headers	.=	"From:".$from."\r\n";
            $subject				 =	 "Contact Us";	
			
			@mail($to,$subject,$mailbody,$headers);


// mail to client


// now sending thanks mail to customer

$replymail ='<html xmlns="http://www.w3.org/1999/xhtml">
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
             <td width="100%" align="left" valign="top" style=" border:1px solid #cfcfcf;">Your form has been submitted successfully. Thanks for contacting Oxygen Home Loans. </td>
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
			$subject  = "Oxygen Home Loans";
			
			@mail($to,$subject,$replymail,$headers);


echo "success";

//echo $mailbody;
?>