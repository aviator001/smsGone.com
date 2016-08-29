<script>
	location.href='../g/p_index.php?i=<?=$_SERVER["QUERY_STRING"];?>'
</script>
<?
error_reporting(E_NONE);
require "../inc/utils.class.php";
$c=new utils;
$c->connect();

	$qs=$_SERVER["QUERY_STRING"];
	try {
		if (getimagesize($qs . '.png')) echo ("<img class=\"hide\" src='$qs.png'>");
			else  echo ("<img class=\"hide www_box\" src='$qs.jpg'>");
	} catch (Exception $e){$e->getMessage();}
	
		$connection = ssh2_connect('199.91.65.94', 22);
		ssh2_auth_password($connection, 'root', 'shadow2015!');
		$stream = ssh2_exec($connection, "del $filename /home/smsgone/public_html/i");
		$stream = ssh2_exec($connection, "cp $filename_thumb /home/smsgone/public_html/i/thumbs");
	
?>
<br><br><br><br><br>
</body>
</html>