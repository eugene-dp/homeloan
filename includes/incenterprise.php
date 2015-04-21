<?php

ini_set("soap.wsdl_cache_enabled", "0");

define('SFORCE_USER', "smithken_admin@propertybase.com");
define('SFORCE_PASS', "Norwhich@2014");
define('SFORCE_TOKEN', "QytcJ8mMqwcY5f3tM8YVUSZWN");



$oneweekago=date('Y-m-d',strtotime('-13 days')); 
$monthago=date('Y-m-d',strtotime('-13 days')); 

$lastdate = ''.$oneweekago.'T00:00:00.000Z';
$lastmonthdate = ''.$monthago.'T00:00:00.000Z';

/*    $wsdl = 'soapclient/enterprise.wsdl.xml';
    $userName = "smithken_admin@propertybase.com";
    $password = "wembley@1966";
    $Token = "7ZrVWP2nwqUgW8LXALIieY5t";
    $client = new SforceEnterpriseClient();
    $client->createConnection($wsdl);
    
    
    try{
	$loginResult = $client->login($userName, $password.$Token);
	//echo '<pre>' . print_r ($loginResult, true) . '</pre>';
	}
	catch(exception $e){
	echo '<pre>' . print_r ($e, true) . '</pre>';
	return false;
	exit;
	}	*/
?>