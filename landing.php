<?
	include "utils.class.php";
	$u = new utils();
	$is = $u->is_mobile();
	$menu = $is ? "../mobile.menu_alt.php" : "../menu_alt.php";
	$pid = $_REQUEST['type'];
	$raw_image = "http://shadowsms.com/g/uploads/$pid.photo";
	$display_photo = "<div style='font-size:16px; background: #f0f0f0; position: absolute; z-index: 1000000; right: 25px;top: 10px;  border-radius: 5px; border:0px solid white; padding: 10px; box-shadow:none; TEXT-ALIGN: CENTER;'><div id='one' style='width:200px'>ENCRYPTING AND SENDING THIS IMAGE</div><input style='margin-top:10px' type='button' id='five' onclick='show_hide(this)' class='btn btn-primary' value='Hide Photo!'> &nbsp; <input style='margin-top:10px' type='button' id='seven' onclick='attach_image()' class='btn btn-primary' value='Attach to Msg'><div id='two' style='position:absolute;z-index:10000000000;left:50px; margin-top:5px'><img src='../images/pin.png' style='width:50px'></div><div id='three' style='max-width:200px;position:absolute;top:350px'>You can send a text message to accompany this image by typing your message out. Your image is already attached and set for encrypted transport.</div><div id='four' style='margin-top:15px'>$raw_image</div></div>";
	$display_photo_mobile = "<div style='font-size:16px; background: NONE; border-radius: 5px; border:0px solid white; padding: 10px; box-shadow:none; TEXT-ALIGN: CENTER;'><div id='one' style='width:100%1'>ENCRYPTING AND SENDING THIS IMAGE</div><input style='margin-top:10px' type='button' id='five' onclick='show_hide(this)' class='btn btn-primary' value='Hide Photo!'> &nbsp; <input style='margin-top:10px' type='button' id='seven' onclick='attach_image()' class='btn btn-primary' value='Attach to Msg'><div id='two' style='position:absolute;margin-top:130px;margin-left:55px'><img src='../images/pin.png' style='width:50px'></div><div id='three' style='max-width:200px;'>You can send a text message to accompany this image by typing your message out. Your image is already attached and set for encrypted transport.</div><div id='four' style='margin-top:15px'>$raw_image</div></div>";
	$to_mobile = $_REQUEST['mobile'];
	$message = "[$pid]";
	$from_mobile = $_COOKIE['mobile'];
	if($_REQUEST['id']) $display = 'block';
		else $display = 'none';
?>
<input type="hidden" id="curr_att" value="<?=$_REQUEST['id'];?>">
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="utf-8">
        <title>Shadow | sms</title>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link rel="shortcut icon" href="../Heath/flat-ui/images/favicon.ico">
		<link rel="stylesheet" href="../Heath/flat-ui/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../Heath/flat-ui/bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="../Heath/flat-ui/css/flat-ui.css">
		<link rel="stylesheet" href="../Heath/common-files/css/icon-font.css">
		<link rel="stylesheet" href="../Heath/dom/css/style.css">
		<link rel="stylesheet" href="../Heath/dom/css/profile/style.css">
		<link rel="stylesheet" href="../Heath/dom/css/profile/ui-kit-styles.css">
		<link rel="stylesheet" href="../Heath/dom/css/content/css/ui-kit-styles.css">
		<link rel="stylesheet" href="../Heath/dom/css/content/css/style.css">
		<link rel="stylesheet" href="../Heath/dom/css/contacts/css/ui-kit-styles.css">
		<link rel="stylesheet" href="../Heath/dom/css/contacts/css/style.css">
		<link rel="stylesheet" href="../css/gs_custom_style.css">
		<link href="../css/main.css" rel="stylesheet" type="text/css" />
		<link href="../css/style_photo.css" rel="stylesheet" type="text/css" />
		<link href="../css/demos.css" rel="stylesheet" type="text/css" />
		<link href="../css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.Jcrop.min.js"></script>
		<script src="../g/aes.js"></script>
		<script src="../js/session_alt.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/startup-kit.js"></script>
<script src="json-minified.js" type="text/javascript"></script>
<script type="text/javascript">
	function dispatch(key)	{
		var url = 'http://shadowsms.com/g/x_descramble.php?bin_user_token=<?=$_GET[i];?>&key=' + key
		console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (msg.substring(0,1) == '[') {
							handle_image(msg)
						} else {
							document.getElementById('main_content').innerHTML = msg
							setTimeout('garbage()', 30000)
						}
					}
				})
			}

			
	function handle_image(obj) {
		obj = obj.substring(1, obj.length-1).trim()
		obj = '<img src="http://shadowsms.com/g/uploads/'+ obj +'.jpg">'
		document.getElementById('main_content').innerHTML = obj
	}	
			
	function garbage()	{
		var url = 'http://shadowsms.com/g/garbage.php?bin_user_token=<?=$_GET[i];?>'
		console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						document.getElementById('main_content').innerHTML = ''
						document.getElementById('main_content').innerHTML = document.getElementById('main_content').innerHTML + msg
					}
				})
			}

	function go() {
		var key = document.getElementById('key').value
		var pass
		if (!pass) pass = "<?=date('YmdH');?>"
		var enc_key = Aes.Ctr.encrypt(key, pass, 256)
		dispatch(enc_key)
	}
	
