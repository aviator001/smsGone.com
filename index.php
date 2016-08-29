<?
header("Location:http://smsgone.com/g/x_photos.php");
/*
	error_reporting(1);
	session_start(); 
	include "../inc/utils.class.php";
	$c = new utils;
	$c->connect();
	$id=$_POST['id'];
	$login=$_POST['login'];
	if (empty($id) && empty ($login)) {
		$r=array("status"=>"fail", "message"=>"must input either member id or login", "data"=>"");
	} else {
		if (empty($login)) {
			$q=$c->query("select id, mobile, login, email from dt_members where id=$id");
		} else {
			$q=$c->query("select id, mobile, login, email from dt_members where login='$login'");
		}
		if (!empty($q[0]['mobile'])) {
			$id=$q[0]['id'];
			$login=$q[0]['login'];
			$mobile=$q[0]['mobile'];
			$email=$q[0]['email'];
			$r=array("status"=>"success", "message"=>"mobile number found for user", "data"=>array("id"=>$id,"login"=>$login,"mobile"=>$mobile,"email"=>$email));
		} else {
			$r=array("status"=>"fail", "message"=>"mobile number not found for user", "data"=>"");
		}
	}
	$c->close();
	echo json_encode($r);
	*/