<?
$dbhandle=mysql_connect("199.91.65.85","gautamadmin","Shadow2015!") or die("Unable to connect");
$select=mysql_select_db("finggr",$dbhandle) or die("Unable to connect to db");
function query($objSQL)
{
	if (!($objQUERY = mysql_query($objSQL))) return null;
	while ($row = mysql_fetch_assoc($objQUERY)) $result[] = $row;
	return $result;	
}
$s=$_REQUEST['phpsessid'];	
echo mysql_query("delete from sms_photos where sessionID='$s'");
?>
