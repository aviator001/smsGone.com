<?
	/* * * * * * * * * * * * * * * * * * * * * * 
	 Copyright 2014 ALL RIGHTS RESERVERD!
    --------------------------------------------
		1.	AUTHOR		:	Gautam Sharma
		2.	COMPANY		:	finggr.com LLC
		2.	APP			:	finggr.com
		3.	MODULE		:	SMS Gateway
		4.	PAGE		:	x_sms_gateway.php
		5.	DESCRIPTION	:	SMS Relay Services
		6.	DATE		:	July 5th 2014
		7.	EMAIL		:	xtue.web@gmail.com
	--------------------------------------------
	**/
	include "x_lib.php";
	include("g/utils.class.php");
	$utils = new utils();

	$recycle_long_codes = false;
	$num_anon = "16012077077";
	$num_encp = "16012077070";
	$default_pswd = '123456';
	$key = date('YmdH');
	$user_token = substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4);
	$bin_user_token = $utils->strToBin($user_token);
	$aes_user_token = $utils->encrypt($bin_user_token, $key);
	
	$USER_ID = 'xtue.web@gmail.com';
	$PASSWORD = 'ybkebp';
	$WSDL = 'http://ws.strikeiron.com/SMSAlerts4?WSDL';
	$client = new SoapClient($WSDL, array('trace' => 0, 'exceptions' => 0));
	$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
	$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
	$client->__setSoapHeaders($header);
	
	$x=stripslashes($_POST['XMLDATA']);
	$xml = simplexml_load_string($x);
	$arr = json_decode(json_encode($xml),true);
	$data = $arr[MessageList][Message];
	$date=date('Y-m-d H:i:s');
	$avatar = "default_avatar.png";
	$mid = $data[MessageID];
	$country_code = '1';
	$member_id_s = rand(1000000,9999999);
	$member_id_r = rand(1000000,9999999);
	$free_sms_count = 10;

	$to_long_code = isValidMobile($data[ToNumber]);
	$from_real_number = isValidMobile($data[FromNumber]);
	$sms_message = trim($data[MessageText]);
	$member_id = '1';

	$from_real_number = isValidMobile($from_real_number);
	
	if (!isValidMobile($to_long_code)) {
		echo "FAIL";
	} else {
			if (stristr($sms_message, '@@')) {
				if (stristr($sms_message, 'help')) {
					sms_notify($from_real_number, "@@hold all\r\nPause Delivery of all Messages\r\n\r\n@@hold off\r\nResume Message Delivery\r\n\r\n@@block 123.456.7890\r\n@@unblock 123.456.7890\r\nBlock|Unblock a number", $to_long_code);
					sms_notify($from_real_number, "@@balance - Gives your current balance\r\n\r\n6012077070 [key] MESSAGE\r\nSends New Encrypted Message\r\n\r\n6012077077 MESSAGE\r\nSends New Anon Message", $to_long_code);
					charge_credit($from_real_number);
				}

				if (stristr($sms_message, 'hold all')) {
					mysql_query("INSERT INTO sms_holds VALUES ('NULL', '$from_real_number', '1')");
					sms_notify($from_real_number, "Message delivery halted.\r\n\r\nSend '@@hold off' to resume delivery and '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}
				
				if (stristr($sms_message, 'hold off')) {
					mysql_query("DELETE FROM sms_holds where mobile='$from_real_number'");
					sms_notify($from_real_number, "Message delivery resumed.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}

				if (stristr($sms_message, 'balance')) {
					$q = query("select available_sms_count from sms_subscribers where mobile='$from_real_number'");
					$balance = $q[0][available_sms_count];
					sms_notify($from_real_number, "Available Credit: $balance Messages.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}

				if (stristr($sms_message, 'whois')) {
					$cb = str_replace(" ", "|", $sms_message);
					$cb = explode('|', $cb);
					$who_is_mobile = isValidMobile($cb[1]);
					$who_is = file_get_contents("http://shadowsms.com/x_sms_id.php?mobile=$who_is_mobile");
					sms_notify($from_real_number, "$who_is_mobile belongs to $who_is\r\n\r\n2 Credits Used\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
					charge_credit($from_real_number);
				}

				if (stristr($sms_message, 'reset password')) {
					$sms_message = trim($sms_message);
					$password = substr($sms_message, strrpos($sms_message, " ", 2), strlen($sms_message)-strrpos($sms_message, " ", 2));
					mysql_query("update sms_subscribers set password = '$password' where mobile='$from_real_number'");

					$q = query("select password, email, mobile from sms_subscribers where mobile='$from_real_number'");
					$password = $q[0][password];
					$mobile = $q[0][mobile];
					$email = $q[0][email];
					sms_notify($from_real_number, "Password Updated Successfully!\r\n\r\nNew Login Info:\r\n\r\nLogin Here:\r\nshadowsms.com/l/?m=".substr($from_real_number,1)."\r\nPassword: $password\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}

				if (stristr($sms_message, 'transfer')) {
					
					$transfer_to_mobile = substr($sms_message, 11, 10);
					$transfer_to_mobile = isValidMobile($transfer_to_mobile);
					
					$credits = trim(substr($sms_message, strrpos($sms_message, " ", 2), strlen($sms_message)-strrpos($sms_message, " ", 2)));
					
					$q = query("select available_sms_count from sms_subscribers where mobile='$from_real_number'");
					$balance = $q[0][available_sms_count];
					
					$q = query("select available_sms_count from sms_subscribers where mobile='$transfer_to_mobile'");
					$user_balance = $q[0][available_sms_count];

					if ($credits < $balance) {
						mysql_query("update sms_subscribers set available_sms_count = (".($user_balance*1 + $credits*1).") where mobile='$transfer_to_mobile'");
						mysql_query("update sms_subscribers set available_sms_count = (".($balance*1 - $credits*1).") where mobile='$from_real_number'");
						sms_notify($from_real_number, "Transferred $credit Credits Successfully.\r\n\r\nYour new balance is: ".($balance*1 - $credits*1)." Messages.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					} else {
						charge_credit($from_real_number);
					}

				}

				if (stristr($sms_message, 'password')) {
					if (!stristr($sms_message, 'reset password')) {
						$q = query("select password, email, mobile from sms_subscribers where mobile='$from_real_number'");
						$password = $q[0][password];
						$mobile = $q[0][mobile];
						$email = $q[0][email];
						sms_notify($from_real_number, "Login Here:\r\nshadowsms.com/l/?m=".substr($mobile, 1, strlen($mobile)-1)."\r\nPassword: $password\r\n\r\nSend '@@help' for more commands", $to_long_code);
						charge_credit($from_real_number);
					}
				}

				if (stristr($sms_message, 'block')) {
					if (strlen($sms_message) == 7) {
						$number_to_block = $to_long_code;
					} else {
						$cb = str_replace(" ", "|", $sms_message);
						$cb = explode('|', $cb);
						$block_long_code = isValidMobile($cb[1]);
						$q = query("select mobile from sms_subscribers where long_code = '$block_long_code'");
						$number_to_block = $q[0][mobile];
						if (!$number_to_block) $number_to_block = $block_long_code;
					}
					mysql_query("INSERT INTO sms_blocked VALUES ('NULL', '$from_real_number', '$number_to_block')");
					sms_notify($from_real_number, format_sms($number_to_block)." has been blocked. Send 'UNBLOCK $number_to_block' to unblock.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}

				if (stristr($sms_message, 'unblock')) {
					$cb = str_replace(" ", "|", $sms_message);
					$cb = explode('|', $cb);
					$block_long_code = isValidMobile($cb[1]);
					$q = query("select mobile from sms_subscribers where long_code = '$block_long_code'");
					$number_to_block = $q[0][mobile];
					if (!$number_to_block) $number_to_block = $block_long_code;
					mysql_query("DELETE FROM sms_blocked WHERE mobile = '$from_real_number' and mobile_blocked='$number_to_block'");
					sms_notify($from_real_number, format_sms($number_to_block)." has been unblocked. Send 'BLOCK 10 Digit Mobile Number' to block any number.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}
	
				if (stristr($sms_message, 'fav')) {
					if (strlen($sms_message) == 5) {
						$number_to_fav = $to_long_code;
					} else {
						$cb = str_replace(" ", "|", $sms_message);
						$cb = explode('|', $cb);
						$fav_long_code = isValidMobile($cb[1]);
						$q = query("select mobile from sms_subscribers where long_code = '$fav_long_code'");
						$number_to_fav = $q[0][mobile];
						if (!$number_to_fav) $number_to_fav = $fav_long_code;
					}
					mysql_query("INSERT INTO sms_favs VALUES ('NULL', '$from_real_number', '$number_to_fav')");
					sms_notify($from_real_number, format_sms($number_to_fav)." has been favourite listed.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}
				
				if (stristr($sms_message, 'add')) {
				//	USAGE:	@@add [first_name] [last_name]
					$cb = str_replace(" ", "|", $sms_message);
					$cb = explode('|', $cb);
					$con_long_code = isValidMobile($cb[1]);
					$con_name = trim($cb[2]);

					if ($cb[3]) $con_name .= trim($cb[3]);
					$q = query("select mobile from sms_subscribers where long_code = '$con_long_code'");
					$number_to_con = $q[0][mobile];
					if (!$number_to_con) $number_to_con = $con_long_code;
					if ($con_name) set_caller_id($con_name, $number_to_con);

					mysql_query("INSERT INTO sms_contacts VALUES ('NULL', '$from_real_number', $con_cat, $con_name, '$number_to_con')");
					sms_notify($from_real_number, $name.' | '.format_sms($number_to_com)." has been added to your contacts.\r\n\r\nSend '@@help' for more commands", $to_long_code);
					charge_credit($from_real_number);
				}
				
			} else {
				if ($to_long_code == $num_anon) {
					$dual_anon = extract_number_from_message($sms_message, $member_id_r, $free_sms_count);
					$to_real_number = isValidMobile($dual_anon[0]);
				}
				$q = query("select long_code from sms_subscribers where mobile = '$from_real_number'");
				$r = query("select long_code from sms_long_codes where assigned_to = '$from_real_number'");

				if (!($q[0][long_code]) && !($r[0][long_code])) {
					$from_long_code = auto_register($default_pswd, $from_real_number, $member_id_s, $free_sms_count, true, $to_real_number);
				} else {
					$from_long_code = $q[0][long_code];
				}
				
				if ($to_long_code == $num_encp) {
					$dual = parse_message($default_pswd, $from_real_number, $sms_message, $member_id_r, $free_sms_count);
					$to_real_number = $dual[0];
					$to_long_code = $dual[1];
					$key = $dual[2];
					$message = $dual[3];
					encrypt_message($to_long_code, $to_real_number, $from_long_code, $from_real_number, $key, $message);
				} else {
					if ($to_long_code == $num_anon) {
						$dual_anon = extract_number_from_message($sms_message, $member_id_r, $free_sms_count);
						$to_real_number = isValidMobile($dual_anon[0]);
						$sms_message = $dual_anon[1];
						$q = query("select long_code from sms_subscribers where mobile = '$to_real_number'");
						if (!$q[0][long_code]) {
							$to_long_code = auto_register($default_pswd, $to_real_number, $member_id_s, $free_sms_count, false, $from_real_number);
						} else {
							$to_long_code = $q[0][long_code];
						}						
					} else {
						if ($recycle_long_codes) {
							$q = query("select mobile, active from sms_secondary_subscribers where original_long_code_from = '$to_long_code' and mobile_to = '$from_real_number'" );
							$active = trim($q[0][active]);
							if ($active == "1") {
								$query_check = query("select name, mobile from sms_subscribers where long_code = '$to_long_code'");
								$to_real_number = trim($query_check[0][mobile]);
							} else {
								$to_real_number = trim($q[0][mobile]);
								$to_long_code = auto_register($default_pswd, $to_real_number, $member_id, $free_sms_count, false, $from_real_number);
							}
						}
						$q = query("select name, mobile from sms_subscribers where long_code = '$to_long_code'");
						$to_real_number = trim($q[0][mobile]);
					}

				$to_real_number = isValidMobile($to_real_number);
				$q = query("select available_sms_count from sms_subscribers where mobile='$from_real_number'");
				$balance = $q[0][available_sms_count] * 1;
				$sh = 'outgoing';
				$loc = '"pricing.php"';
				if ($balance*1 < 1) {
					$sms_message = "Sorry, we are unable to send your message. Please buy additional credit.<a href='#' onclick='close_me()' class='btn btn-primary' style='height:25px;padding:5px;margin:5px;margin-left:0px'>Buy Now!</a>";
					$to_long_code = $from_real_number;
					$from_long = $from_long_code;
					$from_long_code = "system";
					$sh = $from_long;
				}
				send_message($mid, $from_real_number, $to_real_number, $from_long_code, $to_long_code, $sh, $sms_message, $date, $xml);
			}
		}
	}
	function output_SendMessage_result( $svcResult ) {
		$b .=  $svcResult->ToNumber . ',';
		$b .=  $svcResult->Ticket . ',';
		$b .=  $svcResult->StatusExtra . ',';
		$b .=  $svcResult->WelcomeMessageSent . ',';
		return $b;
	}
	
	function extract_number_from_message($message) {
		$a1 = array('-','(',')','.');
		$a2 = array('','','','');
		$message = str_replace($a1, $a2, trim($message));
		$match = is_numeric(substr($message,0,11)) ? substr($message,0,11) : (is_numeric(substr($message,0,10)) ? substr($message,0,10) : $match);
		$message=str_replace($match,"",$message);
		return Array($match, $message);
	}
	
	function extract_key_from_message($message) {
		$a1 = array('-','(',')','.');
		$a2 = array('','','','');
		$message = str_replace($a1, $a2, trim($message));
		$key_msg = strAB('[', ']', $message, true);
		$key = $key_msg[0];
		$msg = $key_msg[1];
		return Array($key, $msg);
	}
		
	function strAB($a, $b, $str, $destructive=false) {
		if ($destructive) {
			$key = substr($str, (strPos($str, $a) + strlen($a)), (strPos($str, $b) - (strPos($str, $a) + strlen($a))));
			$key_str = '[' . $key . ']';
			$str_min = trim(str_replace($key_str, '', $str));
			$arr = array($key, $str_min);
		} else {
			$key = substr($str, (strPos($str, $a) + strlen($a)), (strPos($str, $b) - (strPos($str, $a) + strlen($a))));
			$arr = array($key, $str);
		}
		return $arr;
	}
	
	function encrypt_message($to_long_code, $to_real_number, $from_long_code, $from_real_number, $raw_key, $raw_msg) {
		$arr_rep1 = array('[',']','"',"'");
		$arr_rep2 = array('(',')','','');
		$raw_msg = str_replace($arr_rep1, $arr_rep2, $raw_msg);
		
		$utils = new utils();
		$dir = date('HYmdHh');
		$a = range('A','Z');
		$b = range(1,9);
		$c = array('0',' ','+','-','$','.',',','?','!',';','@','*','#','(',')');
		$arr_a = array_merge($a, $b, $c);

		$raw_key = strtolower($raw_key);
		$raw_msg=strtoupper($raw_msg);
		
		if(!is_dir("xsr/$dir")) {
			mkdir("xsr/$dir", 0777, true);
		}	

		$src = "../img";
		$dst = "xsr/$dir";
		$key = date('YmdH');

		$user_token = substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4);
		$bin_user_token = $utils->strToBin($user_token);
		$alpha = "";

		for ($i=1; $i <= 50; $i++) {
			$fn = substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4);
			$f = '"'.$fn.'"';
			$f3 = "$dst/$fn.png";
			$f_b = '"'.$f3.'"';
			copy("$src/z$i.png", "$dst/$fn.png");
			$img_arr[$arr_a[$i-1]] = $fn;
		}
		for ($i=0; $i < strlen($raw_msg); $i++) {
			$alpha .= $img_arr[substr($raw_msg, $i, 1)].'|';
		}		

		$alpha = substr($alpha,0,strlen($alpha)-1);
		$message = $utils->encrypt($alpha, $raw_key, 256);
		$file = "../f/".$bin_user_token;
		file_put_contents($file, $message);
		$link = "http://finggr.com/g/?i=".$bin_user_token;
		send_message($mid, $from_real_number, $to_real_number, $from_long_code, $to_long_code, 'outgoing', $link);
	}	

	function sms_notify($mobile, $system_message, $from = 'ShadowSMS') {
		global $client;
		$params = array("ToNumber" => $mobile, "FromName" => $from, "MessageText" => $system_message);
		$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
	}

	function charge_credit($from, $to) {
		$from_mobile = isValidMobile($from);
		$to_mobile = isValidMobile($to);
		$q = query("select id from sms_secondary_subscribers where active='1' and original_mobile_from='$from_mobile' and mobile_to = '$to_mobile'");
		if ($q[0][id]) {
			mysql_query("update sms_subscribers set available_sms_count = (available_sms_count-1), no_sent = (no_sent + 1) where mobile = '$from_mobile'");
		}
	}
	
	function parse_message($default_pswd, $from_real_number, $message, $member_id_r=1, $free_sms_count=10) {
		$to_real_number = "0";
		$key = "0";
		$sms_message = "0";
		$m_arr = extract_number_from_message($message);
		$to_real_number = trim($m_arr[0]);
		$sms_message = trim($m_arr[1]);
		
		if ((strpbrk($sms_message, "[")) && (strpbrk($sms_message, "]"))) {
			$n_arr = extract_key_from_message($sms_message);
			$key = $n_arr[0];
			$sms_message = $n_arr[1];
		}
		
		$to_real_number = isValidMobile($to_real_number);
		$q = query("select long_code from sms_subscribers where mobile = '$to_real_number'");
		$r = query("select long_code from sms_long_codes where assigned_to = '$to_real_number'");
		if (!($q[0][long_code]) && !($r[0][long_code])) {
			$to_long_code = auto_register($pswd, $to_real_number, $member_id_r, $free_sms_count, false, $from_real_number);
		} else {
			$to_long_code = $q[0][long_code];
		}
		return array($to_real_number, $to_long_code, $key, $sms_message);
	}
		
	function auto_register($pswd, $mobile_number, $member_id, $free_sms_count, $primary, $to_real_number) {
		$mobile_number = isValidMobile($mobile_number);
		$q = query("select id from sms_subscribers where mobile = '$mobile_number'");
		if (!$q[0][id]) {
			$when = date('Y-m-d H:i:s');
			$q = query("select long_code from sms_long_codes where assigned_to = '$mobile_number'");
			if (!$q[long_code]) {
				$long = query("select long_code from sms_long_codes where !assigned_to order by id asc limit 1");
				$new_long_code = isValidMobile($long[0][long_code]);
				$name = get_caller_id($mobile_number);
				if ($mobile_number && $new_long_code) {
					mysql_query("UPDATE sms_long_codes set full='1', assigned_to = '$mobile_number', assigned_date='".date('Y-m-d h:i:s')."' where long_code = '$new_long_code'");
					mysql_query("INSERT INTO sms_subscribers VALUES (NULL, $member_id, 'USER".rand(1111,9999)."', '$mobile_number@shadowmessaging.com', '$pswd', '$name','$mobile_number', '$new_long_code','".date('Y-m-d h:i:s')."', '','$no_sms_sent_to_date', '1', '$free_sms_count', '".$_SERVER['HTTP_REFERER']."', '".$_SERVER['REMOTE_ADDR']."', 0, 'default_avatar.png','a1')");
					if ($primary) {
						mysql_query("INSERT INTO sms_primary_subscribers VALUES ('NULL', '$mobile_number')");
						mysql_query("INSERT INTO sms_secondary_subscribers VALUES ('NULL', '$mobile_number', '$to_real_number', '$new_long_code', '$when', '1')");
					}
				}
				return $new_long_code;
			}
		}
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
	
	function send_message($mid, $from, $to, $from_long_code, $to_long_code, $inout, $sms_message, $date="", $debug_text="", $xml="")	{
		if ((trim($to) != "") && (!empty($to))) {
			$q = query("select id from sms_blocked where mobile_blocked = '$from' and msid='$to'");
			if (!$q[0][id]) {
				if ($from_long_code == 'system') {
					$from_long_code = $inout;
					mysql_query("insert into sms_history values('NULL','$mid','$member_id_from','$member_id_to','$from','$to','system','$to_long_code','".addslashes($sms_message)."','outgoing','$date','$balance','0','0','')");						
					$sms_message = 'Your Credits have expired. You may purchase more by visiting this link http://shadowsms.com/pricing.php';
					$to = $from;
					$params = array("ToNumber" => $to, "FromName" => $inout, "MessageText" => $sms_message);
					$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
				} else {
					charge_credit($from, $to);
					mysql_query("update sms_history set is_read=1 where to_mobile = '$from' and from_mobile=$to");
					$q = query("select id from sms_holds where mobile = '$to'");
					if (!$q[0][id]) {
						global $client;
						$params = array("ToNumber" => $to, "FromName" => $from_long_code, "MessageText" => $sms_message);
						$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
						mysql_query("insert into sms_history values('NULL','$mid','$member_id_from','$member_id_to','$from','$to','$from_long_code','$to_long_code','".addslashes($sms_message)."','outgoing','$date','$balance','0','0','')");						
					} else {
						mysql_query("insert into sms_held_messages values('NULL','$mid','$member_id_from','$member_id_to','$from','$to','$from_long_code','$to_long_code','".addslashes($sms_message)."','outgoing','$date','$balance','0','0','')");			
					}
				}
			}
		} else {
			$e_text = explode('|', $debug_text);
			$e_from = $e_text[0];
			$e_to = $e_text[1];
		}
		echo 200;
	}

	function get_caller_id($m) {
		$q = query("select name from sms_caller_id where mobile = '$m'");
		if (!$q[0][name] || stristr($q[0][name], 'user')) {
			$name = file_get_contents("http://finggr.com/x_sms_id.php?mobile=".trim($m));
			if (stristr($name, "Invalid")) $name = "ShadowSMS User";
			mysql_query("INSERT INTO sms_caller_id VALUES ('NULL', '$m', '$name')");
		} else {
			$name = $q[0][name];
		}
		return $name;
	}
	
	function send_system_message($to, $sms_message)	{
		global $client;
		$params = array("ToNumber" => $to, "FromName" => "ShadowSMS", "MessageText" => $sms_message);
		$result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);
		if(mysql_query("insert into sms_system_messages values('NULL','$to','".addslashes($sms_message)."','".date('Y-m-d H:i:s')."')")) {
			echo 200;
		} else {
			echo 500;
		}
	}

	function mailme($str) {
		mail('xtue.web@gmail.com','',$str,"From: Gautam Sharma <sms@finggr.com>");
	}

	function textme($str) {
		mail('3105676686@messaging.sprintpcs.com','',$str,"From: Gautam Sharma <sms@finggr.com>");
	}
	
?>