<?
	include "x_utils.php";
	$c = new utils();
	$c->connect();
	$id=$_REQUEST[id];
	$sql="select  * from sms_photos where sessionID='$id'";
	$q=$c->query($sql);
	if (count($q)>0) {
		foreach ($q as $row) {
			$str .= $row['photo']."|";
		}
		echo $str=substr($str,0,strlen($str)-1);
	}