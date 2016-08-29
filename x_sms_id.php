<?php
	include "x_lib.php";
	$phoneNumber = $_REQUEST['mobile'];
	$USER_ID = 'xtue.web@gmail.com';
	$PASSWORD = 'ybkebp';

	$phoneNumber = isValidMobile($phoneNumber);
	$WSDL = 'http://ws.strikeiron.com/PhoneandAddressAdvanced?WSDL';
	$client = new SoapClient($WSDL, array('trace' => 1, 'exceptions' => 1));
	$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
	$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
	$client->__setSoapHeaders($header);

			global $client;
			$params = array("PhoneNumber" => $phoneNumber);
			$result = $client->__soapCall("ReverseLookupByPhoneNumber", array($params), null, null, $output_header);
			$name = $result->ReverseLookupByPhoneNumberResult->ServiceResult->FullName;
			if (stristr($name, "Invalid")) $name = "ShadowSMS User";
			mysql_query("INSERT INTO sms_caller_id VALUES ('NULL', '$phoneNumber', '$name')");
			echo !$name ? 'MOBILE USER' : $name;

	function fetch_extra($m) {
		echo file_get_contents("http://199.91.65.90/x_pull_user.php?mmobile=$phoneNumber");
	}
?>
