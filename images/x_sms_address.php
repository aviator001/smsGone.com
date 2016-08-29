<?php
$phoneNumber = $_REQUEST['mobile'];
$USER_ID = 'xtue.web@gmail.com';
$PASSWORD = 'ybkebp';

$arr_m = array('(',')','-','.', ',',' ');
$arr_r = array('','','','','','');
$phoneNumber = str_replace($arr_m, $arr_r, $phoneNumber);

$WSDL = 'http://ws.strikeiron.com/PhoneandAddressAdvanced?WSDL';
$client = new SoapClient($WSDL, array('trace' => 1, 'exceptions' => 1));
$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
$client->__setSoapHeaders($header);

try
{
  ReverseLookupByPhoneNumber($phoneNumber);
}
catch (Exception $ex)
{
	echo $ex->getMessage() . "<br />";
}

function ReverseLookupByPhoneNumber($phoneNumber)
{
	global $client;
	$params = array("PhoneNumber" => $phoneNumber);

	$result = $client->__soapCall("ReverseLookupByPhoneNumber", array($params), null, null, $output_header);
	$name = $result->ReverseLookupByPhoneNumberResult->ServiceResult->FullName;
	$street = $result->ReverseLookupByPhoneNumberResult->ServiceResult->Address;
	$city = $result->ReverseLookupByPhoneNumberResult->ServiceResult->City;
	$state = $result->ReverseLookupByPhoneNumberResult->ServiceResult->StateOrProvince;
	$zip = $result->ReverseLookupByPhoneNumberResult->ServiceResult->ZIPOrPostalCode;

	$arr['name'] = $result->ReverseLookupByPhoneNumberResult->ServiceResult->FullName;
	$arr['mobile'] = $phoneNumber;
	$arr['address'] = $result->ReverseLookupByPhoneNumberResult->ServiceResult->Address;
	$arr['city'] = $result->ReverseLookupByPhoneNumberResult->ServiceResult->City;
	$arr['state'] = $result->ReverseLookupByPhoneNumberResult->ServiceResult->StateOrProvince;
	$arr['zip'] = $result->ReverseLookupByPhoneNumberResult->ServiceResult->ZIPOrPostalCode;
	echo $arr = @json_encode($arr);
}
?>
