<?
	include "x_lib.php";
	$mobile = $_REQUEST['mobile'];
	$q = query("select id, from_mobile, from_long_code, message from sms_history where to_mobile = '".$mobile."' and message !='' and is_read=0 and is_deleted=0 limit 1");
	$x2 = format_sms($q[0][from_long_code]);
	$message = $q[0][message];
	$id = $q[0][id];
	if ($q[0][id]) {
	mysql_query("update sms_history set is_deleted=9 where id = $id");
	echo "<div style='padding-left:20px;padding-right:15px;max-width:300px;margin-top:10px'><a href='#' onclick='openRequestedPopup(".$q[0][from_long_code].")'><div><font style='font-size:14px;color: orange'>New Message from <font style='font-size:14px;color:red'>$x2</font></font></div><div><font style='font-size:12px;color: white'>" . substr($message, 0, 75). " ... </font></div><div style='margin-top:10px'><font style='font-size:10px;color: silver; cursor:hand; cursor: pointer'>View | Send SMS Message</div></a></div>";
}
?>	
