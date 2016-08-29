<?
error_reporting(E_ALL);
ini_set('display_errors', '1');
	include("utils.class.php");
	$utils = new utils();
	$utils->connect();
	$pass=date('YmdH');
	ini_set('error_reporting','1');
	ini_set('show_errors','1');
	$file = $_GET['file'];

	$c1="rm -rf /home/gaysugar/public_html/i/$file/";
	
	$connection = ssh2_connect('199.91.65.94', 22);
	ssh2_auth_password($connection, 'root', 'shadow2015!');
	ssh2_exec($connection, $c1);
	
?>