<?
	include "utils.class.php";
	$u = new utils();
	$is = $u->is_mobile();
	$menu = $is ? "../mobile.menu.php" : "../menu.php";
	$pid = $_REQUEST['type'];
	$raw_image = trim(file_get_contents("http://shadowsms.com/$pid.photo"));
	$display_photo = "<div style='font-size:16px; background: NONE; position: absolute; z-index: 1000000; right: 25px;top: 10px;  border-radius: 5px; border:0px solid white; padding: 10px; box-shadow:none; TEXT-ALIGN: CENTER;'><div id='one' style='width:200px'>ENCRYPTING AND SENDING THIS IMAGE</div><input style='margin-top:10px' type='button' id='five' onclick='show_hide(this)' class='btn btn-primary' value='Hide Photo!'> &nbsp; <input style='margin-top:10px' type='button' id='seven' onclick='attach_image()' class='btn btn-primary' value='Attach to Msg'><div id='two' style='position:absolute;z-index:10000000000;left:50px; margin-top:5px'><img src='../images/pin.png' style='width:50px'></div><div id='three' style='max-width:200px;position:absolute;top:350px'>You can send a text message to accompany this image by typing your message out. Your image is already attached and set for encrypted transport.</div><div id='four' style='margin-top:15px'>$raw_image</div></div>";
	$display_photo_mobile = "<div style='font-size:16px; background: NONE; border-radius: 5px; border:0px solid white; padding: 10px; box-shadow:none; TEXT-ALIGN: CENTER;'><div id='one' style='width:100%1'>ENCRYPTING AND SENDING THIS IMAGE</div><input style='margin-top:10px' type='button' id='five' onclick='show_hide(this)' class='btn btn-primary' value='Hide Photo!'> &nbsp; <input style='margin-top:10px' type='button' id='seven' onclick='attach_image()' class='btn btn-primary' value='Attach to Msg'><div id='two' style='position:absolute;margin-top:130px;margin-left:55px'><img src='../images/pin.png' style='width:50px'></div><div id='three' style='max-width:200px;'>You can send a text message to accompany this image by typing your message out. Your image is already attached and set for encrypted transport.</div><div id='four' style='margin-top:15px'>$raw_image</div></div>";
	$to_mobile = $_REQUEST['mobile'];
	$message = "[$pid]";
	$from_mobile = $_COOKIE['mobile'];
?>
<script>
	var usr_input = ''
	var v = ''
	var objUser = ''
	var objPhrase
	var pass 
	var aes_user_token
	var str
	var image_job = '<?=$message?>'
	setTimeout('x_init()', 500)
	var swt = true
	
	function show_hide() {
	if (document.getElementById('five').innerHTML == 'Hide Photo') {
			document.getElementById('two').style.display = 'none'
			document.getElementById('two').style.display = 'none'
			document.getElementById('three').style.display = 'none'
			document.getElementById('four').style.display = 'none'
			document.getElementById('five').innerHTML = 'Show Photo'
	} else {
			document.getElementById('one').style.display = ''
			document.getElementById('two').style.display = ''
			document.getElementById('three').style.display = ''
			document.getElementById('four').style.display = ''
			document.getElementById('five').innerHTML = 'Hide Photo'
		}
	}
	
	function x_init() {
		var url = 'http://shadowsms.com/g/x_init.php'
		var request = $.ajax({
		   type: 'GET',
			url: url,
		    success: function(msg) {
				var php = msg.split('|')
				pass = php[0].trim()
				aes_user_token = php[1].trim()
				str = php[2]
				document.getElementById('beta').innerHTML = str
		    }
		})
	}
		
	function dispatch(enc_msg, enc_key, enc_cell)	{
		var url = 'http://shadowsms.com/g/x_scramble.php?enc_msg=' + enc_msg + '&enc_key=' + enc_key + '&enc_cell=' + enc_cell + '&token=' + aes_user_token
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						document.getElementById('tint').style.display='none'
						document.getElementById('gears').style.display='none'
						alert('Message has been sent!')
					}
				})
			}

	function go() {
		var key = document.getElementById('key').value
		var cell = document.getElementById('cell').value
		var msg = objUser.substring(0, objUser.length-1)
		
		if (!key) {
			document.getElementById('key').style.background = 'gold'
			document.getElementById('key').style.border = '2px solid red'
			alert('Must Set Secret Phrase')
			return false
		}
		if (!cell) {
			document.getElementById('cell').style.background = 'gold'
			document.getElementById('cell').style.border = '2px solid red'
			alert('I need to know who you want to send this to bro!')
			return false
		}
		var enc_key = Aes.Ctr.encrypt(key, pass, 256)
		var enc_msg = Aes.Ctr.encrypt(msg, pass, 256)
		var enc_cell = Aes.Ctr.encrypt(cell, pass, 256)
		document.getElementById('tint').style.display='block'
		document.getElementById('gears').style.display='block'
		console.log(Aes.Ctr.decrypt(enc_msg, pass, 256))
		console.log(msg)
		
		dispatch(enc_msg, enc_key, enc_cell)
	}
	
	function swap_me(fn, fn_o) {
		fn.src = fn_o
	}
	
	function swap_me_back(fn, fn_b) {
		fn.src = fn_b
	}
	
	
	function print_me(fn, fn_b) {
		v = v + "<img style='width:40px' src='" + fn_b + "'>"
		document.getElementById('alpha').innerHTML = v
		objUser = objUser + fn.id + '|'
	}

	function attach_image(obj) {
		msg = objUser.substring(0, objUser.length-1) + '@@' + image_job
		document.getElementById('alpha').innerHTML = msg
	}
	
	function delete_me(fn) {
		var w = document.getElementById('alpha').innerHTML
		var objI = w.substring(0, w.length-76)
		objUser = objUser.substring(0, objUser.length-21)
		document.getElementById('alpha').innerHTML = objI
		v = objI
	}			
