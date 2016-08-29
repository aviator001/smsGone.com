<?
	include "utils.class.php";
	include("../x_lib.php");
	$utils = new utils();
	$utils->connect();
	
	$enc_msg = str_replace(' ','+',$_REQUEST['enc_msg']);
	$enc_key = str_replace(' ','+',$_REQUEST['enc_key']);
	$enc_cell = str_replace(' ','+',$_REQUEST['enc_cell']);
	$bin = str_replace(' ','+',$_REQUEST['bin']);
	$token = str_replace(' ','+',$_REQUEST['token']);
	$long_code = $_COOKIE['long_code'];
	$pass = date('Ymdh');

	$msg = $utils->decrypt($enc_msg, $pass, 256);
	$key = $utils->decrypt($enc_key, $pass, 256);
 	$cell = $utils->decrypt($enc_cell, $pass, 256);
	$bin_user_token = $utils->decrypt($token, $pass, 256);
	$user_token = $utils->BinToHex($bin_user_token);
	
	//Now finally, encode the message(filenames) with the user created key
	$message = $utils->encrypt($msg, $key, 256);
	$utils->decrypt($message, $key, 256);
	$file = "../../f/".$bin_user_token;
	file_put_contents($file, $message);
	
	//Send SMS - End of Store Process
	echo $link = "http://199.91.65.85/~smsgone/g/?i=".$bin_user_token;
	$USER_ID = 'guatam@strikeiron.com';
	$PASSWORD = 'Strike1';
	$WSDL = 'http://ws.strikeiron.com/SMSAlerts4?WSDL';
	$client = new SoapClient($WSDL, array('trace' => 0, 'exceptions' => 0));
	$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
	$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
	$client->__setSoapHeaders($header);
	$params = array("ToNumber" => "$cell", "FromName" => "SMSGone!", "MessageText" => "$link");
	$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
	
?> 
 