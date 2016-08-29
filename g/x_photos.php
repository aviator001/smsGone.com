<?
	session_start();
	include "utils.class.php";
	$u = new utils();
	$is = $u->is_mobile();
	$mobile=$_REQUEST[x_mobile];
	$b='b' . rand(1,155) . '.jpg';
	$b='b112.jpg';
	$b1='b112.jpg';

?>
<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="utf-8">
        <title>smsgone.com - The Safest way to communicate on planet Earth.</title>
        <!-- header include -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
		<link href='https://fonts.googleapis.com/css?family=Raleway|Poiret+One|Open+Sans+Condensed:300|Kristi|Waiting+for+the+Sunrise' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="../Heath/flat-ui/images/favicon.ico">
		<link rel="stylesheet" href="../Heath/flat-ui/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../Heath/flat-ui/bootstrap/css/bootstrap-responsive.css">
		<link href="../css/style_photo.css" rel="stylesheet" type="text/css" />
		<link href="dropzone/dropzone.min.css" rel="stylesheet" type="text/css" />
		<link href="dropzone/basic.min.css" rel="stylesheet" type="text/css" />
		<style>
			.eInput {
				text-align:left; font-size:24px;font-family:Open Sans Condensed;width: 550px; background: rgb(255, 255, 255); height:15px; border:none; border-radius:5px;padding:10px
			}
			.eLabel {
				text-shadow:0 0 1px #fff;color:#000;font-family:Open Sans Condensed;font-size:16px; margin-left: 15px; font-family:Open Sans Condensed;font-size:24px; margin-left: 15px;
			}
			.eInput2 {
				text-align:left; font-size:24px;font-family:Open Sans Condensed;max-width: 320px;width: 320px; background: rgb(255, 255, 255); height:15px; border:none; border-radius:5px;padding:10px
			}
			.eLabel2 {
				font-family:Open Sans Condensed;font-size:18px;color:#333; margin-left: 15px; font-family:Open Sans Condensed;font-size:18px; margin-left: 15px;
			}
		</style>
		<link href="../css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery.min.js"></script>
		<script src="dropzone/dropzone.min.js"></script>
		<script src="../js/jquery.Jcrop.min.js"></script>
		<script src="../g/aes.js"></script>
		<script src="../js/scriptencrypted.js?user_id=<?=rand(11111111,99999999);?>"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/fastclick.js"></script>

<script type="text/javascript">
	function delCookie(cname) {
		var d = new Date();
		d.setTime(d.getTime());
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + "" + "; " + expires;
	 }

	function setCookie(cname,cvalue,exdays)	{
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	 }

	function getCookie(cname)	{
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}
	<? if (!$is) { ?>

	function dz() {
		if (document.getElementById('alpha_pic').src=='http://smsgone.com/g/back2.png') {
			document.getElementById('alpha_photo').style.display='none'
			document.getElementById('alpha_label').innerHTML='UPLOAD PHOTO'
			document.getElementById('alpha_pic').src='cam.png'
		} else {
			document.getElementById('alpha_photo').style.display='block'
			document.getElementById('alpha_label').innerHTML='BACK TO MESSAGE'
			document.getElementById('alpha_pic').src='back2.png'
		}
	}
	<? } else { ?>
	
	function dz() {
		if (document.getElementById('alpha_pic').src=='http://smsgone.com/g/back2.png') {
			document.getElementById('alpha_photo').style.display='none'
			document.getElementById('alpha_photo').innerHTML='<div class="dz-default dz-message"><span>CLICK Here to upload</span></div>'
			document.getElementById('alpha_label').innerHTML='UPLOAD PHOTO'
			document.getElementById('alpha_pic').src='cam.png'
			document.getElementById('alpha').style.display='block'
			document.getElementById('alpha').innerHTML='<div class="dz-default dz-message"><span>CLICK Here to upload</span></div>'

		} else {
			document.getElementById('alpha_photo').style.display='block'
			document.getElementById('alpha_label').innerHTML='BACK TO MESSAGE'
			document.getElementById('alpha_pic').src='back2.png'
			document.getElementById('alpha').style.display='none'

			document.getElementById('alpha_pic').style.width='50px'
			document.getElementById('alpha_pic').style.border='none'
			document.getElementById('alpha_photo').style.maxWidth='300px'
			document.getElementById('alpha_photo').style.border='1px solid silver'
			
		}
	}
	<? } ?>	
	Dropzone.options.alphaPhoto = {
		maxFilesize: 5000,
		init: function() {
			this.on("addedfile", function(file) { 
				setCookie('files_added', getCookie('files_added')*1+1)
				document.getElementById('added').innerHTML=getCookie('files_added')
				document.getElementById('added_label').innerHTML='Photos Added:'
			});
			this.on("uploadprogress", function(file, progress) {
				document.getElementById('progress').textContent=Math.round(progress,0) + '%'
				console.log("File progress", progress);
				if (progress==100) {
					document.getElementById('progress').textContent='Done!'	
				}
			});
		}		
	}

