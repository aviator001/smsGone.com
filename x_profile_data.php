<?
	include('x_lib.php');
	$mobile = $_REQUEST["mobile"];
	$Q = query("select * from sms_subscribers where mobile = '".$mobile."'");
	if ($Q) {
		$email     =  $Q[0][email];
		$profile   =  $Q[0][profile];
		$name      =  $Q[0][name];
		$password  =  $Q[0][password];
		
		echo $user_data =  $name . '|' . $email . '|'. $password . '|' . $profile ; 
	}
?>
