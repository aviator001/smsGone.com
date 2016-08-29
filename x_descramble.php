<?
	include("../x_lib.php");
	include("utils.class.php");
	$utils = new utils();
	$pass=date('YmdH');
	
	$bin_user_token = $_REQUEST['bin_user_token'];
	$user_token = date('HYmdHh');
	$enc_key = str_replace(' ','+',$_REQUEST['key']);
	$key = $utils->decrypt($enc_key, $pass, 256);
	
	$file = "../../fn/".$bin_user_token.'_b';
	$fn = file_get_contents($file);
	
	$fn = substr($fn,0,strlen($fn)-1);
	$fn = explode(" ", $fn);
	
	$img = "../../fn/".$bin_user_token.'_a';


	$file = "../../f/".$bin_user_token;
	$msg = file_get_contents($file);
	
	$msg = $utils->decrypt($msg, $key, 256);
	
	$msg = explode("@@", $msg);
	$pic = $msg[1];
	$pic = explode("|", $pic);
	for ($p=0;$p<count($pic);$p++) {
		$img .= "<img src='uploads/".$pic[$p].".jpg' style='width:75%; border-radius:500px;border:30px solid white'>";
	}
	$sms = $msg[0];
	$sms = explode("|", $sms);
	
	if (is_dir("../xsr/$user_token/")) {
		for ($i=0; $i<count($sms); $i++) {
			$str .= "<img src='../xsr/$user_token/".$sms[$i].".png' width=35px>";
		}
	} else {
		$str = "<font color=white>No Such Message";
	}
	echo $str.'<br><br>'.$img;
?> 
 