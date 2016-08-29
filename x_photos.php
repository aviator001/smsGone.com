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
        <!-- header include -->
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
		<script src="../js/script_encrypted.js"></script>
		<script src="../js/session_alt.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/startup-kit.js"></script>
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
                            <img src="http://shadowsms.com/images/logo@2x.png" width="50" height="50" alt="">
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
                            <div style="margin-top:-20px"><span><img src="images/img/logo@2x.png" width="50" height="50" alt=""></span><span>| SMS</span></div>
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
		<?
			$mobile = $_COOKIE[mobile];
			$rpx = (int)$_REQUEST['r']*1.5 . "px";
			$q = query("select * from sms_photos where mobile='$mobile'");
			if (count($q)>0) {
				$width = 100/count($q);
				$str='<div class="row features">';
				for ($i = 0; $i<count($q); $i++) {
					$del_photo = 'del_photo('.$q[$i][id].')';
					$send_photo = 'att_photo('.$i.',"'.$q[$i][photo].'")';
					$str .= "<div class='span' style='padding:20px;border-radius:8px; background: #f0f0f0; text-align:center'>";
					$str .= "<img src='uploads/".$q[$i][photo].".jpg' style='border-radius:800px; top:-10px; border:10px solid #fff; box-shadow: 2px 5px 15px rgba(0,0,0,1)'><hr><span class='btn btn-danger' style='width:75px' onclick='$del_photo'>Delete</span> <span class='btn btn-danger' style='width:75px' onclick='$send_photo'>Attach</span></div>";
				}
				$str .= '</div>';
			} else {
				$str = '<b>No Photos Uploaded!</b>';
			}
			$str .='</div>';
		?>
		<div class="delimiter"></div>	
		<section class="contacts-3">
			<div class="container">
				<div class="row">
					<div class="span6">
						<h6><span class="fui-cmd"></span><span style="color:grey; margin-left: 15px">Encrypted Messaging</span></h6><br>
						<label class="h6" style="display:none">Your Number</label>
						<input id="from_mobile" type="text" value="<?=$mobile;?>" style="display:none">
						<h6><span class="fui-user"></span><span style="color:skyblue; margin-left: 15px">Their Number</span></h6>
						<input style="text-align:left; width: 100%; border: 2px solid #28abc1; background: rgb(255, 255, 255); height: 50px; border-radius: 5px" name="cell" id="cell" placeholder="Recipients Mobile Number">
						<br><br>
						<h6><span class="fui-lock"></span><span style="text-align:left; color:skyblue; margin-left: 15px">Set a Password</span></h6>
						<div>
							<input style="text-align:left; width: 100%; border: 2px solid #28abc1; background: rgb(255, 255, 255); height: 50px; border-radius: 5px" name="key" id="key" placeholder="Secret Crypto Phrase or Password">
						</div> 
						<br><br>
						<h6><span class="fui-chat"></span><span style="color:skyblue; margin-left: 15px">Set a Password</span></h6>
						<div id="alpha" style="border-radius:5px; min-height:120px; border:2px solid #28abc1; padding: 10px" contentEditable='true' placeholder="The characters will appear here as you type or click...">The characters will appear here as you type or click. You are restricted to 500 characters.</div>
						<div id="alpha2" style="border:0px solid #28abc1; padding: 5px;margin-top:20px"> </div>
						<br>
						<div id="mes"></div>
						<div id="beta" style="display:none"></div>
						<div id="b_bar"><span><button onclick="go()" class="btn btn-primary"><span class="fui-chat"></span>Send Message</button></span>&nbsp;&nbsp;<span><button onclick="show_attach()" class="btn btn-info"><span class="fui-new"></span>Attach Photo from My Album</button></span>
								<span id="total_count" style="margin-left:5px; border:1px solid silver; background: #f0f0f0; padding:10px; border-radius:6px">1</span> : CREDITS USED
						</div><br><br>
					</div>
				</div>
		  </div>
		</section>
		<section class="content-5" id="attach" style="margin-top:-175px; display:<?=$display?>">
			<div class="container" style="">
				<div class="row plans" id="content"  align=left style="text-align:center;width:auto; border-radius:8px">
					<div style="width: 100%; border-bottom:0px solid #f0f0f0">
						<div style="height:auto;padding:25px; background: none; margin-left:0px">
							<?=$str?>
						</div>
					</div>
				<br>
				<div class="bbody" style="width:auto; text-align:left;background:#fcfcfc; padding-left:0px; box-shadow:0px 0px 20px rgba(0,0,0,0.3); border-radius:8px">
					<div class="row" id="div_welcome" align=left>
					  <div class="row features" align=left style="padding-left:75px;padding-top:20px;text-align:left;border:3px solid #;border-radius:8px; width:auto">
							<form id="upload_form" multiple=true enctype="multipart/form-data" method="post" action="x_upload.php" onsubmit="return checkForm()">
								<input type="hidden" id="x1" name="x1" />
								<input type="hidden" id="y1" name="y1" />
								<input type="hidden" id="x2" name="x2" />
								<input type="hidden" id="y2" name="y2" />
								<h6 style='font-size:15px; color:black'><b>Step1</b>: <font color=grey>Please select image file</font></h6>
								<div><input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" /></div>
								<div class="error"></div>
								<div class="step2" style="width:100%">
									<h6 style='font-size:15px; color:black'>Step1: <font color=grey>Please select a region to crop</font></h6>
									<img id="preview" style="visibility:visible"/>
									<div class="info">
										<span>Img W</span> 	<span style="height:50px"><input style="height:50px; background: #f0f0f0" type="text" id="ow" name="ow" /></span>
										<span>Img H</span> 	<span style="height:50px"><input style="height:50px; background: #f0f0f0" type="text" id="oh" name="oh" /></span>
									</div>
									<div class="info">
										<span>New W</span> 	<span style="height:50px"><input style="height:50px" type="text" id="w" name="w" /></span>
										<span>New H</span> 	<span style="height:50px"><input style="height:50px" type="text" id="h" name="h" /></span>
									</div>
									<button type="submit" class="btn btn-primary"> Upload Photo to My Album! </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
		<? include "footer.php" ?>
	</body>
</html>     