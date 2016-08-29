<?
	session_start();
	include "../class/sms.class.php";
	$u = new sms();
	$u->show_errors();
	$u->connect();
	echo $u->getNewNumber($_REQUEST['m']);