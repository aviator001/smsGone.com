<?php
	include "x_lib.php";
	$USER_ID = 'xtue.web@gmail.com';
	$PASSWORD = 'ybkebp';
	$WSDL = 'http://ws.strikeiron.com/SMSAlerts4?WSDL';
	$client = new SoapClient($WSDL, array('trace' => 1, 'exceptions' => 1));
	$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
	$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
	$client->__setSoapHeaders($header);
	send_message(trim($_REQUEST['to']), trim($_REQUEST['from']), trim($_REQUEST['message']));
?>