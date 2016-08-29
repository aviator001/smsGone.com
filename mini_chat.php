<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta charset="utf-8">
        <title>Shadow | sms</title>
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <link rel="shortcut icon" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/flat-ui.css">
        <link rel="stylesheet" href="css/icon-font.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/content/css/style.css">
        <link rel="stylesheet" href="css/content/css/ui-kit-styles.css">
        <link rel="stylesheet" href="css/contacts/css/style.css">
        <link rel="stylesheet" href="css/contacts/css/ui-kit-styles.css">
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/startup-kit.js"></script>
        <script src="js/script.js"></script>
        <script src="js/session.js"></script>
 </head>
 <script>
	function isMobile() {
		var a = navigator.userAgent||navigator.vendor||window.opera;
		return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4));
	}
	
	var x = 'pricing.php'
	function close_me() {
		window.opener.location.href='pricing.php'
		window.close()
		setTimeout('close_me()', 500)
	}
	var con_id = 1, k, n=1, p_n=0, ec
	var validate = true
	var ns
	var x6,cnt=0
	var m_to, me, you, t, s, objH
	
	if (window_height() < screen.height) objH = window_height()
		else objH = screen.height
	
	$(document).keydown(function(e){
		ec = e.keyCode
		if (e.keyCode == 13) {
			send()
		}
		k = String.fromCharCode(ec)
	})
			
	function window_height()
	{
		if (document.body) {
		 winH = document.body.offsetHeight;
		}
		if (document.compatMode=='CSS1Compat' &&
			document.documentElement &&
			document.documentElement.offsetHeight ) {
			winH = document.documentElement.offsetHeight;
			return winH
		}
		if (window.innerHeight && window.innerHeight) {
		 winH = window.innerHeight;
		 return winH;
		}
	}		
	function is_valid_mobile(f) {
		var number = f.value
		if (number.length == 11) {
				validate = false
				show_error(f,"Invalid Mobile! 10 digits only. Do not include '1' or international code. Format: (555) 555-5555 or 5555555555 or 555.555.5555 or 555-555-5555")
				return false
		}
		var mobile = /^(\W|^)[(]{0,1}\d{3}[)]{0,1}[.]{0,1}[\s-]{0,1}\d{3}[\s-]{0,1}[\s.]{0,1}\d{4}(\W|$)/
		if(!mobile.test(number)) 
			{
				validate = false
				show_error(f,'Invalid Mobile! Format: (123) 456-7890 or 1234567890 or 123.456.7890')
				return false
			}
		}
	function set_link() {
		
		var msid = getCookie('msid')
		var LogInOut = document.getElementById('LogInOut')
		var home = document.getElementById('home')
		
		var login = "<a href='login.html' style='color:grey;text-decoration:none'>LOGIN</a>"
		var logout = "<a href='#' onclick='do_logout()' style='color:grey;text-decoration:none'>LOGOUT</a>"
		var index = "<a href='index.html' style='color:grey;text-decoration:none'>Home</a>"
		var members = "<a href='members.html' style='color:grey;text-decoration:none'>Members Home</a>"
	
		if (msid.length > 1) {
			LogInOut.innerHTML = logout
			home.innerHTML = members
		} else {
			LogInOut.innerHTML = login
			home.innerHTML = index			
		}
	}	
	
	var block = 'block'
	var none = 'none'

	function is_valid_email(f) {
		var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!email.test(f.value)) 
			{
				validate = false
				show_error(f,'Invalid Email! Please re-enter')
				return false
			}
			else return true
		}
		
		function show_error(f,i) {
				if(!i) i = 'Invalid Entry! Please re-enter'
				var e = ' No Blanks!'
				validate = false
				var r = f.id + '_err'
				var t = r + '_txt'
				r = document.getElementById(r)
				t = document.getElementById(t)
				validate = false
				f.style.border = '2px solid red'
				f.style.background = '#ffffbf'
				var obj = f.id
				if (f.value.length == 0) t.innerHTML = e
					else t.innerHTML = i
				return false
			}

			function clear_error(f)	{
				var r = f.id + '_err'
				var t = r + '_txt'
				var p = f.value
				f.style.border = '1px solid silver'
				f.style.background = '#fff'
				r = document.getElementById(r)
				t = document.getElementById(t)
				r.style.display = 'none'
				t.innerHTML = ''
				f.value = p
				validate = true
			}
			
			function send() {
				var imsg = document.all.xmessage.value
				document.getElementById('gears').style.display = 'block'
				document.getElementById('send_button').disabled = true
				document.getElementById('send_button').style.opacity='0.3'
				if (!me) me = my_number()
				var url = 'x_send_sms.php?to=' + you + '&from=' + me + '&message=' + imsg
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						location.reload()
						document.getElementById('xmessage').innerHTML=''
						document.getElementById('xmessage').value=''
						document.getElementById('send_button').disabled = false
						document.getElementById('send_button').style.opacity='1.0'
						document.getElementById('gears').style.display = 'none'
						show_detail(me,you)
					}
				})
			}
		
			function show_detail() {
				resize_canvas()
				document.getElementById('bar').style.top = '0px'
				setCookie('chat_with','<?=$_REQUEST['long']?>')
				var long_code = '<?=$_REQUEST['long']?>'
				you = getCookie('chat_with')
				var mobi = getCookie('mobile')
				document.getElementById('mobile_to').innerHTML = 'Send SMS to: ' + format_sms(long_code)
				var url = 'x_sms_all_messages.php?mob=' + mobi + '&long=' + '<?=$_REQUEST['long']?>'
				console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (!msg) alert('Error!')
						var objCon = document.getElementById('content')
						objCon.innerHTML = msg
						s = setTimeout('set_scroll()', 500)
						t = setTimeout('show_detail()', 1000)
					}
				})
			}
					
			function set_scroll() {
				var objCon = document.getElementById('content')
				objCon.scrollTop = objCon.scrollHeight			
			}
			
			function my_number() {
				var m1 = getCookie('msid')
				m1 = m1.replace('%7C','|')
				m1=m1.split('|')
				return m1[0]
			}
			
			function show_history() {
				var m = getCookie('msid')
				m = m.replace('%7C','|')
				m=m.split('|')
				var mo = m[0]
				var lc = m[1]
				if(mo) {
					var url = 'x_sms_get_messages.php?mobile=' + mo
					var request = $.ajax({
						url: url,
						type: "GET",
						dataType: "html",
						cache: false,
						success: function(msg) {
							document.getElementById('pre_head').style.display = 'none'
							document.getElementById('head').style.display = 'none'
							document.getElementById('content').style.width = '60%'
							document.getElementById('content').innerHTML = '<table id="link" class="stripe_table" style="width:100%">' + msg + '</table>'
							resize_canvas()
						}
					})
				} else {
						document.getElementById('msid').innerHTML = "<span style='font-size:20px; color: #00B2B2'> LOGIN TO CONTINUE</span>"
						alert('Must Login Again')
						location.href='login.html'
				}
			}
			
			function get_messages()
			{
				var m = getCookie('msid')
				m = m.replace('%7C','|')
				m=m.split('|')
				var mo = m[0]
				var lc = m[1]
				if(mo) {
					var url = 'x_sms_get_messages.php?mobile=' + mo
					var request = $.ajax({
						url: url,
						type: "GET",
						dataType: "html",
						cache: false,
						success: function(msg) {
							document.getElementById('pre_head').style.display = 'none'
							document.getElementById('head').style.display = 'none'
							document.getElementById('content').style.display = 'block'
							document.getElementById('content').innerHTML = '<table id="link" class="stripe_table" style="width:100%">' + msg + '</table>'
							document.getElementById('link').innerHTML = msg
							resize_canvas()
						}
					})
				} else {
						document.getElementById('msid').innerHTML = "<span style='font-size:20px; color: #00B2B2'> LOGIN TO CONTINUE</span>"
						alert('Must Login Again')
						location.href='login.html'
				}
			}
			
			function format_sms(objSMS) {
				return ' (' + objSMS.substr(1,3) + ') ' + objSMS.substr(4,3) + '-' + objSMS.substr(7,4)
				
			}
			
			function get_user(m)
			{
				document.getElementById('gears').style.display='block'
				var url = 'x_sms_id.php?mobile=' + m
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						document.getElementById('gears').style.display='none'
						document.getElementById('r').innerHTML = '<font style="font-size:22px">Number belongs to: <b>' + msg + '</b></font>'
					}
				})
			}
	
	function delCookie(cname)
	{
		var d = new Date();
		 d.setTime(d.getTime());
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + "" + "; " + expires;
	 }
	 
	function setCookie(cname,cvalue,exdays)
	{
		var d = new Date();
		 d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	 }
	
	function getCookie(cname)
	{
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i=0; i<ca.length; i++) 
		  {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}
	function show_number() {
		setTimeout('s_number()',1000)
	}
	function s_number() {
		document.getElementById('from').innerHTML = '<h2>From: <font color="grey">' + getCookie('msid') + '</font></h2>' 
		document.getElementById('from_h').value =  getCookie('msid') 
	}
	function resize_canvas() {
		document.getElementById('content').style.maxHeight = '480px'
		document.getElementById('send_box').style.top = '520px'
		document.getElementById('bar').style.top = '0px'
		var dev = (navigator.userAgent||navigator.vendor||window.opera)
		var sc = screen.height
		if (isMobile()) {
			if ((sc > 500) && (sc < 570)) {
				document.getElementById('content').style.maxHeight = '360px'
				document.getElementById('send_box').style.top = '380px'
			} else {
				document.getElementById('content').style.maxHeight = '470px'
				document.getElementById('send_box').style.top = '490px'
			}
		}
	}
			var original
			var objHelp
			function help(n) {
				if (!n) n = 'User'
				original = document.getElementById('mobile_to').innerHTML
				objHelp = document.getElementById('mobile_to')
				objHelp.innerHTML = 'Add ' + n + ' to your favourites'
			}

			function help_out() {
				objHelp.innerHTML = original
			}

			function help2(n) {
				if (!n) n = 'User'
				original = document.getElementById('mobile_to').innerHTML
				objHelp = document.getElementById('mobile_to')
				objHelp.innerHTML = 'Block ' + n + ' forever'
			}

			function help_out2() {
				objHelp.innerHTML = original
			}
	
	</script>
	<body onload="show_detail()" style='background:#f0f0f0;overflow:hidden'>
	<div style="margin:auto;display:none;position:absolute;z-index:99999999;left:45%" id="gears"><img src="http://shadowsms.com/images/loader_b.gif"></div>
	<!-- Header -->
		<div id="main" style="height:90%;background:#f0f0f0">
			<div align=center class="container" style="height:auto">
				<!-- Content -->
				<div border=0 id="bar" style='text-align:left;top:25px;position:fixed;overflow:hidden;width:100%;cursor:hand;height:30px;cursor:pointer;border-radius:0px;background:#bfcfff;padding-top:5px;padding-bottom:5px;opacity:0.9;z-index:1000;box-shadow:1px 1px 25px rgba(0,0,0,0.2);top:0px'><table><tr><td width=70%><span style='color:#000;text-shadow:none' id="mobile_to"></span></td><td width=10%><span><img src='images/star.png' onmouseover="help('<?=$_REQUEST['long_code']?>')" onmouseout='help_out()' style='height:30px; cursor: hand; cursor: pointer'></span></td><td width=5%>&nbsp;</td><td width=10%><span><img src='images/lock.png' onmouseover="help2('<?=$_REQUEST['long_code']?>')" onmouseout="help_out2()" style='height:30px; cursor: hand; cursor: pointer'></span></td></tr></table></div>
				<div id="message_header">
					<div class="row" style="overflow:hidden">
						<div id="content" class="12" style="position:absolute;top:0px;margin-top:-25px;background:#f0f0f0;overflow-x:hidden;width:100%;max-width:540px;max-height:360px">
							<div style="" id="link" style="background:#f0f0f0; width:100%;overflow-x:hidden">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="send_box" style="width:100%;position:fixed;top:380px;z-index:10000000000000;margin-left:20px">
				<textarea onblur="" maxlength=160 rows=2 style="box-shadow:none; border:1px solid grey; background:#fff;color:black;border-radius:5px;width:200px; height:50px;align:center;overflow:hidden;margin-top:10px;font-size:12px" name="xmessage" id="xmessage" placeholder="HIT 'ENTER' OR 'RETURN' KEY TO SEND MESSAGE!"></textarea>
				<input type="button" id="send_button" onclick="send()" class="btn btn-primary" style="height:60px;margin:5px" value="SEND"><span name="xmessage_err" id="xmessage_err"></span><span name="xmessage_err_txt" id="xmessage_err_txt"></span>
			</div>
	</body>
</html>
