<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
	include("utils.class.php");
	$utils = new utils();
	$utils->connect();
	$pass=date('YmdH');
	ini_set('error_reporting','1');
	ini_set('show_errors','1');
	$bin_user_token = $_GET['bin_user_token'];

	$arr[0]="rm -rf /home/smsgone/public_html/xsr/$bin_user_token";
	$arr[1]="rm -rf /home/smsgone/f/$bin_user_token";
	$arr[2]="rm -rf /home/smsgone/fn/$bin_user_token" . "_a";
	$arr[3]="rm -rf /home/smsgone/fn/$bin_user_token" . "_b";
	
	$connection = ssh2_connect('199.91.65.94', 22);
	ssh2_auth_password($connection, 'root', 'shadow2015!');
	
	for ($g=0;$g<=count($arr);$g++) {
		$stream = ssh2_exec($connection, $arr[$g]);
		stream_set_blocking($stream, true); 
		echo stream_get_contents($stream); 
	}
?>