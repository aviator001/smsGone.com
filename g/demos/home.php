	<?
	error_reporting(0);
	include "../x_lib.php";
	include "utils.class.php";

	$utils = new utils();
	$dir = date('HYmdHh');
	if(!is_dir("../xsr/$dir")) {
		mkdir("../xsr/$dir", 0777, true);
	}
	$src = "../images/img";
	$dst = "../xsr/$dir";
	$fnstr = '';
	$key = date('YmdH');
	$user_token = substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4);
	$bin_user_token = $utils->strToBin($user_token);
	$aes_user_token = $utils->encrypt($bin_user_token, $key);

	for ($i=1; $i < 40; $i++) {

		$fn = substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4);
		$fn2 = $fn."_o";
		$f = '"'.$fn.'"';
		
		$f2 = "$dst/$fn2.png";
		$f_o = '"'.$f2.'"';

		$f3 = "$dst/$fn.png";
		$f_b = '"'.$f3.'"';
		
		copy("$src/z$i.png", "$dst/$fn.png");
		copy("$src/x$i.png", "$dst/$fn2.png");
		
		$img['img'] = "<img id='$fn' onclick='print_me($f)' onmouseover='swap_me(this,$f_o)' onmouseout='swap_me_back(this,$f_b)' style='cursor:mouse;cursor:pointer;box-shadow:inset 2px 2px 10px #666666' src='$dst/$fn.png'>";
		if ($i == 39) $str .= "<img id='$fn' onmouseover='swap_me(this,$f_o)' onmouseout='swap_me_back(this,$f_b)' onclick='delete_me(this)' style='cursor:mouse;cursor:pointer;box-shadow: inset 2px 2px 10px #666666' src='$dst/$fn.png'>";
			else $str .= "<img id='$fn' onmouseover='swap_me(this,$f_o)' onmouseout='swap_me_back(this,$f_b)' onclick='print_me(this,$f_b)' style='cursor:mouse;cursor:pointer;box-shadow: inset 2px 2px 10px #666666' src='$dst/$fn.png'>";
		
		$img_arr[$arr_a[$i-1]] = $fn;
		$fnstr .= $fn.' ';
	}

		$file = "../../fn/".$bin_user_token;
	 	$link = "../../f/".$bin_user_token;
		
		$current = $fnstr;
		file_put_contents($file.'_a', json_encode($img_arr));
		file_put_contents($file.'_b', $current);
		//	$f = file_get_contents($file);
?> 
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>Encrypted Messaging</title>
<style>
@charset 'UTF-8';
@import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300);
</style>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://finggr.com/g/aes.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>var mobile_url='home_mobile.php'</script>
<script type="text/javascript" src="mobile.js"></script>
<script>
	function dispatch(enc_msg, enc_key, enc_cell)	{
			
		var url = 'http://finggr.com/g/x_scramble.php?enc_msg=' + enc_msg + '&enc_key=' + enc_key + '&enc_cell=' + enc_cell + '&token=<?=$aes_user_token;?>' 
		console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert('Message has been sent!')
					}
				})
			}
	
	var usr_input = ''
	var v = ''
	var objUser = ''
	var objPhrase
	function swap_me(fn, fn_o) {
		fn.src = fn_o
	}
	
	function swap_me_back(fn, fn_b) {
		fn.src = fn_b
	}
	
	function go() {
		var key = document.getElementById('key').value
		var cell = document.getElementById('cell').value
		var msg = objUser.substring(0,objUser.length-1)
		var pass
		//Move this to hidden/sub-root js/php file
		if (!pass) pass = '<?=$key;?>'
		var enc_key = Aes.Ctr.encrypt(key, pass, 256)
		var enc_msg = Aes.Ctr.encrypt(msg, pass, 256)
		var enc_cell = Aes.Ctr.encrypt(cell, pass, 256)
		dispatch(enc_msg, enc_key, enc_cell)
	}
	
	function print_me(fn, fn_b) {
		v = v + "<img style='width:40px' src='" + fn_b + "'>"
		document.getElementById('alpha').innerHTML = v
		objUser = objUser + fn.id + '|'
	}
	
	function delete_me(fn) {
		var w = document.getElementById('alpha').innerHTML
		var objI = w.substring(0, w.length-76)
		document.getElementById('alpha').innerHTML = objI
		v = objI
	}

	function setCookie(cname,cvalue,exdays) {
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	 }

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) 
		  {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}
	
	function window_width() {
		if (document.body && document.body.offsetWidth) {
			winW = document.body.offsetWidth;
			winH = document.body.offsetHeight;
		}
			if (document.compatMode=='CSS1Compat' &&
				document.documentElement &&
				document.documentElement.offsetWidth ) {
				return document.documentElement.offsetWidth;
			}
			if (window.innerWidth && window.innerHeight) {
			return window.innerWidth;
		}
	}

	function window_height() {
		if (document.body && document.body.offsetWidth) {
		 winH = document.body.offsetHeight;
		}
		if (document.compatMode=='CSS1Compat' &&
			document.documentElement &&
			document.documentElement.offsetWidth ) {
			winH = document.documentElement.offsetHeight;
			return winH
		}
		if (window.innerWidth && window.innerHeight) {
		 winH = window.innerHeight;
		 return winH;
		}
	}	
