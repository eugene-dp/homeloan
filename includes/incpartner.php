<?php
ini_set("soap.wsdl_cache_enabled", "0");
require('soapclient/SforcePartnerClient.php');
//require('soapclient/SforceHeaderOptions.php');
//salesforce login and wsdl
$wsdl = 'soapclient/partner.wsdl.xml';

$userName = "smithken_admin@propertybase.com";
$password = "Norwhich@2014";
$Token = "QytcJ8mMqwcY5f3tM8YVUSZWN";

$client = new SforcePartnerClient();
$client->createConnection($wsdl);
try{
	$loginResult = $client->login($userName, $password.$Token);
	//echo '<pre>' . print_r ($loginResult, true) . '</pre>';
}
catch(exception $e){
	echo '<pre>' . print_r ($e, true) . '</pre>';
return false;
exit;
}
exit;
?>