</script>
</head>
    <body style="overflow: none">
<? if (!$is) { ?>
	<!-- header-11 -->
        <header class="header-11" style="margin:-50px">
            <div class="container">
                <div class="navbar span12">
                    <div class="navbar-inner">
                        <button type="button" class="btn btn-navbar nav-pull-left"></button>
                        <a class="brand" href="#">
                            <img src="logo.png" width="50" height="50" alt="">
                            Shadow | sms
                        </a>
                        <div class="nav-collapse collapse pull-right">
                            <span id="logged_in_menu">
                                <ul class="nav">
                                    <li class="active"><a href="../index.php">HOME </a></li>
                                    <li><a href="../index.php#features">FEATURES</a></li>
                                    <li><a href="../index.php#contact">CONTACT</a></li>
                                </ul>
                            </span>
                            <form class="navbar-form pull-left">
                                <span id="loginout">
                                    <a class="btn btn-primary" href="../login.php">SIGN IN</a>
                                </span>
								<span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header><br><br>
		<hr><div class="delimiter"></div>
			<!-- projects-1 -->
    <section class="projects-1">
      <div class="container" id="sub_menu">
        <div class="title">
          <a id="sub_menu_home" href="#" class="active">My Account</a>
          <a href="../send.php">Send SMS</a>
          <a href="../history.php">Call History</a>
          <a href="../contacts.php?page=1">Contacts</a>
          <a href="images/phone.gif" target="_blank">Help</a>
		 <? if ($_COOKIE['msid']) { ?>
			<a href="#" onclick="do_logout()">Logout</a>
		  <? } else { ?>
			<a href="../login.php">Login</a>
		  <? } ?>
        </div>
     </section>
	<div class="delimiter"></div>
<? } else { ?>
	<!-- header-11 -->
        <header class="header-11" style="margin:-50px">
            <div class="container">
                <div class="navbar span12">
                    <div class="navbar-inner">
                        <button type="button" class="btn btn-navbar nav-pull-left" style="margin-top:15px; margin-right:-40px"></button>
                        <a class="brand" href="#">
                            <div style="margin-top:-20px"><span><img src="logo.png" width="50" height="50" alt=""></span><span>| SMS</span></div>
                        </a>
                        <div class="nav-collapse collapse pull-right">
                            <span id="logged_in_menu">
                                <ul class="nav">
                                    <li class="active"><a href="../index.php"> HwOME </a></li>
                                    <li><a href="../index.php#features">FEATURES</a></li>
                                    <li><a href="../members.php">MY ACCOUNT</a></li>
                                    <li><a href="../sms.php">SEND SMS</a></li>
                                    <li><a href="../history.php">CALL HISTORY</a></li>
                                    <li><a href="../contacts.php">CONTACTS</a></li>
                                    <li><a href="../billing.php">BILLING</a></li>
                                    <li><a href="../support">HELP</a></li>
									<? if ($_COOKIE['msid']) { ?>
									<li><a href="#" onclick="do_logout()">Logout</a></li>
									<? } else { ?>
									<li><a href="../login.php">Login</a></li>
									<? } ?>
								</ul>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
		</header>
	<div class="delimiter"></div>
<? } ?>
		<div style="margin:auto;display:none;position:absolute;z-index:99999999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity: 0.8; background: #000" id="tint"></div>
		<div style="margin:auto;display:none;position:absolute;z-index:99999999;left:45%" id="gears"><img src="http://shadowsms.com/images/loader_b.gif"></div>
		<div onclick="dismiss(this)" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://shadowsms.com/images/av/alert_05.png') no-repeat center; width: 320px; height:100px;font-size:11pz; color: white" id="toast"></div>
        <div id="legal" style="width:100%; height:100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background: #000; opacity: 0.8; z-index:10000; display: none" onclick="this.style.display='none'; document.all.privacy.style.display='none'; document.all.terms.style.display='none'"></div>
        <div id="terms" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
        <div id="privacy" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
		<?php include '../x_lib.php'; ?>
		<div class="delimiter"></div>	
		<section class="contacts-3">
			<div class="container">
				<div class="row">
					<div class="span6" id="main_content" style="margin-top:-5px">
						<h6><span class="fui-cmd"></span><span style="color:grey; margin-left: 15px;font-size:24px">Encrypted Messaging</span></h6>
						<br><h6><span class="fui-lock"></span><span style="text-align:left; color:skyblue; margin-left: 15px">Enter Password</span></h6>
						<div>
							<input id="key" style="text-align:left; width: 100%; border: 2px solid #28abc1; background: rgb(255, 255, 255); height: 50px; border-radius: 5px" name="key" id="key" placeholder="Secret Crypto Phrase or Password">
						</div> 
						<br>
						<input type="button" value=" DECRYPT " onclick="go()" class="btn btn-primary"></div>
					</div>	
				</div>
			</div>
		</section>
		<? include "footer.php" ?>
	</body>
</html>