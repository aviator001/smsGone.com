<?
include "x_lib.php";
$mobile = isValidMobile($_REQUEST['mobile']);
$qs = iQ("select no_sent, available_sms_count from sms_subscribers where mobile = '$mobile'");
$qr = iQ("select max(x_subscription_start) as 'x_subscription_start' from sms_sales where mobile = '$mobile'");
	$bg = "#fff";
	$ct=0;
$last_purchase = $qr[x_subscription_start];
$subscription_expires = add_date($last_purchase, 30);
$account_balance = $qs[available_sms_count];
$total = $qs[no_sent];

if (date('Y-m-d') < add_date($subscription_expires, 0)) {
		$account_status = "Expires " . switchDateforWords($subscription_expires);
		$status = "<font style='color:#00D9A3;font-size:1.2em'>Active</font>";
	} else {
		$account_status = "Expired " . switchDateforWords($subscription_expires);
		$status = "<font style='color:#00D9A3;font-size:1.2em'>Suspended</font>'";
	}
$subscription_expires = date('D jS M Y', strtotime($subscription_expires));
echo "<span id='account_status'>$status, $account_status</span><br><span style='font-size:16px'>SMS Message Balance:</b></span> <span id='account_balance'>$account_balance</span><br><span style='font-size:16px'> Subscription Expires: </span><span id='subscription_expires'>$subscription_expires</span><br><span style='font-size:16px'>Total Messages Sent: </span><span id='credits'>$total</span>";
?>
