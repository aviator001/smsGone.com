<?	
	include("../x_lib.php");
	include("utils.class.php");
	$a = range(chr(0),chr(1022));
	show($a);

?>
<script src='aes.js' type='text/javascript'></script>
<script>
var str = 'gautam'
var enc_msg = Aes.Ctr.encrypt(str, '1234', 256)
var msg = Aes.Ctr.decrypt(enc_msg, '1234', 256)
alert(msg)

</script>
