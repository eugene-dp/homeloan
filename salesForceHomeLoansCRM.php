<?php
require('includes/incpartner.php');


if(isset($_REQUEST['Website_form__c']) && $_REQUEST['Website_form__c']!='') {
	
	$actionName = '';
	
	$FirstName = $_REQUEST['FirstName']; 
	$LastName = $_REQUEST['LastName']; 
	$PersonEmail = $_REQUEST['PersonEmail'];
	$Country_Code__c = $_REQUEST['Country_Code__c'];
	$Phone = $_REQUEST['Phone'];
	$Website_form__c = $_REQUEST['Website_form__c'];
	$Description = $_REQUEST['Description'];
	$PersonLeadSource = $_REQUEST['PersonLeadSource'];
	
	$RecordType == 'Mortgage Prospect';
	$RecordTypeId = '012A0000000PWKCIA4'; 
	
	if($_REQUEST['Country__c']){
		$Country__c = $_REQUEST['Country__c'];
	}else{
			$Country__c = '';	 } 
	
	$Are_you_a_resident__c = ''; $Type_of_Loan__c = ''; $What_Loan_Amount_are_you_looking_for__c = 0; $Area__c = '';
	if($_REQUEST['Are_you_a_resident__c']){
		$Are_you_a_resident__c = $_REQUEST['Are_you_a_resident__c'];
	}
	if($_REQUEST['Type_of_Loan__c']){
		$Type_of_Loan__c = $_REQUEST['Type_of_Loan__c'];
	}
	if($_REQUEST['What_Loan_Amount_are_you_looking_for__c']){
		$What_Loan_Amount_are_you_looking_for__c = $_REQUEST['What_Loan_Amount_are_you_looking_for__c'];
	}
	if($_REQUEST['Area__c']){
		$Area__c = $_REQUEST['Area__c'];
	}
	
	if($_REQUEST['actionName']) {
		$actionName = $_REQUEST['actionName']; 
	}
	
/*	$num = mt_rand(1, 15);
	if($num<=5) {
	$ownerid = "005G0000001cWJZIA2"; // Meghna 
	}
	if($num>5 && $num<=10) {
	$ownerid = "005A0000000frmDIAQ";   // Oussama
	}
	if($num>10 && $num<=15) {
		$ownerid = "005A000000155AYIAY";   // Anna
	}*/
	//$ownerid = "005G00000023h4EIAQ";   // Arran Summerhill 
	$ownerid = "005G0000002vHaYIAQ";   // Jremy
	 
    $mystuff = array('FirstName' => $FirstName,
					 'LastName' => $LastName,
					 'PersonEmail' => $PersonEmail,
					 'Country_Code__c' => $Country_Code__c,
					 'Country__c' => $Country__c,
					 'Phone' => $Phone,
					 'Description' => $Description,
				
					 'Type_of_Loan__c' => $Type_of_Loan__c,
					 'What_Loan_Amount_are_you_looking_for__c' => $What_Loan_Amount_are_you_looking_for__c,
					 
					 'PersonLeadSource' => $PersonLeadSource, 
					 'Website_form__c' => $Website_form__c ,
					 'RecordTypeId' => $RecordTypeId,
					 'OwnerId' => $ownerid
			 ); 	
	$mystuff = array_map('htmlspecialchars', $mystuff);
	
	try {
		$sObject = new sObject();
		$sObject->type = 'Account';
		$sObject->fields = $mystuff;
		$createResponse = $client->create(array($sObject));
	}
	catch (exception $e) {
		if($actionName == 'MortgageCalculator') {
			header("location: http://www.smithandkenhomeloans.com/mortgage_calculator.php") or die();
		}else{
			header("location: http://www.smithandkenhomeloans.com/thank-you-page.php") or die();
		}
		return false;
		exit;
	
	}
	$ids = '';
		foreach ($createResponse as $createResult) {
			$ids = $createResult->id;
		}

	if($ids) {
	 	if($actionName == 'MortgageCalculator') {
			header("location: http://www.smithandkenhomeloans.com/mortgage_calculator.php") or die();
		}else{
			header("location: http://www.smithandkenhomeloans.com/thank-you-page.php") or die();
		}
	}else{
      $to = 'ben.smith@smithandken.com, agnes.lazarus@smithandken.com, pp@smithandken.com, support@smithandken.com, webleads@smithandken.com';
      $to1 = 'shahid.khan@smithandken.com, ';

$Message = '
Name:   '.$FirstName.''.$LastName.'

Email:  '.$PersonEmail.'

Phone:  '.$Country_Code__c.'-'.$Phone.' 

Country of residence: '.$Country__c.'

PersonLeadSource:  '.$PersonLeadSource.'

Enquiry From :  '.$Website_form__c.'

RecordType:  '.$RecordType.'

Description:  '.$Description.'  ';


if($_REQUEST['Are_you_a_resident__c']){
$Message.= '

Are You Resident:   '.$_REQUEST['Are_you_a_resident__c'].' ';
}

if($_REQUEST['Type_of_Loan__c']){
$Message.= '

Type of Loan:   '.$_REQUEST['Type_of_Loan__c'].' ';
}

if($_REQUEST['What_Loan_Amount_are_you_looking_for__c']){
$Message.= '

Loan Amount in AED :   '.$_REQUEST['What_Loan_Amount_are_you_looking_for__c'].' ';
}

if($_REQUEST['Area__c']){
$Message.= '

Area Interested in :   '.$_REQUEST['Area__c'].' ';
}
	
		$subject = ' Enquiry From Registered Lead - '.$PersonEmail.'  ';
		$headers = 'From: Smith & Ken Home Loans <info@smithandkenhomeloans.com> ' . "\r\n" .
		'Reply-To: '.$PersonEmail.' ' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	
		$mail = mail($to, $subject, $Message, $headers);
		$mail2 = mail($to1, $subject, $Message, $headers);
		
		if($actionName == 'MortgageCalculator') {
			header("location: http://www.smithandkenhomeloans.com/mortgage_calculator.php") or die();
		}else{
			header("location: http://www.smithandkenhomeloans.com/thank-you-page.php") or die();	
		}
	}
	exit;
}	



                     



?>