</script>	
    <body style="overflow:none;">

		<div style="margin:auto;display:;position:absolute;z-index:99999999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity: 0.6; background: #000" id="tint"></div>
		<img style="margin:auto;display:;position:absolute;z-index:9999999999;left:0;right:0;top:0;bottom:0" id="gears" src="http://smsgone.com/images/bar.gif">
		<div onclick="dismiss(this)" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://smsgone.com/images/av/alert_05.png') no-repeat center; width: 300px; height:100px;font-size:11pz; color: white" id="toast"></div>
        <div id="legal" style="width:100%; height:100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background: #000; opacity: 0.8; z-index:10000; display: none" onclick="this.style.display='none'; document.all.privacy.style.display='none'; document.all.terms.style.display='none'"></div>
        <div id="terms" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
        <div id="privacy" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
	<? if ($is) { ?>
		<link href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" rel="stylesheet" type="text/css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>	</head>
		<section align=center style="">
			<div class="container" align=center style="max-width:300px;width:100%;margin:auto;left:0;right:0;position:absolute;background:#f0f0f0;padding:10px">
				<div class="row" align=left>
						<table>
						<tr>
						<td>
						<img src="logo.png" style="margin-top:0px;margin-bottom:20px;width:75px">
						</td>
						<td>
							<table>
							<tr>
							<td align=left>
								<span style="color:orange; font-family:Open Sans Condensed;font-size:24px;color:#000;margin-left: 15px;text-shadow: 1px 1px 1px #fff;">
									Encrypted Messaging
								</span>
							</td>
							</tr>
							<tr>							
								<td align=left>
									<span style="margin-left:15px;font-family:Kristi;font-size:20px">
										Guaranteed unbreakable by $1000
									</span>
								</td>
								</tr>
							</table>
						</td>
						</tr>
						</table>
						<label for="cell" style="color:#000; text-shadow:0 0 1px #fff; font-family:Open Sans Condensed;font-size:18px">Their Number</label>
						<input style="text-align:left; font-size:18px;font-family:Open Sans Condensed;width:100%; background: rgb(255, 255, 255); height: 40px; border-radius: 1px" name="cell" id="cell" placeholder="Recipients Mobile Number" value="<?=$x_mobile;?>">
						<label for="key" style="color:orange;color:#000; text-shadow:0 0 1px #fff;  font-family:Open Sans Condensed;font-size:18px">Set a Password</label>
						<input style="border-radius:0;font-family:Open Sans Condensed;font-size:18px;text-align:left; width: 100%; height: 40px; border-radius:1px solid silver; background: rgb(255, 255, 255); height: 40px; border-radius: 0px" name="key" id="key" placeholder="Secret Phrase or Password">
						<div style="margin:10px;margin-left:-10px">
							<span class="eLabel2">
								Your Message
							</span>
							<span class="eLabel2" style="position:absolute;left:90px">
								<span>Progress:</span>
								<span class="eLabel2"  id="progress"></span>
							</span>
							<span id='added_label' class="eLabel2"  style="position:absolute;left:185px">
								Photos Added
							</span>
							<span id="added" class="eLabel2" style="position:absolute;left:200px">
							</span>
						</div>
						<div id="alpha" class="eInput2" style="border:1px solid silver;position:absolute;overflow-y:auto;height:100px;min-height:100px;max-height:100px;padding-top:10px;width:300px;max-width:280px" contentEditable></div>
						<form id="alpha_photo" action="upload_mail.php" class="dropzone" style="border-radius:5px;display:none;position:absolute;height:100px;min-height:100px;max-height:100px;padding-top:10px;width:310px;max-width:310px;border:none;opacity:1;max-height:120px;height:120px;overflow-y:scroll"></form>
						<div id="alpha2" class="eInput2" style="padding: 5px;margin-top:20px;width:280px"> </div>
						<div id="mes"></div>
						<div id="beta" style="display:none"></div>
						<table border=0 width=100% align=center style="margin-top:100px;font-family:Open Sans Condensed">
							<tr>
								<td align=left valign=center>
									<div style="margin-bottom:5px;border:none;font-size:18px">Message Self destructs in</div>
								</td>
								<td align=left valign=center style="border:none">
									<span contentEditable style="margin-left:5px;padding-left:15px;padding-right:15px;border:1px solid skyblue;border-radius:2px;width:30px;font-weight:bold;font-family:Open Sans Condensed;font-size:22px;background:#fff" type="text" id="selfDestruct">30</span>
									<span style="margin-left:5px;font-size:18px"> Seconds </span>
								</td>
							</tr>
							<tr>
								<td align=center>
									<input type="image" style="border:none;opacity:0.7;width:75px" src="send.png" onclick="go()">
								</td>
								<td align=center>
									<input id="alpha_pic" type="image" style="border:none;opacity:0.7;width:75px" src="cam.png" onclick="dz()">
								</td>
							</tr>
							<tr>
								<td WIDTH=50% align=center>
									<span class="eLabel" style="font-size:20px">
										SEND MESSAGE
									</span>
								</td>
								<td width=50% align=center>
									<span id="alpha_label" class="eLabel" style="font-size:20px">
										UPLOAD PHOTO
									</span>
								</td>
							</tr>

						</table>
						</div><br>
					</div>
		  </div>
		</section>		
		
		<? } else { ?>
		<section style="position:absolute;margin:auto;left:0;right:0;top:0;bottom:0;width:100%;height:100%;background:url(../images/backgrounds/<?=$b;?>) center no-repeat;background-size:cover">
			<div class="container" align=center style="margin:auto;background:#f0f0f0;left:0;right:0;top:100px;bottom:0;position:absolute;max-width:600px;padding-left:30px;height:700px;box-shadow:0 0 40px #000;border-radius:5px;opacity:1">
				<div class="row" align=left>
					<div class="span6" style="">
						<table>
						<tr>
						<td>
							<br><img src="logo.png" style="margin-top:0px;margin-bottom:20px;width:75px">
						</td>
						<td>
							<table>
							<tr>
							<td align=left>
								<span style="color:orange; font-family:Open Sans Condensed;font-size:40px;color:#000;margin-left: 15px;text-shadow: 1px 1px 1px #fff;">Encrypted Messaging</span>
							</td>
							</tr>
							<tr>							
								<td align=left>
									<span style="margin-left:15px;font-family:Kristi;font-size:32px;color:red">Guaranteed unbreakable by $1000</span>
								</td>
								</tr>
							</table>
						</td>
						</tr>
						</table>
						<div style="margin:10px;margin-left:-10px">
							<span class="eLabel">
								Cell No of the person you want to message:
							</span>
						</div>
						<div>
							<input class="eInput" name="cell" id="cell" placeholder="Recipients Mobile Number">
						</div>
						<br>
						<div style="margin:10px;margin-left:-10px;margin-top:-5px">
							<span class="eLabel" style="text-shadow:1px 1px 1px #fff;color:#000">
								Set a Password:
							</span>
						</div>
						<div>
							<input class="eInput" name="key" id="key" placeholder="A pass-phrase known to both sender & receiver">
						</div> 
						<br>
						<div style="margin:10px;margin-left:-10px;margin-top:-5px">
							<span class="eLabel">
								Your Message:
							</span>
							<span class="eLabel" style="position:absolute;left:175px">
								<span>Upload Progress:</span>
								<span class="eLabel"  id="progress">000000</span>
							</span>
							<span class="eLabel"  id="added_label" style="position:absolute;right:75px">
								Photos Added:
							</span>
							<span id="added" class="eLabel"  style="position:absolute;right:50px">0
							</span>
						</div>
						<div id="alpha" class="eInput" style="position:absolute;height:auto;min-height:75px;padding-top:10px;width:550px;overflow-y:auto;max-height:75px;font-size:20px" contentEditable></div>
						<form id="alpha_photo" action="upload_mail.php" class="dropzone" style="display:none;position:absolute;height:auto;min-height:100px;padding-top:10px;width:570px;border:none;opacity:0.9;max-height:140px;height:140px;overflow-y:scroll"></form>
						<div id="alpha2" style="padding: 5px;margin-top:20px"> </div>
						<br>
						<div id="mes"></div>
						<div id="beta" style="display:none"></div>
						<table border=0 width=100% align=center style="margin-top:70px;font-family:Open Sans Condensed;font-size:18px">
							<tr>
								<td align=left valign=center>
									<span style="margin-bottom:5px;border:none;font-size:18px">Message Self destructs in</span>
									<span contentEditable style="margin-left:5px;padding-left:15px;padding-right:15px;border:1px solid skyblue;border-radius:2px;width:30px;font-weight:bold;font-family:Open Sans Condensed;font-size:22px;background:#fff" type="text" id="selfDestruct">30</span>
									<span style="margin-left:5px;font-size:18px"> Seconds </span>
								</td>
								<td align=left valign=center style="border:none">
								</td>
							</tr>
							<tr>
								<td align=center>
									<br><input type="image" style="border:none;opacity:0.7;width:75px" src="send.png" onclick="go()">
								</td>
								<td align=center>
									<br><input id="alpha_pic" type="image" style="border:none;opacity:0.7;width:75px" src="cam.png" onclick="dz()">
								</td>
							</tr>
							<tr>
								<td WIDTH=50% align=center>
									<span class="eLabel" style="font-size:20px">
										SEND MESSAGE
									</span>
								</td>
								<td width=50% align=center>
									<span id="alpha_label" class="eLabel" style="font-size:20px">
										UPLOAD PHOTO
									</span>
								</td>
							</tr>
						</table>
					</div>
					</div>
				</div>
		  </div>
		  </section>
	<? } ?>	
	</body>
</html>     