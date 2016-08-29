<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Encrypted Messaging</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<script type="text/javascript">
	   WebFontConfig = {
		 google: { families: [ 'Codystar::latin', 'Fredericka+the+Great::latin', 'Poiret+One::latin', 'Anaheim::latin', 'Great+Vibes::latin', 'Orbitron::latin', 'Monoton::latin', 'Share+Tech+Mono::latin', 'Audiowide::latin', 'Special+Elite::latin' ] }
	   };
	   (function() {
		 var wf = document.createElement('script');
		 wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
		   '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		 wf.type = 'text/javascript';
		 wf.async = 'true';
		 var s = document.getElementsByTagName('script')[0];
		 s.parentNode.insertBefore(wf, s);
	   })();
	</script>
<style>
.MyClass
{
		background: rgba(252,234,187,1);
		background: -moz-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(252,234,187,1)), color-stop(50%, rgba(252,205,77,1)), color-stop(51%, rgba(248,181,0,1)), color-stop(100%, rgba(251,223,147,1)));
		background: -webkit-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -o-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -ms-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: linear-gradient(to bottom, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93', GradientType=0 );	
}

.email
{
	background: #1e5799; /* Old browsers */
	background: -moz-linear-gradient(top,  #1e5799 0%, #2989d8 50%, #207cca 51%, #7db9e8 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1e5799), color-stop(50%,#2989d8), color-stop(51%,#207cca), color-stop(100%,#7db9e8)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=0 ); /* IE6-9 */
}

.sms
{
	background: rgb(76,76,76); /* Old browsers */
	background: -moz-linear-gradient(top,  rgba(76,76,76,1) 0%, rgba(89,89,89,1) 12%, rgba(102,102,102,1) 25%, rgba(71,71,71,1) 39%, rgba(44,44,44,1) 50%, rgba(0,0,0,1) 51%, rgba(17,17,17,1) 60%, rgba(43,43,43,1) 76%, rgba(28,28,28,1) 91%, rgba(19,19,19,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(76,76,76,1)), color-stop(12%,rgba(89,89,89,1)), color-stop(25%,rgba(102,102,102,1)), color-stop(39%,rgba(71,71,71,1)), color-stop(50%,rgba(44,44,44,1)), color-stop(51%,rgba(0,0,0,1)), color-stop(60%,rgba(17,17,17,1)), color-stop(76%,rgba(43,43,43,1)), color-stop(91%,rgba(28,28,28,1)), color-stop(100%,rgba(19,19,19,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom,  rgba(76,76,76,1) 0%,rgba(89,89,89,1) 12%,rgba(102,102,102,1) 25%,rgba(71,71,71,1) 39%,rgba(44,44,44,1) 50%,rgba(0,0,0,1) 51%,rgba(17,17,17,1) 60%,rgba(43,43,43,1) 76%,rgba(28,28,28,1) 91%,rgba(19,19,19,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */
}


.ui-dialog-titlebar
{
		background: rgba(252,234,187,1);
		background: -moz-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(252,234,187,1)), color-stop(50%, rgba(252,205,77,1)), color-stop(51%, rgba(248,181,0,1)), color-stop(100%, rgba(251,223,147,1)));
		background: -webkit-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -o-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -ms-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: linear-gradient(to bottom, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93', GradientType=0 );	
	color:white;
	font-size:0.9em;
	text-shadow:1px 0px white;
	font-family: Poiret One;
	font-style:normal;
}
.ui-dialog-titlebar-close
{
	width:100px;
	font-size:10px;
}
.ui-dialog-buttonpane
{
		background: rgba(252,234,187,1);
		background: -moz-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(252,234,187,1)), color-stop(50%, rgba(252,205,77,1)), color-stop(51%, rgba(248,181,0,1)), color-stop(100%, rgba(251,223,147,1)));
		background: -webkit-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -o-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: -ms-linear-gradient(top, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		background: linear-gradient(to bottom, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 50%, rgba(248,181,0,1) 51%, rgba(251,223,147,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93', GradientType=0 );	

	color:black;
	font-size:0.8em;
	text-shadow:1px 0px white;
	font-family: Poiret One;
	font-style:normal;
}
.ui-dialog-title
{
	color:grey;
	font-size:15px;
	text-shadow:1px 1px white;
	font-family: Poiret One;
	font-style:normal;
	font-style:none;

}
div:selected
{
border:none
}
</style>   
	<script type="text/javascript">
	var msg_key
	$(document).ready(function() {
	var a1 = 'encode512_09AF';
	var a2 = 'a_encode_512.';
		var h = '<br><table border=0><tr><td><div style="valign: center;"><img src="images/key.png"></td><td><table><tr><td width=240px><font style="font-family: Poiret One; font-size:16px">Enter your Secret Key:</td></tr><tr><td><input type="text" value="" id="key" style="border: 0px solid white; width: 225px; background:white; height: 22px; -moz-border-radius: 4px; border-radius: 4px; color: black; font-family: Courier; font-size: 16px;"></td></tr></table></div>'
		h = h + '<br>'
		var k = '<br><table><tr><td><img src="images/mail.png" width=30px></td><td width=200px><font style="font-family: Poiret One; font-size:16px">Enter your Secret Key:</td></tr><tr><td><input type="text" value="" id="key2" style="border: 0px solid white; width: 225px; background:white; height: 22px; -moz-border-radius: 4px; border-radius: 4px; color: black; font-family: Courier; font-size: 16px;"></td></tr></table></div>'
		k = k + '<br>'
		var m = '<table border=0 cellpadding=3 cellspacing=3><tr><td align=left><img src="images/mail.png" width=30px></td><td colspan=3 align=left><font style="font-family: Poiret One; font-size: 16px;">Sending Secure Email...</td></tr>'
		m = m + '<tr><td align=left><font style="font-family: Poiret One; font-size: 16px;">To: </td><td  colspan=3 align=left><input type="text" value="" id="to" style="border: 1px solid white; width: 175px; background:white; height: 22px; -moz-border-radius: 4px; border-radius: 4px; color: red; "></td></tr>'
		m = m + '<tr><td style="valign: top; align: right; font-family: Poiret One; font-size: 16px;">Message:</td><td colspan=3 align=left><textarea id="message" style="border: 1px solid white; width: 400px; background:#f0f0f0; text-shadow:1px 0px white;height: 200px; -moz-border-radius: 10px; border-radius: 10px; color: silver; font-family: Courier New; font-size: 16px; overflow: none;"></textarea></td></tr></table>'
		m = m + '<br>'
		var s = '<table border=0 cellpadding=3 cellspacing=3><tr><td align=left><img src="images/mail.png" width=30px></td><td colspan=3 align=left><font style="font-family: Poiret One; font-size: 16px;">Sending Secure SMS...</td></tr>'
		s = s + '<tr><td align=left><font style="font-family: Poiret One; font-size: 16px;">Cell No.: </td><td  colspan=3 align=left><input type="text" value="" id="sms_to" style="border: 1px solid white; width: 175px; background:white; height: 22px; -moz-border-radius: 4px; border-radius: 4px; color: red; "></td></tr>'
		s = s + '<tr><td style="valign: top; align: right; font-family: Poiret One; font-size: 16px;">Message:</td><td colspan=3 align=left><textarea id="sms_msg" style="border: 1px solid white; width: 400px; background:#f0f0f0; text-shadow:1px 0px white;height: 200px; -moz-border-radius: 10px; border-radius: 10px; color: silver; font-family: Courier New; font-size: 16px; overflow: none;"></textarea></td></tr></table>'
		s = s + '<br>'
		var $dialogKey = $('<div style="background: white; margin:0px; padding:0px;"></div>')
			.html(h)
			.dialog({
				autoOpen: false,
				modal: true,
				title: 'Enter Secret Phrase',
				buttons: { "Ok": function() { encrypt('encode512_09AF', 'a_encode_512.'); $(this).dialog("close", 1000); document.getElementById('progress').style.display = 'block'}}
			});

		
		var $dialogKeyD = $('<div style="background: white; margin:0px; padding:0px;"></div>')
			.html(k)
			.dialog({
				autoOpen: false,
				modal: true,
				title: 'Enter Secret Phrase',
				buttons: { "Ok": function() { encrypt('flipCipherAll', 'a_encode_512.'); $(this).dialog("close", 1000); document.getElementById('progress').style.display = 'block'}}
			});
			
		$('#opener').click(function() {
		var grid = document.getElementById("load_matrix")
		var enc_in = grid.innerHTML
		if ( (enc_in.length > 500) && (document.getElementById("radio2").checked) )
			{
				alert ('Too Long. Keep Below 500 Characters or use Normal Encryption!')
				return false
			} else {
				$dialogKey.dialog('open');
				return false;
			}
		});

		$('#opener2').click(function() {
				$dialogKeyD.dialog('open');
				return false;
		});

		$('#b1').click(function() {
				$(this).css("background", "orange");
				$('#b2').css("background", "#E8E8FF");
		});
		$('#b2').click(function() {
				$(this).css("background", "orange");
				$('#b1').css("background", "#E8E8FF");
		});
		
		var $dialogE = $('<div style="background: white;"></div>')
			.html(m)
			.dialog({
				autoOpen: false,
				modal: true,
				title: 'Notify via Encrypted Mail',
				width: 525,
				height: 430,
				buttons: {"Send Email": function() { encryptMail(); $(this).dialog("close")}, "Close": function() { $(this).dialog("close"); } }
			})

		var $dialogF = $('<div style="background: white;"></div>')
			.html(s)
			.dialog({
				autoOpen: false,
				modal: true,
				title: 'Notify via Encrypted SMS',
				width: 525,
				height: 430,
				buttons: {"Send Text": function() { sendSMS(); $(this).dialog("close")}, "Close": function() { $(this).dialog("close"); } }
			})

		$('#mail').click(function() {
			$dialogE.dialog('open'); document.getElementById("message").value = document.getElementById("load_matrix").innerHTML
			return false;
		});

		$('#sms').click(function() {
			$dialogF.dialog('open'); document.getElementById("sms_msg").value = document.getElementById("load_matrix").innerHTML
			return false;
		});
	});
	
	function chk() {
		var key = document.getElementById("key").value
	}

	function encrypt(matrix, cryptEngine) {
		var grid = document.getElementById("load_matrix")
		var enc_in = grid.innerHTML
		var key = document.getElementById("key").value
		var rad = document.getElementById("radio2").checked
		var encType = (rad  == true) ? "encode512_09AF_0010" : "encode512_09AF"
		var matrix = (matrix == 'flipCipherAll') ? 'decode' : encType
		key = (matrix == 'decode') ? document.getElementById("key2").value : document.getElementById("key").value
		if (key == "") key = document.getElementById("key2").value
		var qs = "key=" + key + "&matrix=" + matrix + "&load_matrix=" + enc_in + "&cryp=" + Math.random()*100000000000*Math.random()*1000000000000000000000000000 
		post_async(cryptEngine, qs, grid, 'no')
			var op = document.getElementById("opener")
			var mm = document.getElementById("mail")
			var ss = document.getElementById("sms")
			var ot = document.getElementById("intro")
			var mx = document.getElementById('load_matrix')
			var bx = document.getElementById('buttons')
			document.getElementById('count').style.display = 'none'

			mm.disabled = false
			op.style.display='none'
			mm.style.display='block'
			ss.style.display='block'
			ot.innerHTML = "Message Encrypted; Click on 'Send Message' to send this message securely to an email or cell phone via sms"
			bx.style.top = '555px'
			mx.disabled='true' 
			mx.style.color='silver' 
	}

function encryptMail()
	{
		var msg = document.getElementById("message").value
		var from = 'messaging@finggr.com'
		var to = document.getElementById("to").value
		var content = document.getElementById("content")
		var bx = document.getElementById('buttons')
		var m01 = document.getElementById("matrix01")
		var intro = document.getElementById("intro")
		var lmx = document.getElementById("load_matrix")

		var arrM = msg.split('|')
		var msg_a = arrM[1]
		var msg_b = arrM[0]
		
		var url = "x_send_mail.php?from=" + from + "&to=" + to + "&msg_a=" + msg

			var request = $.ajax({
			url: url,
			type: "GET",
			dataType: "html",
			cache: false,
			  complete: function(x) {
				m01.style.display = 'none'
				intro.style.display = 'none'
				lmx.style.display = 'none'
				c.innerHTML += "<center><font style='font-size:16px'>Message Sent!<br><br>Click Close to return to main page or<br>click the shield below to send a another message<br><br>"
				c.innerHTML += "<a href='javascript:window.location.reload()'><img src='images/shield.png' width=100px border=0></a></align>" 
				c.style.position = "absolute"
				c.style.top = "300px"
				bx.style.display = "none"
			}});

/*
		var request = $.ajax({
			  url: url,
			  dataType: 'jsonp',
			  data:  'id=10',
			  jsonp: 'jsonp_callback',
			  cache: 'None',
			  complete: function(x) {
				content.innerHTML = ""
				content.innerHTML += "Message Sent. Click Close to return to main page or<br>click 'New Message' to send a another message<br><br>"
				content.innerHTML += "<a href='javascript:window.location.reload()'><img src='new_message.png' width=100px border=0><br><br>[New Message]</a>" 
				content.style.position = "absolute"
				content.style.top = "300px"
				bx.style.display = "none"
			  }			  
		});
*/		
	}


function sendSMS()
	{
		var sms_to = document.getElementById("sms_to").value
		var msg = document.getElementById("sms_msg").value
		var content = document.getElementById("content")
		var m01 = document.getElementById("matrix01")
		var intro = document.getElementById("intro")
		var lmx = document.getElementById("load_matrix")
		
		var link = 'http://www.finggr.com/get_decode_key.php?q=' + msg + '&action=decode_512'
		var url = 'https://api.clockworksms.com/http/send.aspx?key=6408525f8f27b18fc59ee6c36c8c8c8bb5d2bb83&to=' + sms_to + '&content=' + link	
		var request = $.ajax({
			  url: url,
			  dataType: 'jsonp',
			  data:  'id=10',
			  jsonp: 'jsonp_callback',
			  cache: 'None',
			  complete: function(x) {
				m01.style.display = 'none'
				intro.style.display = 'none'
				lmx.style.display = 'none'
				
				c.innerHTML += "<center><font style='font-size:16px'>Message Sent!<br><br>Click Close to return to main page or<br>click the shield below to send a another message<br><br>"
				c.innerHTML += "<a href='javascript:window.location.reload()'><img src='images/shield.png' width=100px border=0></a></align>" 
				c.style.position = "absolute"
				c.style.top = "300px"
				document.getElementById("mail").style.display = 'none'
				document.getElementById("sms").style.display = 'none'
			  }			  
		});
		
	}
	
	function post_process(r, resp, m) {
		if (m == 'no') {
			r.innerHTML = resp

		} else {
			var x = r.innerHTML
			r.style.fontFamily = 'Poiret One'
			r.style.fontSize = '1.2em'
			r.style.color = 'red'
			var v = '! Close this window by clicking "Close"\r\n\r\nYou may copy Encrypted Message in the previous "Encrypt Window" to send mail using a regular mail client.'
			r.innerHTML = resp + v
		}
	}

	function post_async(f, q, r, m) {
		if (window.XMLHttpRequest) { xmlhttp=new XMLHttpRequest();} else  { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP") } 
			xmlhttp.onreadystatechange = function()	{ if (xmlhttp.readyState==4 && xmlhttp.status==200)	{ 
			msg_key = xmlhttp.responseText
			document.getElementById('progress').style.display = 'none'
			post_process (r, xmlhttp.responseText, m)
		} }
		xmlhttp.open( "POST", f + "php", true )
		xmlhttp.setRequestHeader( "Content-type","application/x-www-form-urlencoded" )
		xmlhttp.send( q )
	}

	function showModal(p,t)	{
		var m = window.showModalDialog(p, t, 'dialogWidth: 800px; dialogHeight: 800px; scrollbars: no; unadorned: yes; help: no; locationbar: no;');
	}
	


	function init()
	{
		var width = document.getElementById('main_content').style.width
		document.getElementById('main_content').style.left = (window_width()/2) - 400 + 'px'

	}
	
	function window_width()
	{
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

	function window_height()
	{
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
function dow() {
document.getElementById('load_matrix').style.border='0px solid white 0'
}

function count()
{
	var backup = document.getElementById('load_matrix').innerText
	backup = backup.substr(0,249)
	
	if (backup == '[Click Me to Start]') backup = ''
	var width = document.getElementById('load_matrix').innerText
	var x = 250-width.length
	
	if (x<0) x=0
	document.getElementById('count').innerHTML = '<font color=red>' + x + '</font> Characters Remaining'
	
	if (width.length == 250) 
	{
		document.getElementById('load_matrix').style.color='white'
	}
	
	if (width.length > 250) 
	{
		document.getElementById('load_matrix').innerText = backup	
	}

	if (width.length < 250) 
	{
		document.getElementById('load_matrix').style.color='white'
		document.getElementById('load_matrix').style.border='0px solid silver'
	}

	if (width.length > 175) 
	{
		document.getElementById('load_matrix').style.color='Orange'
	}

	if (width.length > 250) 
	{
		document.getElementById('load_matrix').style.color='Red'
		document.getElementById('count').style.background='Red'
	}
	else
	{
		document.getElementById('load_matrix').style.color='white'
		document.getElementById('count').style.background='none'

	}
	
	
}

</script>	


</head>	
<body bgcolor="#ffffff" topmargin=0 leftmargin=0 align=center onload="init()">
<!--
	font-family: 'Codystar', cursive;
	font-family: 'Fredericka the Great', cursive;
	font-family: 'Poiret One', cursive;
	font-family: 'Anaheim', sans-serif;
	font-family: 'Great Vibes', cursive;
	font-family: 'Monoton', cursive;
	font-family: 'Share Tech Mono', sans-serif;
	font-family: 'Medula One', cursive;
	font-family: 'Raleway Dots', cursive;
	font-family: 'Orbitron', sans-serif;
	font-family: 'Audiowide', cursive;
	font-family: 'Special Elite', cursive;
-->
<div id="main_content" style="position:absolute">
<div id="header" style="position:absolute;color:white;font-family: 'Poiret One', cursive; font-size:16px;top:100px;left:430px;max-width:230px;text-align:left">The strongest and safest encrypted messaging system on planet Earth</div>
<div id="header2" style="position:absolute;color:white;font-family: 'Poiret One', cursive; color:orange; font-size:16px;top:80px;left:430px;max-width:230px;align:left">Hack Proof</div>
<div id="header3" style="position:absolute;color:white;font-family: 'Poiret One', cursive; color:red; font-size:16px;top:160px;left:430px;max-width:230px;align:left">Subpoena Proof</div>
<div id="footer01" style="text-align:left;position:absolute;color:white;font-family: 'Poiret One', cursive; font-size:14px;top:710px;left:170px;width:800px;align:left">
	Multiple pass AES/Proprietary Encryption, Dual 1K Encryption keys<br>
	Message auto destruct<br>
	Subpoena proof - Messages never stored on server<br>
	Hack proof - A modern supercomputer would require 30 years to crack<br>
	We guarantee your privacy - we are the safest, and most private, period<br>
	Cellphone SMS integration
</div>
<div id="progress" style="position:absolute;top:410px;left:520px;z-index:10020;display:none;"><img src="images/progress.gif"></div>
<div id="footer02" style="text-align:left;position:absolute;color:white;font-family: 'Poiret One', cursive; font-size:15px;top:890px;color:black; left:50px;width:800px;text-align:center">
	api | careers | about us | privacy | user policy | headquarters | press | mission | advertize | affiliates<br><br><font size=2>© Copyright 2013, finggr.com. All rights reserved. Several Patents Pending.
</div>
<div style="position:absolute;top:680px;left:20px;">
	<img src="images/l4.png" width=130px>
</div>
<div style="position:absolute;top:684px;left:680px; opacity:0.7">
	<img src="images/corner.png" width=200px>
</div>
<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="640px">
  <tr>
   <td><img src="images/spacer.gif" width="190" height="1" alt="" /></td>
   <td><img src="images/spacer.gif" width="131" height="1" alt="" /></td>
   <td><img src="images/spacer.gif" width="431" height="1" alt="" /></td>
   <td><img src="images/spacer.gif" width="111" height="1" alt="" /></td>
   <td><img src="images/spacer.gif" width="1" height="1" alt="" /></td>
  </tr>
	
  <tr>
   <td colspan="4"><img name="index_alt_r1_c1" src="images/index_alt_r1_c1.png" width="863" height="221" id="index_alt_r1_c1" alt="" /></td>
   <td><img src="images/spacer.gif" width="1" height="221" alt="" /></td>
  </tr>
  <tr>
   <td><img src="index_r2_c1.png" width="190" height="411" id="index_alt_r2_c1" border="0" alt="" /></td>
   <td colspan=3 align=center style="background:url(images/mesh_s.gif)">
	<div id="h01" style="position:absolute;top:220px;left:-240px;width:100%"><img height=420px style="" src="images/handle.png"></div>
	<div id="h02" style="position:absolute;top:220px;left:408px;width:100%"><img height=420px style="" src="images/handle.png"></div>

   <div id="content" style="position:absolute;top:254px;left:322px;text-align:center;font-family:Poiret One;font-size:12px;">
		<div id="intro" style="font-family: 'Poiret One', cursive; font-size:16px;max-width:418px;color:white">CLICK on blue box and start typing your message below.<br><br>When done, click 'Encrypt Message'</div><br>
		<div style="position:absolute;top:10px;left:200px">
			<div id="load_matrix" onkeyup="count()" onClick="this.contentEditable='true';" style="border:0px solid rgba(0,255,255,0.2);width:404px;height:152px;top:71px;left:-209px;padding:20px;padding-top:30px;overflow-Y:auto;position:absolute;z-index:1001;word-wrap:break-word;font-family:Special Elite;color:white;max-height:182px;text-shadow:none;font-size:18px;text-align:left">Click Here to start typing...</div>
			<div id="m01" style="position:absolute;top:45px;left:-257px;width:100%"><img style="" src="images/scr.png"></div>
			<div id="m02" style="position:absolute;top:150px;left:-50px;width:100%; opacity:0.6"><img width=100px style="" src="images/l2.png"></div>
			<div id="m03" style="position:absolute;top:-235px;left:202px;width:100%"><img style="" src="images/search.png"></div>
			<div id="m04" style="position:absolute;top:75px;left:-216px;width:100%"><img style="" src="images/rivet.png"></div>
			<div id="m05" style="position:absolute;top:75px;left:202px;width:100%"><img style="" src="images/rivet.png"></div>
			<div id="m06" style="position:absolute;top:242px;left:-216px;width:100%"><img style="" src="images/rivet.png"></div>
			<div id="m07" style="position:absolute;top:242px;left:202px;width:100%"><img style="" src="images/rivet.png"></div>	
		</div>
	</div>
	 
	<div id='buttons2' style="position:absolute;top:565px;left:335px;">
			<div id="c_img" name="count" style="position:absolute;left:-90px;top:10px;width:255px;height:30px;font-family:Orbitron;font-size:14px;color:white">
				<img src="images/glass_small.png">
			</div>
			<div id="c" name="c" style="position:relative;top:10px;left:10px;width:255px;height:30px;font-family:Orbitron;font-size:14px;color:white">
				250 Characters Left 
			</div>
	</div>
			
	<div id='buttons' style="position:absolute;top:575px;left:575px">
		<input type="button" id="opener" value="ENCRYPT MESSAGE" style="border: 1px solid #333; height: 40px; width: 175px; font-family: 'Poiret One', cursive;font-size: 14px; color: #FFF;" class="sms"> 
		<input type="button" id="mail" value="SEND EMAIL" style="position:absolute;left:-100px;display:none;border: 1px solid white; height: 40px; width: 125px; font-family: 'Poiret One', cursive; font-size: 14px; color: white;" class="email">
		<input type="button" id="sms" value="SEND SMS" style="position:absolute;left:50px;display:none;border: 1px solid silver; height: 40px; width: 125px; font-family: 'Poiret One', cursive; font-size: 14px; color: white;" class="sms">
	</div> 
	<div style="display:none" id="radio" style="valign: center"><font color=Red face="Poiret One">Encrypt Level
		<input type="radio" id="radio1" name="radio" value="1"/><label for="radio1" id="b1" style="font-family: Poiret One; font-size: 1em">Normal Strength</label>
		<input type="radio" id="radio2" name="radio" value="2" checked="checked"/><label for="radio2" id = "b2" style="background: orange; font-family: Poiret One; font-size: 1em">Super Encrypt</label>
	</div>  

	</td>
   <td><img src="images/spacer.gif" width="1" height="411" alt="" /></td>
  </tr>
  </tr>
  <tr>
   <td colspan="4"><img name="index_alt_r3_c1" src="images/index_alt_r3_c1.jpg" width="863" height="56" id="index_alt_r3_c1" alt="" /></td>
   <td><img src="images/spacer.gif" width="1" height="56" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="index_alt_r4_c1" src="images/index_alt_r4_c1.png" width="863" height="132" id="index_alt_r4_c1" alt="" /></td>
   <td><img src="images/spacer.gif" width="1" height="132" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="index_alt_r5_c1" src="images/index_alt_r5_c1.png" width="863" height="45" id="index_alt_r5_c1" alt="" /></td>
   <td><img src="images/spacer.gif" width="1" height="45" alt="" /></td>
</tr>
</table>
</div>
<map name="m_index_alt_r2_c1" id="m_index_alt_r2_c1">
<area shape="rect" coords="56,305,140,335" href="about.php" alt="" />
<area shape="rect" coords="56,257,113,287" href="help.php" alt="" />
<area shape="rect" coords="56,205,113,238" href="why.php" alt="" />
<area shape="rect" coords="56,160,140,190" href="decode512.php" alt="" />
<area shape="rect" coords="56,112,113,142" href="encode_512.php" alt="" />
<area shape="rect" coords="56,60,125,90" href="index.php" alt="" />
</map>

</body>
</html>
