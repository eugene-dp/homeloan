<?php
echo "hai";

$from	    =	"maheshinwww@gmail.com";
$to			=   "mastermaheshk@gmail.com";
$headers  	=	"MIME-Version: 1.0\r\n";
$headers	.=	"Content-Type: text/html;\n\tcharset=\"iso-8859-1\"\n";
$headers	.=	"From:".$from."\r\n";
$subject 	=	"Global Renewables: Admin Login Details";
			
			echo mail($to,$subject,$mailbody,$headers);



?>