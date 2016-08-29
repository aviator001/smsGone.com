<?
	error_reporting(0);
	include "x_lib.php";

	$mobile = trim($_REQUEST['mob']);
	$mobile_from = $mobile;

	$long_code_to = trim($_REQUEST['long']);
	$r = query("select mobile, name, profile, avatar from sms_subscribers where long_code = '$long_code_to'");
	$profile_to = $r[0][profile];	
	$mobile_to = $r[0][mobile];

	$from_lc = trim($_REQUEST['from_long_code']);
	$to_lc = trim($_REQUEST['long_code']);

	$q = query("select name, profile, avatar from sms_subscribers where mobile = '$mobile'");
	$name_m = $q[0][name];
	$profile_m = $q[0][profile];
	
	$a_m = (!$q[0][avatar]) ? 'default_avatar.png' : $q[0][avatar];
	$q = query("select name, avatar, profile from sms_subscribers where mobile = '$to'");
	$a_m = 'name_alt.png';

	$name_to = $q[0][name];
	$a_to = (!$q[0][avatar]) ? 'default_avatar.png' : $q[0][avatar];
	$a_to = 'name.png';

	$p3 = $profile_m;
	$p4 = $profile_to;
	$str = "";
	$q = query("select * from sms_history where (((from_mobile = '$mobile_from' && to_mobile = '$mobile_to') || (from_mobile = '$mobile_to' && to_mobile = '$mobile_from') || ((from_mobile='$mobile_from') && (to_mobile = '$mobile_to') && (from_long_code = 'system'))) && (to_long_code != '$mobile_to')) order by sent asc");
	mysql_query("update sms_history set is_read='1' where (to_mobile = '$mobile')");
	for ($i = 0; $i < count($q); $i++) {
		if ($q[$i][from_mobile] == $mobile) {
			$bg_color = '#E6ECFF';
			if ($q[$i][from_long_code] == "system") $bg_color = 'gold';
			$style = "word-wrap:break-word; background:$bg_color;color:#333;border-radius:5px;-moz-corner-radius:5px;width:auto;border:1px solid #00a3d9;align:left;text-align:left;padding:5px;margin:0px;margin-left:-5px;font-size:11px;max-width:300px;margin-right:50px";
			$left = "block";
			$right = "none";
			$display_left='block';
			$display_right='none';
			$name = $name_m;
			$av_left = "<div><img title='$p3' src = 'images/$a_m' style='margin-right:10px;height:30px;display:block'></div>";
			$av_right = "<div><img title='$p3' src = 'images/$a_m' style='margin-right:10px;height:30px;display:none'></div>";
			$profile = $profile_m;
		} else {	
			$bg_color = '#FFFFFF';
			if ($q[$i][from_long_code] == "system") $bg_color = 'gold';
			$style = "word-wrap:break-word; background:$bg_color;color:#333;border-radius:5px;-moz-corner-radius:5px;width:auto;border:1px solid lightblue;align:right;text-align:left;padding:5px;margin:0px;margin-right:0px;font-size:11px;max-width:300px;margin-left:50px";
			$left = "none";
			$right = "block";
			$display_left='none';
			$display_right='block';
			$name = '<font style="color:#fff;text-shadow:none">'.$name_to.'</font>';
			$av_left = "<img title='$p4' src = 'images/$a_to' style='margin:-10px;margin-left:5px;width:30px;display:none'>";
			$av_right = "<img title='$p4' src = 'images/$a_to' style='margin:-10px;margin-left:5px;width:30px;display:block'>";
			$profile = $profile_to;
		}
		$str .= "<table border=0 width=100% cellspacing='0' cellpadding='0'><tr><td width=15% align=right valign=bottom>$av_left</td><td style='width:70%'><div style='$style'><font color=#f0f0f0></font> ".$q[$i][message]."</div></td><td width=15% align=left>$av_right</td></tr></table><br>";
	}
	echo $str;
?>
