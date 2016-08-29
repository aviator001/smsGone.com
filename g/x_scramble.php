<?
	session_start();
	$id=session_id();
	if (!$id) $id=$_COOKIE['PHPSESSID'];
	
	$USER_ID = 'guatam@strikeiron.com';
	$PASSWORD = 'Strike1';
	$WSDL = 'http://ws.strikeiron.com/SMSAlerts4?WSDL';
	$client = new SoapClient($WSDL, array('trace' => 0, 'exceptions' => 0));
	$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
	$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
	$client->__setSoapHeaders($header);
	$host=$_SERVER['SERVER_NAME'];

	$enc_msg = str_replace(' ','+',$_REQUEST['enc_msg']);
	$enc_key = str_replace(' ','+',$_REQUEST['enc_key']);
	$enc_cell = str_replace(' ','+',$_REQUEST['enc_cell']);
	$enc_self = str_replace(' ','+',$_REQUEST['enc_self']);
	
	$bin = str_replace(' ','+',$_REQUEST['bin']);
	$token = str_replace(' ','+',$_REQUEST['token']);
	$long_code = $_COOKIE['long_code'];
	
	$pass = date('Ymdh');
	include("../x_lib.php");
	include("utils.class.php");
	include("sql.class.php");

	$utils = new utils();
	$utils->connect();
	$key = $utils->decrypt($enc_key, $pass, 256);
	$msg = $utils->decrypt($enc_msg, $key, 256);
  	$cell = $utils->decrypt($enc_cell, $key, 256);
 	$self = $utils->decrypt($enc_self, $key, 256);
				
	$bin_user_token = $utils->decrypt($token, $pass, 256);
	$user_token = $utils->BinToHex($bin_user_token);

	$arr=array(	'key' => $enc_key,
				'msg' => $enc_msg,
				'cell' => $enc_cell,
				'self' => $enc_self);
/*
	$url="http://edmstars.com/apc.php";
	$qs1="id=$id&key=key&value=$key";
	$qs2="id=$id&key=msg&value=$msg";
	$qs3="id=$id&key=cell&value=$cell";
	$qs4="id=$id&key=self&value=$self";

	execURL($url, $qs1);
	execURL($url, $qs2);
	execURL($url, $qs3);
	execURL($url, $qs4);

	function execURL($url,$qs) {
		file_get_contents($url . '?' . $qs);
	}
*/
	$file = "../../f/".$bin_user_token;
	file_put_contents($file, $enc_msg);
	
	$file = "../../f/".$bin_user_token.'_self';
	file_put_contents($file, $self);
	
	//Send SMS - End of Store Process
echo	$link = $host."/g?i=".$bin_user_token;
  
	global $client;
	$long_code=$_COOKIE['long_code'];
	$mobile=$_COOKIE['mobile'];
	$params = array("ToNumber" => $cell, "FromName" => $long_code, "MessageText" => $link);
	$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
	
	//create entry in sms_tracker table 
	$to_real_number = $cell;
	//Check if user is a previously registered user? If so, we just use his previously assigned long_code
	
	$r = $utils->query("select long_code from sms_long_codes where mobile = '$to_real_number'");

	if (count($r) < 1) {
		//Recepient is NOT a registered user
		//$to_long_code = randomly assigned long_code with requirements below;
		
		//RULE 1: it should not have been used to send the originator a message in the past.
		//RULE 2: it should not belong to a registered member (that is, exists in the sms_long_codes table)

		//Therefore:
		//Look in the sms_tracker table first to see if sender has sent the recepient a message before?
		// AND 
		//Also Look if a long code has already been used to talk to sender in the past?
		$t=$utils->query("select long_code from sms_tracker where mobile='$mobile' and sender='$to_real_number' order by id asc limit 1");
		if (empty($t[0]['long_code'])) {
			//Never communicated before!
			//Find a temp long code that meets above requirements
			$to_long_code=$utils->query("select long_code from sms_long_codes where mobile='' and long_code not in (select long_code from sms_tracker where mobile='$from_real_number') order by id asc limit 1")[0]['long_code'];
			//Insert it in the sms_tracker table for future lookups
			$utils->insert("INSERT into sms_tracker VALUES('NULL','$from','$to_long_code','$to_real_number')");
		} else {
			//They have spoken before!
			$to_long_code=$t[0]['long_code'];
		}	
	} else {
		//Recepient is a registered user
		$to_long_code = $r[0][long_code];
	}
	
	$params = array("ToNumber" => $mobile, "FromName" => $to_long_code, "MessageText" => "You sent an encrypted message. Now follow it up right here if you like. Your number will always be hidden.");
	$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
		
	function encode($msg, $key) {
		return $msg;
	}
?> 