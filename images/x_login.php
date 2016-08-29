<?
	error_reporting(0);
	$dbhandle=mysql_connect("199.91.65.87","gautamadmin","gautam2014!") or die("Unable to connect");
	$select=mysql_select_db("finggr",$dbhandle) or die("Unable to connect to db");
	$user_input = strtolower($_REQUEST["joint_user_input"]);
	$data_type = strtolower($_REQUEST["data_type"]);
	if (($data_type == 'mobile') && (strlen(trim($user_input)) == 10)) $user_input = '1' . trim($user_input);
	$password = strtolower($_REQUEST["password"]);
	$sql = mysql_query("select * from sms_subscribers where (((mobile = '".$user_input."')||(profile = '".$user_input."')||(email = '".$user_input."')||(name = '".$user_input."')) and `password` = '".$password."')");
	$cnt = mysql_num_rows($sql);
	if ($cnt > 0) {
	while($Q = mysql_fetch_array($sql)) {
		$id        =  $Q[id];
		$member_id =  $Q[member_id];
		$mobile    =  $Q[mobile]; 
		$email     =  $Q[email];
		$profile   =  $Q[profile];
		$name      =  $Q[name];
		$long_code =  $Q[long_code];
		$password  =  $Q[password]; 
		$balance   =  $Q[available_sms_count];
	}		
		$user_data =  $id . '|' . $member_id . '|' . $mobile . '|' . $email . '|' . $profile . '|' . $name . '|' . $long_code . '|' . $password . '|' . $balance; 
		$nos = $mobile . '|' . $long_code;
		setcookie( "msid", $nos );
		setcookie( "mobile", isValidMobile($mobile) );
		setcookie( "long_code", isValidMobile($long_code) );
		setCookie( "USER_DATA", $user_data);
		setCookie( "points_balance", $balance);
		echo $mobile."|".$long_code;
	}

	function isValidMobile($mob) {
		$num = trim($mob);
		$arr_a = array("-","."," ","(",")");
		$arr_b = array("","","","","");
		$num = str_replace($arr_a, $arr_b, $num);

		if ((strlen($num) < 10) || (strlen($num) > 11)) return false;
		$num = (strlen($num) == 11) ? $num : ('1' . $num);	
		
		if ((strlen($num) == 11) && (substr($num, 0, 1) == "1")) {
			return $num;
		} else {
			return false;
		}
	}
	
?>