</script>
	
</head>	

<style>
	@charset 'UTF-8';
	@import url(http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300);
	@font-face {
		font-family: 'FontAwesome';
		src: url('font/fontawesome-webfont.eot?v=3.2.1');
		src: url('font/fontawesome-webfont.eot?#iefix&v=3.2.1') format('embedded-opentype'), url('font/fontawesome-webfont.woff?v=3.2.1') format('woff'), url('font/fontawesome-webfont.ttf?v=3.2.1') format('truetype'), url('font/fontawesome-webfont.svg#fontawesomeregular?v=3.2.1') format('svg');
		font-weight: normal;
		font-style: normal;
	}
.s
	{
		background: rgba(255,255,255,1);
		background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(184,180,184,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(47%, rgba(246,246,246,1)), color-stop(100%, rgba(184,180,184,1)));
		background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(184,180,184,1) 100%);
		background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(184,180,184,1) 100%);
		background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(184,180,184,1) 100%);
		background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(184,180,184,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#b8b4b8', GradientType=0 );
	}	
.s1
	{
		background: rgba(250,5,5,1);
		background: -moz-linear-gradient(top, rgba(250,5,5,1) 0%, rgba(77,16,1,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(250,5,5,1)), color-stop(100%, rgba(77,16,1,1)));
		background: -webkit-linear-gradient(top, rgba(250,5,5,1) 0%, rgba(77,16,1,1) 100%);
		background: -o-linear-gradient(top, rgba(250,5,5,1) 0%, rgba(77,16,1,1) 100%);
		background: -ms-linear-gradient(top, rgba(250,5,5,1) 0%, rgba(77,16,1,1) 100%);
		background: linear-gradient(to bottom, rgba(250,5,5,1) 0%, rgba(77,16,1,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fa0505', endColorstr='#4d1001', GradientType=0 );
	}	
.s2
	{
		background: rgba(241,231,103,1);
		background: -moz-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(241,231,103,1)), color-stop(100%, rgba(254,182,69,1)));
		background: -webkit-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
		background: -o-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
		background: -ms-linear-gradient(top, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
		background: linear-gradient(to bottom, rgba(241,231,103,1) 0%, rgba(254,182,69,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f1e767', endColorstr='#feb645', GradientType=0 );
	}	
</style>  
<body style="overflow:hidden;background:#000">
	<div style="margin-left:auto;margin-right:auto;width:100%; max-width:1024px;height:auto;background:#CCC;padding:10px;box-shadow:inset 0px 0px 10px #333;" id="main_content">
		<table align=center style="width:100%;margin-left:auto;margin-right:auto;margin-top:10px">
			<tr>
				<td style="width:10%" align=right>
				</td>			
				<td style="width:90%" align=left>
					<table>
						<tr>
							<td valign=center >
								<table valign=center style="text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:24px; COLOR:grey">
									<tr>
										<td valign=center >
											<div style="margin-bottom:5px">SECURE:</div>
										</td>
										<td valign=center >
											<img src="img/bt2.png" width=30px>
										</td>
									</tr>
									<tr>
										<td>
											<div style="margin-bottom:5px">KEYBD:</div>
										</td>
										<td>
											<img onmouseover="this.src='img/bt1.png'" onmouseout="this.src='img/bt0.png'" src="img/bt0.png" style="width:30px;cursor:mouse;cursor:pointer">
										</td>
									</tr>
								</table>
							</td>
							<td valign=center >
								<div style="text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:92px; COLOR:SILVER"><B>ENTER YOUR MESSAGE</B></div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align=center colspan=2>
					<div>
						<div id="alpha" contentEditable="true" style="text-shadow: 1px 1px 1px #f0f0f0;color:grey;border:1px solid lightblue;font-family:Open Sans Condensed;width:80%;max-width:800px;height:auto;background:white"></div>
							<br>
							<br>
						<div id="beta" style="text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:72px;width:80%;height:92px;max-width:800px;height:auto;background:#333;padding:10px;padding-top:30px">
							<?=$str;?>
						</div>
						<div>
							<table style="width:80%">
								<tr>
									<td style="width:10%">
											<img id="i1" onmouseover="(this.src=='http://finggr.com/g/img/bt2.png')? this.src='img/bt2.png' : this.src='img/bt1.png'" onmouseout="(this.src=='http://finggr.com/g/img/bt2.png')?this.src='img/bt2.png':this.src='img/bt0.png'" src="img/bt0.png" style="width:50px;cursor:mouse;cursor:pointer">
									</td>
									<td style="width:90%">
										<div style="text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:72px; COLOR:SILVER"><B>ENTER THE SECRET KEY:</B></div>
									</td>
								</tr>
								<tr>
									<td colspan=2 style="width:100%">
										<input id="key" onclick="document.all.i1.src='img/bt2.png';document.all.i2.src='img/bt0.png'" onfocus="document.all.i1.src='img/bt2.png';document.all.i2.src='img/bt0.png'"  type="text" style="width:100%;text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:48px; COLOR:#333">
									</td>
								</tr>
							</table>
						</div>
						<div>
							<table style="width:80%">
								<tr>
									<td style="width:10%">
											<img id="i2" onmouseover="(this.src=='http://finggr.com/g/img/bt2.png')? this.src='img/bt2.png' : this.src='img/bt1.png'" onmouseout="(this.src=='http://finggr.com/g/img/bt2.png')?this.src='img/bt2.png':this.src='img/bt0.png'" src="img/bt0.png" style="width:50px;cursor:mouse;cursor:pointer">
									</td>
									<td style="width:90%">
										<div style="text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:72px; COLOR:SILVER"><B>TARGET MOBILE NUMBER:</B></div>
									</td>
								</tr>
								<tr>
									<td colspan=2 style="width:100%">
										<input id="cell" onclick="document.all.i1.src='img/bt0.png';document.all.i2.src='img/bt2.png'" onfocus="document.all.i1.src='img/bt0.png';document.all.i2.src='img/bt2.png'" type="text" style="width:100%;text-shadow: 1px 1px 1px #f0f0f0;color:grey;font-family:Open Sans Condensed;font-size:48px; COLOR:#333">
									</td>
								</tr>
							</table>
						</div>
						<br><br>
						<div>
							<input onmouseover="this.className='s2'" onmouseout="this.className='s1'" type="button" value=" E N C R Y P T " onclick="go()" style="cursor:hand;cursor:pointer;corner-radius:12px;border-radius:12px;color:silver;margin-left:auto;margin-right:auto;font-family:Open Sans Condensed;font-size:96px;width:80%;max-width:820px;height:150px;text-shadow: 1px 1px 1px #f0f0f0" class="s1">
						</div>
						
					</div>
				</td>
			</tr>
			<tr>
				<td align=center>
					<br>
					<br>
					<br>
					<br>
					<br>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>
