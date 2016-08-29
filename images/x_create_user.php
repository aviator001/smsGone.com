<?
	include 'x_lib.php';
	$password=$_REQUEST['password'];
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$mobile=trim($_REQUEST['mobile']); 
	
	$arr_a = array("-","."," ","(",")");
	$arr_b = array("","","","","");
	$mobile = str_replace($arr_a, $arr_b, $mobile);
	
	$avatar = (trim($_REQUEST['avatar']) == '') ? 'av/default_avatar.png' : trim($_REQUEST['avatar']); 
	if (!$avatar) $avatar = 'av/default_avatar.png';
	if (!$avatar) $avatar_id = 'a1';
	$name=addslashes($name);
	$reg_time = date('Y-m-d h:i:s');
	$x_source = $_SERVER['HTTP_REFERER'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$country_code = '1';
	$member_id = "1";
	$ra = rand(11,99);
	$profile = "USER".$ra.$ra;
	$active_or_not = 1;
	$available_sms_count = 10;

	if (strlen($mobile) < 11) $mobile = '1'.$mobile;
	$mo = mysql_query("select id from sms_primary_subscribers where mobile = '$mobile'");
	 while($m = mysql_fetch_array( $mo )) 
		{
			$em = $m['id']	;
		}	

	if (!$em) {

			$long_code = mysql_query("select id, long_code from sms_long_codes where ((assigned_to = '')||(assigned_to is null)) order by id ASC limit 1");
			 while($long = mysql_fetch_array( $long_code )) 
				{
					$e_long = $long['long_code'];
				}	
			$ac = trim($e_long);
			$mobile = trim($mobile);
			if (strlen($ac) == 10) $ac = "1".$ac;
			if (strlen($mobile) == 10) $mobile = "1".$mobile;
			mysql_query("update sms_long_codes set assigned_to = '$mobile', assigned_date='$reg_time', full = '1' where long_code = '$ac'");
			$sql = "INSERT INTO sms_subscribers VALUES (NULL, $member_id, '$profile', '$email', '$password', '$name', '".trim($mobile)."', '$ac','$reg_time', '','$no_sms_sent_to_date', $active_or_not, $available_sms_count, '$x_source', '$ip', 0, '$avatar','$avatar_id')";
			mysql_query($sql);
			$id = mysql_insert_id;
			mysql_query("INSERT INTO sms_primary_subscribers VALUES ('NULL', '$mobile')");
			
				$longcode = $country_code . ' ('. substr($ac, 1, 3) . ') ' . substr($ac, 4, 3) . ' - ' . substr($ac, 7, 4);
				$nos = $mobile . '|' . $ac;
				$user_data =  $id . '|' . $member_id . '|' . $mobile . '|' . $email . '|' . $profile . '|' . $name . '|' . $ac . '|' . $password . '|' . "0"; 
				setcookie( "msid", $nos );
				setcookie( "USER_DATA", $user_data );
				$text_link .= "<div class='byline' style='margin-top:-10px; font-size:1.3em;color:#4ca89b'>Successfully Registered and logged into the system!\r\n\r\nYour new Anonymous SMS number is <font color=black><b>$longcode</b></font>. \r\n\r\nGive this out to anyone you want to keep your real number hidden from. ";
				$text_link .= "\r\n\r\n";
				$text_link .= " Thank you for using showdowSMS.com!</div><br><br>";
				setcookie( "welcome", $text_link );
	} else {
		echo "SORRY, YOUR MOBILE NUMBER $mobile IS ALREADY REGISTERED! PLEASE TRY LOGGING IN, OR TRY A DIFFERENT MOBILE NUMBER";
	}
?>
