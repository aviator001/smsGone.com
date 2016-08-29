<?
	include "utils.class.php";
	$u = new utils();
	$is = $u->is_mobile();
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
				text-align:left; font-size:24px;font-family:Waiting for the sunrise;width: 100%; background: rgb(255, 255, 255); height:30px; border:none; border-radius:5px;padding:10px
			}
			.eLabel {
				font-family:Poiret One;font-size:18px;color:#333; margin-left: 15px; font-family:Poiret One;font-size:24px; margin-left: 15px;
			}
		</style>
		<link href="../css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
		<link href="http://smsgone.com/css/stream.css" rel="stylesheet" type="text/css" />
		<script src="../js/jquery.min.js"></script>
		<script src="dropzone/dropzone.min.js"></script>
		<script src="../js/jquery.Jcrop.min.js"></script>
		<script src="../g/aes.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/fastclick.js"></script>
	<script type="text/javascript">
		var c=0,tg
		var timeouts = [];		
		var x=[]
		var x1=[]
		var x2=[]
		var op=[]
		var el=[]
		var v=[]
		var g		
		var xctr=0
		var selfD
		var units
		var tens

<? if ($is) { ?>
		setTimeout('page_init()',10)

		function page_init() {
			document.getElementById('ym').style.display='none'
			document.getElementById('msg_btn').style.opacity='1'
			document.getElementById('alpha').style.display='none'
		}

		
		function view_pic(obj) {
			var p = obj.split('attach/')[1]
			p=p.split('.')[0]
			var tmr=document.getElementById('timer')
			document.getElementById('jModalWn').style.display='block'
			document.getElementById('objW').style.display='block'
			document.getElementById('container').style.display='none'
			document.getElementById('objW').style.width='800px'
			document.getElementById('objW').style.height='900px'
			jModalWn.appendChild(tmr)
			document.getElementById('objW').innerHTML="<img title='Click to close me' onclick='hide_pic()' src='"+obj+"' class='www_box' style='cursor:hand;cursor:pointer;max-width:800px;max-height:800px;width:800px;height:800px;border:10px solid #fff'><br><div style='color:#fff'>HIDE ME</div>"
		}
			
		function dispatch(key)	{
			var url = 'x_descramble.php?bin_user_token=<?=($_GET[i]);?>&key=' + key
			console.log(url)
					var request = $.ajax({
						url: url,
						type: "GET",
						dataType: "html",
						cache: false,
						success: function(msg) {
							selfD=msg.split('|')[0]
							var msgG=msg.split('|')[1]
							document.getElementById('alpha').innerHTML = msgG
							document.getElementById('alpha').style.background='#fff'
							document.getElementById('alpha').style.opacity='1'
							document.getElementById('container').style.height='100px'
							document.getElementById('c1').style.display='none'
							document.getElementById('c2').style.display='none'
							document.getElementById('mb').style.display='none'
							document.getElementById('container').style.top='0px'
							document.getElementById('container').style.marginTop='10px'
							document.getElementById('container').style.borderRadius='0 0 10px 10px'
							document.getElementById('timer').style.display='block'
							document.getElementById('main').style.cssText=''
							document.getElementById('msg_btn').style.cssText='display:block;position:absolute;left:0;right:0;margin:auto;width:320px;top:225px;text-shadow:0 0 10px #000;background:none'
							document.getElementById('alpha').style.cssText='border-radius:0 0 8px 8px;background:#333;display:block;position:absolute;left:0;right:0;margin:auto;width:;height:auto;text-shadow:0 0 10px #000'
							tens=Math.floor(selfD/10)
							units=selfD*1-tens*10
							start_timer()
						}})
				}
				
<? } else { ?>
		setTimeout('page_init()',500)
		function page_init() {
			document.getElementById('ym').style.display='none'
			document.getElementById('msg_btn').style.opacity='1'
			document.getElementById('alpha').style.display='none'
		}

		
		function view_pic(obj) {
			var p = obj.split('attach/')[1]
			p=p.split('.')[0]
			var tmr=document.getElementById('timer')
			document.getElementById('jModalWn').style.display='block'
			document.getElementById('objW').style.display='block'
			document.getElementById('container').style.display='none'
			document.getElementById('objW').style.width='800px'
			document.getElementById('objW').style.height='900px'
			jModalWn.appendChild(tmr)
			document.getElementById('objW').innerHTML="<img title='Click to close me' onclick='hide_pic()' src='"+obj+"' class='www_box' style='cursor:hand;cursor:pointer;max-width:800px;max-height:800px;width:800px;height:800px;border:10px solid #fff'><br><div style='color:#fff'>HIDE ME</div>"
		}
	
		function dispatch(key)	{
			var url = 'x_descramble.php?bin_user_token=<?=($_GET[i]);?>&key=' + key
			console.log(url)
					var request = $.ajax({
						url: url,
						type: "GET",
						dataType: "html",
						cache: false,
						success: function(msg) {
							selfD=msg.split('|')[0]
							var msgG=msg.split('|')[1]
							document.getElementById('alpha').innerHTML = msgG
							document.getElementById('alpha').style.background='#fff'
							document.getElementById('container').style.height='100px'
							document.getElementById('container').style.top='0px'
							document.getElementById('container').style.marginTop='10px'
							document.getElementById('container').style.borderRadius='0 0 10px 10px'
							document.getElementById('ym').style.display='none'
							document.getElementById('c1').style.display='none'
							document.getElementById('c2').style.display='none'
							document.getElementById('b1').style.display='none'
							document.getElementById('b2').style.display='none'
							document.getElementById('mb').style.display='none'
							document.getElementById('msg_btn').style.display='block'
							document.getElementById('alpha').style.display='block'
							document.getElementById('timer').style.display='block'
							document.getElementById('alpha').className=''
							document.getElementById('alpha').style.cssText='border-radius:0 0 8px 8px;background:#333;display:block;position:absolute;height:auto;min-height:100px;padding-top:0px;width:540px;top:350px;z-index:999999999999'
							tens=Math.floor(selfD/10)
							units=selfD*1-tens*10
							start_timer()
						}
					})
				}
<? } ?>
		var ut
		function start_timer() {
			document.getElementById('units').style.display='block'
			document.getElementById('tens').style.display='block'
			if (tens>-1) {
				if (units<=0) {
					if (tens>-1) {
						document.getElementById('units').src = units + '.png'
						document.getElementById('tens').src = tens + '.png'
						ut=setTimeout('start_timer()',1000)
						tens--
						units=9
					} else {
						units=0
						tens=0
						document.getElementById('units').src = units + '.png'
						document.getElementById('tens').src = tens + '.png'
						clearTimeout()
					}
				} else {
					document.getElementById('tens').src = tens + '.png'
					document.getElementById('units').src = units + '.png'
					units--
					ut=setTimeout('start_timer()',1000)
				}
			}
		}
		
		function getRandomIntInclusive(min, max) {
		  return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		var n
		function destruct(objID) {
			if (selfD) {
				var gn=(selfD*1000 + getRandomIntInclusive(1000,5000))
				console.log(selfD)
				x2[objID]=setTimeout('destroy("'+objID+'")', gn)
				timeouts.push( x2[objID] );		
			}
		}

		function destroy(objID) {
			if(v[objID] !='1') {
				x1[objID]=setTimeout('fade("'+objID+'")', getRandomIntInclusive(100,500))
				timeouts.push( x1[objID] );		
				op[objID]=1
			} else {
				op[objID]=1
				el[objID].src='snow.gif'
				v[objID]=1
			}
		}
		
		function fade(objID) {
			el[objID]=document.getElementById(objID)
			if (op[objID] >= 0) {
				el[objID].style.opacity=op[objID]
				op[objID]=op[objID]-0.01
				x[objID]=setTimeout('fade("'+objID+'")', getRandomIntInclusive(1,15))
				timeouts.push( x[objID] );		
			} else {
				op[objID]=1
				el[objID].src='snow.gif'
				v[objID]=1
				el[objID].style.opacity=op[objID]
				if (xctr==0) g=setTimeout('garbage()',15000)
			}
		}
		
		function garbage()	{
			var url = 'garbage.php?bin_user_token=<?=($_GET[i]);?>'
			console.log(url)
			var request = $.ajax({
				url: url,
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
					xctr=1
					clearTimeout(g)
					console.log(msg+'Garbage Removed')
					return false
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
		var html = document.documentElement;
		var jModalWn = document.createElement('div');
		var objW = document.createElement('div');
		jModalWn.id='jModalWn'
		objW.id='objW'
		jModalWn.style.cssText = "display:none;position:absolute;width:100%;height:100%;top:0px;bottom:0px;left:0px;right:0px;margin:auto;z-index:999999999999999999999;background:#000;opacity:1"
		objW.style.cssText = "display:none;margin:auto;position:absolute;z-index:9999999999999999999991;left:0;right:0;top:0;bottom:0;width:125px;padding:20px;padding-top:10px;background:#000;border-radius:8px;opacity:0.9;box-shadow:0px 0px 5px #333"
		html.appendChild(jModalWn)
		html.appendChild(objW)
		
	</script>
	<? if ($is) { ?>
    <body style="overflow: none;background:url(bg1.jpg) no-repeat center;background-size:cover;width:100%;height:100%">
		<div style="margin:auto;display:;position:absolute;z-index:99999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity: 1; background:url(bg1.jpg) center center;background-size:cover" id="tint"></div>
		<div style="margin:auto;display:none;position:absolute;z-index:999999999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity: 0.7; background: #000" id="tint"></div>
		<div style="margin:auto;display:none;position:absolute;z-index:99999999;left:45%" id="gears"><img src="http://smsgone.com/images/loader_b.gif"></div>
		<div onclick="dismiss(this)" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://smsgone.com/images/av/alert_05.png') no-repeat center; width: 320px; height:100px;font-size:11pz; color: white;opacity:0.8" id="toast"></div>
        <div id="legal" style="width:100%; height:100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background: #000; opacity: 0.8; z-index:10000; display: none" onclick="this.style.display='none'; document.all.privacy.style.display='none'; document.all.terms.style.display='none'"></div>
        <div id="terms" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
        <div id="privacy" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
		<link href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" rel="stylesheet" type="text/css" />
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
	</head>
	<div id='container' class="container" align=center style="z-index:9999999;padding:10px;padding-top:0;border-radius:0 0 5px 5px;max-width:320px;margin:auto;left:0;right:0;position:absolute;top:0px;background:;height:300px;">
		<div class="row" align=left>
			<table style="background:url(http://smsgone.com/images/backgrounds/bx07.png);width:100%;border-radius:0 0 5px 5px;margin:0;padding:0">
				<tr>
					<td>
						<img src="logo.png" style="margin-top:0px;margin-bottom:20px;width:50px">
					</td>
					<td>
						<table style="background:none">
							<tr>
								<td align=left>
									<span style="color:orange; font-family:Poiret One;font-size:28px;color:#000;margin-left: 10px;text-shadow: 0px 0px 10px #000;">
										Encrypted Messaging
									</span>
								<span id="timer" style="display:none">
									<span><img id="base1" style="position:absolute;right:104px;top:108px;box-shadow:15px 5px 20px #333, inset 1px 1px 30px #000" src="led2.png"></span>
									<span><img id="base2" style="position:absolute;right:154px;top:108px;box-shadow:15px 5px 20px #333, inset 1px 1px 30px #000"  src="led2.png"></span>
									<span><img id="tens" style="display:none;width:44px;position:absolute;right:154px;top:112px;;z-index:9999999;opacity:1" src="g.png"></span>
									<span><img id="units" style="display:none;width:44px;position:absolute;right:104px;top:112px;z-index:9999999;opacity:1" src="r.png"></span>
									<span><img style="position:absolute;opacity:0.5;height:94px; width:125px;right:93px;top:95px;z-index:999999"src="panel.png"></span>
								</span>									
								</td>
								</tr>
							<tr>							
								<td align=left>
									<span style="margin-left:15px;font-family:Kristi;font-size:24px;text-shadow: 0px 0px 10px #000;">
										Guaranteed unbreakable.$1000.
									</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<div id="main" style="background:#333;box-shadow:0 0 30px #333;border-radius:5px;padding:10px;margin-top:150px;box-shadow:0 0 50px #000">
				<div id='c1' style="margin:10px;margin-left:-10px">
					<span class="eLabel">
						Enter Password
					</span>
				</div>
				<div id='c2'>
					<input class="eInput" name="key" id="key" placeholder="Secret Phrase">
				</div> 
				<div id='msg_btn'>
					<div id="ym" style="margin-left:-10px;background:silver">
						<span class="eLabel">
							Your Message
						</span>
					</div>
					<div id="alpha" onKeyPress="javascript:keyPressEvent(event);" class="eInput" style="position:absolute;height:auto;min-height:100px;padding-top:10px;width:570px;margin-top:5px"></div>
				</div>
				<div id="mb">
					<div>
						<div style="border:none;border-radius:2px;height:30px;opacity:1;width:100px;background:url(z_bright.png);font-family:Open Sans Condensed;font-size:18px;color:#000" onclick="go()">Get My Message</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
<? } else { ?>
    <body style="overflow: none;background:url(bg1.jpg) no-repeat center;background-size:cover;width:100%">
		<div style="margin:auto;display:none;position:absolute;z-index:99999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity: 1; background:url(bg1.jpg) center center;background-size:cover" id="tint"></div>
		<div style="margin:auto;display:none;position:absolute;z-index:999999;left:0px;right: 0px; top: 0px; bottom: 0px; width: 100%; height: 100%; opacity:1; background: #000" id="tint"></div>
		<div style="margin:auto;display:none;position:absolute;z-index:999999;left:45%" id="gears"><img src="http://smsgone.com/images/loader_b.gif"></div>
		<div onclick="dismiss(this)" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://smsgone.com/images/av/alert_05.png') no-repeat center; width: 320px; height:100px;font-size:11pz; color: white;opacity:0.8" id="toast"></div>
        <div id="legal" style="width:100%; height:100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background: #000; opacity: 0.8; z-index:10000; display: none" onclick="this.style.display='none'; document.all.privacy.style.display='none'; document.all.terms.style.display='none'"></div>
        <div id="terms" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
        <div id="privacy" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>
			<div id='container' class="container" align=center style="box-shadow:0 0 50px #000;border-radius:8px;margin:auto;left:0;right:0;top:0;bottom:0;position:absolute;background:silver;max-width:600px;padding:20px;padding-left:30px;max-height:auto;height:250px">
				<div class="row" align=left>
					<div class="span6" style="">
						<table>
						<tr>
						<td>
						<img src="logo.png" style="display:;top:0;margin-top:70px;margin-left:-10px;position:absolute;display:;margin-top:30px;margin-bottom:20px;width:75px">
						</td>
						<td>
							<table>
							<tr>
							<td align=left>
								<div class="container" style="width:600px;padding-top:25px">
								<div class="row">
								<div class="col-md-3" id="em" style="position:absolute;margin-top:0px;margin-left:100px;color:orange; font-family:Poiret One;font-size:40px;color:#0093D9;text-shadow: 0 0 1px #fff;">Encrypted Messaging</div>
								<div class="col-md-2"  style="display:none;position:absolute;margin-top:-50px;right:0;margin-left:-150px;z-index:999999999999999999999999;width:150px" id="timer">
									<span><img id="base1" style="position:absolute;right:104px;top:28px;box-shadow:15px 5px 20px #333, inset 1px 1px 30px #000" src="led2.png"></span>
									<span><img id="base2" style="position:absolute;right:58px;top:28px;box-shadow:15px 5px 20px #333, inset 1px 1px 30px #000"  src="led2.png"></span>
									<span><img id="units" style="display:none;width:44px;position:absolute;right:58px;top:32px;;z-index:9999999;opacity:1" src="g.png"></span>
									<span><img id="tens" style="display:none;width:44px;position:absolute;right:106px;top:32px;z-index:9999999;opacity:1" src="r.png"></span>
									<span><img style="position:absolute;opacity:0.5;height:94px; width:125px;right:43px;top:15px;z-index:99999999"src="panel.png"></span>
								</div>
							</div>
							</div>
							</td>
							</tr>
							<tr>							
								<td align=left>
									<br><div style="margin-left:70px;margin-top:10px;font-family:Kristi;font-size:28px">Guaranteed unbreakable by $1000</div>
								</td>
							</tr>
							
							</table>
						</td>
						</tr>
						</table>
						<div id='c1' style="margin-top:20px;margin-left:-10px">
							<span class="eLabel">
								Enter Password
							</span>
						</div>
						<div id='c2'>
						<input class="eInput" name="key" id="key" placeholder="Secret Crypto Phrase or Password">
						</div> 
						<div id='msg_btn'>
							<table border=0 width=100% align=center style="margin-top:-5px;margin-bottom:5px">
								<tr>
									<td colspan=2>
										<div id="ym" style="margin-left:-10px;background:silver">
											<span class="eLabel">
												Your Message
											</span>
										</div>
										<div id="alpha" onKeyPress="javascript:keyPressEvent(event);" class="eInput" style="position:absolute;height:auto;min-height:100px;padding-top:10px;width:570px;margin-top:5px"></div>
									</td>
								</tr>
								<br>
								<tr id="b1">
								</tr>
								<tr id="b2">
									<td colspan=2 align=center>
									</td>
								</tr>
							</table>
						</div>
							<div style="display:;position:absolute;left:0;right:0;margin:auto;top:230px;z-index:999999999999999999999999;width:150px" id="mb">
								<div><input type=button style='background:url(http://smsgone.com/images/buttons/b04.png );border-radius:2px;background-size:cover;font-family:Poiret One;font-size:18px;border:none;height:35px;border-radius:4px;' value='Show Message' onclick='go()'></div>
							</div>
						</div>
					</div>
				</div>
			
		  </div>
	<? } ?>	
	</body>
</html>