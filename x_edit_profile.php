<?
		include('x_lib.php');
		$email     =  $_REQUEST[email];
		$profile   =  $_REQUEST[profile];
		$name      =  $_REQUEST[name];
		$password  =  $_REQUEST[password];
		$mobile  =  $_REQUEST[mobile];
		mysql_query("UPDATE sms_subscribers set email='$email', password='$password', name='$name', profile='$profile' where mobile = '$mobile'");
		echo "UPDATE sms_subscribers set email='$email', password='$password', name='$name', profile='$profile' where mobile = '$mobile'";
?>