</script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Shadow | sms</title>
        <!-- header include -->
		<link rel="shortcut icon" href="../Heath/flat-ui/images/favicon.ico">
		<link rel="stylesheet" href="../Heath/flat-ui/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../Heath/flat-ui/bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="../Heath/flat-ui/css/flat-ui.css">
		<link rel="stylesheet" href="../Heath/common-files/css/icon-font.css">
		<link rel="stylesheet" href="../Heath/dom/css/style.css">
		<link rel="stylesheet" href="../Heath/dom/css/profile/style.css">
		<link rel="stylesheet" href="../Heath/dom/css/profile/ui-kit-styles.css">
		<link rel="stylesheet" href="../Heath/dom/css/content/css/ui-kit-styles.css">
		<link rel="stylesheet" href="../Heath/dom/css/contacts/css/ui-kit-styles.css">

		
		<link rel="stylesheet" href="../css/gs_custom_style.css">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <script src="../js/jquery-1.10.2.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/startup-kit.js"></script>
		<script src="../js/plupload.full.min.js"></script>
		<script src="../g/aes.js"></script>
		<script src="../js/script_encrypted.js"></script>
		<script src="../js/session.js"></script>		
		
	</head>
    <body style="overflow: none">
		<? if (!$is) echo $display_photo; ?>
		<div style="margin:auto;display:none;position:absolute;z-index:99999999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity: 0.8; background: #000" id="tint"></div>
		<div style="margin:auto;display:none;position:absolute;z-index:99999999;left:45%" id="gears"><img src="http://shadowsms.com/images/loader_b.gif"></div>
		<div onclick="dismiss(this)" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://shadowsms.com/images/av/alert_05.png') no-repeat center; width: 320px; height:100px;font-size:11pz; color: white" id="toast"></div>
        <div id="legal" style="width:100%; height:100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background: #000; opacity: 0.8; z-index:10000; display: none" onclick="this.style.display='none'; document.all.privacy.style.display='none'; document.all.terms.style.display='none'"></div>
        <div id="terms" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
        <div id="privacy" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
        <!-- menu include -->
<? include $menu; ?>
<div class="delimiter"></div>	
	<div onclick="dismiss()" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://shadowsms.com/images/av/alert_05.png') no-repeat center; width: 320px; height:100px;font-size:11pz; color: white" id="toast"></div>
    <section class="contacts-3">
      <div class="container">
        <div class="row">
          <div class="span6 offset1">
            <h6>Send Anon/Encrypted SMS</h3>
            <p><b><font color=black>MODE</font></b> Encrypting and sending a Photo Anonymously</p>
              <label class="h6" style="display:none">Your Number</label>
              <input id="from_mobile" type="text" value="<?=$mobile;?>" style="display:none">
			
              <label class="h6">Their Number</label>
              <input style="width: 100%; border: 2px solid #28abc1; background: rgb(255, 255, 255); height: 50px; border-radius: 5px" name="cell" id="cell" placeholder="Recipients Mobile Number" onfocus="clear_error(this)">
				<br><br><label class="h6">Your Message</label> 
              <div id="alpha" style="border-radius:5px; min-height:120px; border:2px solid #28abc1; padding: 10px" contentEditable='true' placeholder="The characters will appear here as you type or click...">The characters will appear here as you type or click. You are restricted to 500 characters.</div>
              <br><label class="h6">Keylogger/Fool Proof No-Hack Hieroglyphic Keypad</label>
              <div id="beta"><?=$str?></div>
			  <br>
              <label class="h6">Set Password or Cryptic Phrase <font color=silver>[See Help for details]</font></label>
			<input style="width: 100%; border: 2px solid #28abc1; background: rgb(255, 255, 255); height: 50px; border-radius: 5px" name="key" id="key" placeholder="Secret Crypto Phrase or Password">              
			<br><br><button onclick="go()" class="btn btn-primary"><span class="fui-chat"></span>Send Message</button><br><br>
			  <? if ($is) echo $display_photo_mobile; ?>
          </div>
        </div>
      </div>
      <!--/.container-->
	  
	  
	  
    </section>
    <!-- footer-2 -->
        <footer class="footer-2 bg-midnight-blue">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Features</a>
                        </li>
                        <li>
                            <a href="#">Pricing</a>
                        </li>
                        
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="social-btns pull-right">
                    <a href="#"><div class="fui-vimeo"></div><div class="fui-vimeo"></div></a>
                    <a href="#"><div class="fui-facebook"></div><div class="fui-facebook"></div></a>
                    <a href="#"><div class="fui-twitter"></div><div class="fui-twitter"></div></a>
                </div>
                <div class="additional-links">
                    Be sure to take a look to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                </div>
            </div>
        </footer>

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../js/jquery-1.10.2.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/startup-kit.js"></script>
        <script src="../js/script.js"></script>
    </body>
</html>