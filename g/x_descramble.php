<?
	session_start();
	$id=session_id();
	if (!$id) $id=$_COOKIE['PHPSESSID'];

	include("utils.class.php");
	$utils = new utils();
	$pass=date('YmdH');
	
	$bin_user_token = $_REQUEST['bin_user_token'];
	$user_token = date('HYmdHh');
	$enc_key = str_replace(' ','+',$_REQUEST['key']);
	$key = $utils->decrypt($enc_key, $pass, 256);
/*
	$str=execURL("http://edmstars.com/index.php","id=".$id);
	$arr=json_decode($str);
	$msg=$arr['msg'];
	$timeset=$arr['self'];
	$msg=$utils->decrypt($msg, $key, 256);
*/	
	$file = "../../f/".$bin_user_token;
	$msg = file_get_contents($file);
	$msg=$utils->decrypt($msg, $key, 256);
	$file = "../../f/".$bin_user_token . '_self';
	$timeSet = file_get_contents($file);
	
	if (!$timeset) $timeset='180';
	$msg = explode("@@", $msg);
	$pic = $msg[1];
	$pic = explode("|", $pic);
	$sms = $msg[0];
	$sms = explode("|", $sms);
	$cnt=0;
	$im=0;
	if (is_dir("../xsr/$bin_user_token/")) {
		for ($i=0; $i<count($sms); $i++) {
			if (getimagesize("/home/smsgone/public_html/xsr/$bin_user_token/" . $sms[$i] . '.png')) {
				$str .= "<img id='".$i."_".$sms[$i]."' src='../xsr/$bin_user_token/".$sms[$i].".png' style='width:15px;margin:0;margin-left:-3px;border-radius:2px' onload=\"setTimeout('destruct(\'".$i."_".$sms[$i]."\')',$timeSet)\">";
			}
		}
		
		if (count($pic)) {
			for ($p=0;$p<count($pic);$p++) {
				if (getimagesize("http://smsgone.com/g/attach/".$pic[$p].".jpg")) {
					$pImg="http://smsgone.com/g/attach/".$pic[$p].".jpg";
				} else {
					$pImg="http://smsgone.com/g/attach/".$pic[$p].".png";
				}
				if (getimagesize($pImg)) {
					$img .= "<img onclick='view_pic(\"$pImg\")' src='$pImg' id='".$pic[$p]."' class='www_box' onload=\"setTimeout('destruct(\'".$pic[$p]."\')',$timeSet)\" style='border:5px solid white;border-radius:4px;max-width:100px;width:100px;height:100px;margin:5px'>";
				}
			}
		}
	}
	$img=(empty($img))?"<div style='border-radius:8px;background:#333;margin-top:-10px;font-family:Poiret One;color:#f0f0f0;font-size:18px;padding:10px;'>No Photos  found.</div>" : "<div style='border-radius:8px;background:#f0f0f0;padding:10px;margin:15px;text-align:center'>" . $img . "</div>";
	$str=(empty($str))?"<div style='border-radius:8px;background:#333;margin-top:-10px;font-family:Poiret One;color:#f0f0f0;font-size:18px;padding:10px;'>No Message found.</div>" : "<div style='border-radius:8px;background:#f0f0f0;padding:10px;margin:15px;text-align:center'>" . $str . "</div>";
	$end = "<div style='border-radius:8px;background:none;padding:10px;margin-top:-5px'><input type=button style='background:url(http://smsgone.com/images/buttons/b04.png );border-radius:2px;background-size:cover;font-family:Poiret One;font-size:18px;border:none;height:35px;' value='New Message' onclick='location.href=\"http://smsgone.com\"'></div>";
	echo "$timeSet|$str$img$end";
	
	function decode($msg,$key) {
		return $msg;
	}	
	function execURL($url,$qs) {
		file_get_contents($url . '?' . $qs);
	}
?> 
 