var login
var data_type
var password
var validate = true
var form_errors
var msid, m

setTimeout('pop()',250)
setTimeout('set_link()', 100)

function onMouseOverOut_header(Obj, sel) {
    setTimeout(function() { onMouseOverOut1_header(Obj, sel) }, 300);
}

function onMouseOverOut(Obj, sel) {
    setTimeout(function() { onMouseOverOut1(Obj, sel) }, 300);
}

function onMouseOverOut1_header(x,selected_one) {

    var ODiv = document.getElementById(x);
    var currBg = ODiv.style.background;
	if (selected_one) return false;
    if (x == "jTopBar_start") return false;
    if (x == "jTopBar_end") return false;

    if (ODiv.style.background.indexOf("red") < 0)
        ODiv.style.background = "red";
    else
    if (ODiv.style.background.indexOf("#f0f0f0") < 0)
            ODiv.style.background = "#f0f0f0";
}

function onMouseOverOut1(x,selected_one) {

    var ODiv = document.getElementById(x);
    var currBg = ODiv.style.background;
	if (selected_one) return false;
    if (x == "jTopBar_start") return false;
    if (x == "jTopBar_end") return false;

    if (ODiv.style.background.indexOf("red") < 0)
        ODiv.style.background = "red";
    else
    if (ODiv.style.background.indexOf("#f0f0f0") < 0)
            ODiv.style.background = "#f0f0f0";
}

function onMouseOverOutE(Obj,sel) {
    setTimeout(function() { onMouseOverOutE1(Obj, sel) }, 300);
}       

function onMouseOverOutE1(Obj) {
    var ODiv = document.getElementById(Obj);
    if (ODiv.style.border.indexOf("grey") < 0)
            ODiv.style.border = "1px solid grey";
    else
    if (ODiv.style.border.indexOf("silver") < 0)
            ODiv.style.border = "1px solid silver";

    if (ODiv.style.background.indexOf("white") < 0)
            ODiv.style.background = "white";
    else
    if (ODiv.style.background.indexOf("grey") < 0)
            ODiv.style.background = "grey";
}   

function pop() {
	if(getCookie('msid')) {
		msid = getCookie('msid')
		var n = urldecode(getCookie('msid'))
		n = n.split('|'); m = n[0];	c = n[1];
		msid = m
		if(document.getElementById("msid")) document.getElementById("msid").innerHTML = "<a href='send.html'><font color=black>" + format_sms(m) + "<font></a>"
		if(document.getElementById("long_code")) document.getElementById("long_code").innerHTML = "<a href='send.html'><font color=black>" + format_sms(c) + "</a>"
		if(document.getElementById("loginout")) {
			document.getElementById("loginout").innerHTML = '<a class="btn btn-primary" href="#" onclick="do_logout()">SIGN OUT</a>'
			document.getElementById("logged_in_menu").innerHTML = '<ul class="nav"><li class="active"><a href="members.html"> ACCOUNT </a></li><li><a href="/support">SUPPORT</a></li><li><a href="pricing.html">PRICING</a></li><li><a href="contact.html">CONTACT</a></li></ul>'
		}
		if(document.getElementById("footer_menu")) {
		}
	} else {
		if(document.getElementById("loginout")) {
			alert('Login Required!')
			location.href='login.html'
		}
	}
}

function urldecode(str) {
   return decodeURIComponent((str + '').replace(/\+/g, '%20'));
}	

function do_logout() {
	delCookie('msid')
	delCookie('USER_DATA')
	delCookie('SEND_SMS')
	delCookie('SEND_SMS_NAME')
	location.href='login.html'
}
  	$(function() {
	$( "#mobile1" ).autocomplete({
		source: "aes_demo.php",
		minLength: 0,
		html: true,
		select: function (event, ui) {alert()}
		});
	});
	

	var con_id = 1, k, n=1, p_n=0, ec
	var validate = true
	var ns
	var x6,cnt=0
	var m_to, me, you, t, s
 
	function fetch(a,b) {
		send_sms_c(a,b)
	}

	$(document).keydown(function(e){
		ec = e.keyCode
		if (e.keyCode == 13) send()
		k = String.fromCharCode(ec)
	})

			var stripe_custom0 = 'stripe_custom0'	
			var stripe_custom = 'stripe_custom'	
			
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

			function get_favourites() {
				//if (!x) x = 1	
				var url = 'x_get_sms_favourites.php?mob=' + getCookie('mobile') + '&page=' + page
					var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						document.getElementById('link').innerHTML = msg
					}
				})
			}

			function del_con(mob, my_mobile) {
				if (!my_mobile) my_mobile = getCookie('mobile')
				var url = 'x_sms_del_contacts.php?mob=' + mob + '&my_mobile=' + my_mobile
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if(!msg.trim()) {
							alert('Contact deleted Successfully!')
							location.reload()
						} else {
							alert(msg.trim())
						}
					}
				})
			}

			function del_favs(m) {
				var url = 'x_sms_del_favs.php?mob=' + m
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (!msg.trim()) {
							alert('User removed from favourites successfully!')
							location.reload()
						} else {
							alert( msg )
						}
					}
				})
			}

			function add_block(mob, my_mobile) {
				if (!my_mobile) my_mobile = getCookie('mobile')
				var url = 'x_add_block.php?mob=' + mob + '&my_mobile=' + my_mobile
				console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg.trim())
					}
				})
			}
			
			function add_fav(m) {
				var url = 'x_add_fav.php?mob=' + m + '&my=' + getCookie('mobile')
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg.trim())
					}
				})
			}
					
			function show_hide(x) {
					if (document.getElementById('b' + x).style.display=='none') {
							document.getElementById('b' + x).style.display='block'
							document.getElementById('c' + x).style.display='block'
						} else {
							document.getElementById('b' + x).style.display='none'
							document.getElementById('c' + x).style.display='none'
						}
				}
			function get_contacts() {
					if (!page) page = 1
					var url = 'x_get_sms_contacts.php?mob=' + getCookie('mobile').trim() + '&page=' + page
					var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						document.getElementById('link').innerHTML = msg
					}
				})
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

	function set_link(x) {
		
		msid = getCookie('msid')
		msid = msid.replace('%7C','|')
		var msin = msid.split('|')
		msid = getCookie('mobile')
	
		if (msid.length > 1) {
			get_contacts(msid)
		} else {
			if (x) alert('Must login to use this function.')
			location.href='login.html'
		}
	}	

	function send_sms(f) {
		setCookie('SEND_SMS', f)
		setCookie('chat_with', f)
		var counter = 1
		var windowObjectReference = window.open("x_sms_send_mini.php?to_mobile=" + f, f, "width=400, height=600, menu=no, addressbar=no, status=no, location=no, titlebar=no, toolbar=no, scrollbars, resizeable=no")
	}

	function ck() {
		alert(getCookie('SEND_SMS'))	
	}

				if(getCookie('msid')) {
					msid = getCookie('msid')
					var n = urldecode(getCookie('msid'))
					n = n.split('|'); m = n[0];	c = n[1];
					msid = m
				}
			
			function init() {
				var points_balance = getCookie('points_balance')
				document.getElementById('credits').innerHTML = '<font style="color: skyblue"><b>' + points_balance + '</b></font>'
				get_account_status()
				
			}
		var s
		function get_account_status() {
			var url = 'x_sms_get_account_status.php?mobile=' + msid + '&s=67254768324678326hwefjekr8943758943'
			var request = $.ajax({
			url: url,
			type: "GET",
			dataType:'html',
			cache: false,
			success: function(msg) {
					if (msg != '') {
						var m = msg.split('|')
						var t = m[1]
						var ms = t.split('<br>')
						ms = ms[0]
						s = m[0]
						document.getElementById('status').innerHTML = ms
					}
				}
			})
		}
						
			function validate_form()
			{
				validate = true
				var n = document.getElementById('name')
				var e = document.getElementById('email')
				var p = document.getElementById('password')
				validate_field(e,'Email already in use. Please enter another email.')
				
				if ((n.value.length == 0)||(n.value.split(' ').length < 2)){
					validate = false
					show_error(n,'Please enter a valid first and last name')
				}
				if (e.value.length == 0) {
					validate = false
					show_error(e,'Please enter a valid email address')
				}
				validate = is_valid_email(e)
				
				if (p.value.length == 0){
					validate = false
					show_error(p)
				}
				if (validate == true) 
					{
						save_profile()
					}
					else return false
				}

			function save_profile()
			{
				var x = ''
				x += 'name=' + document.getElementById('name').value
				x += '&email=' + document.getElementById('email').value
				x += '&password=' + document.getElementById('password').value 
				x += '&mobile=' + msid 
				var url = 'x_edit_profile.php?' + x
				var request = $.ajax({
				url: url,
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
						if (!msg.trim()) {
							document.getElementById('link').innerHTML = '<span><font color=maroon>Profile Updated Successfully.</font></span>'
							document.getElementById('link').style.background = 'lightblue'
							document.getElementById('link').style.padding = '10px'
						} else {
							document.getElementById('link').innerHTML = "<h1><font style='color:white;font-size:24px'><br>ERROR: PROFILE NOT SAVED!</font></h1><font style='color:white;font-size:20px'>MESSAGE: " + msg
							document.getElementById('link').style.background = 'orange'
							document.getElementById('link').style.border = '2px solid red'
							
						}
					}
				})
			}

		function validate_field(f) {
				if (f.id=='email') is_valid_email(f)
				var e = f.value + ' Already Exists. <a href="login.html">Login</a> Instead?'
				if (f.value.length > 0) 
				{
					
					var x = ''
					var r = f.id + '_err'
					var t = r + '_txt'
					var i = f.value
					if (f.id == 'mobile') i = number
					r = document.getElementById(r)
					t = document.getElementById(t)

					var url = 'x_validate_field.php?d=' + f.id + '&i=' + i
					var request = $.ajax({
					url: url,
					type: "GET",
					dataType:'html',
					cache: false,
					success: function(msg) {
							if (msg != '0') 
							{
								validate = false
								ns = false
								f.style.border = '2px solid red'
								show_error(f)
								r.style.display = ''
								t.innerHTML = e
								return false
							}
							else
							{
								ns = true
							}
						}
					})
				}		
			}


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
			function chk_cookie() {

					document.getElementById("rem").style.height = 0.7 * screen.availHeight + 'px'
					if(getCookie('STRIPE_PAYMENT_STATUS')) {
					var u = urldecode(getCookie('USER_DATA'))
					u = u.split('|')
					var v = urldecode(getCookie('STRIPE_PAYMENT_STATUS'))
					var msgs_added = urldecode(getCookie('msgs_added'))
					var package_desc = urldecode(getCookie('package_desc'))
					var bal = urldecode(getCookie('points_balance'))
					var f=v.split('|')
					var str = ''
					str = str + '<table id="payment_conf" onclick="close_me()" style="width:100%; cursor: hand;cursor: pointer" cellpadding=10 border=0>'
					str = str + '<tr style="border-bottom:1px solid lightblue;height:30px;background: black"><td colspan=2 style="width:100%; color: #fff; text-shadow:1px 0px 1px #333; font-size:0.9em" class="stripe_custom5"><span><a href="#" onclick="hide()"><img src="av/close.png"></a></span>&nbsp;&nbsp;<span><font style="font-size:16px;color:#000;text-shadow: 0px 1px #fff">PAYMENT SUCCESSFUL! Thank You for your business</font></span></td></tr>'
					str = str + '<tr style="border-bottom:1px solid lightblue;background:#f0f0f0;height:30px"><td style="text-align:right; width:40%; color: #000; text-shadow:1px 0px 1px #fff; font-size:0.9em">TRANSACTION ID: </td><td style="text-align:left; width:60%; color: grey; text-shadow:1px 0px 1px #fff; font-size:0.9em">' + f[0] + '</td></tr>'
					str = str + '<tr style="border-bottom:1px solid lightblue;background:#f0f0f0;height:30px"><td style="text-align:right; width:40%; color: #000; text-shadow:1px 0px 1px #fff; font-size:0.9em">DESCRIPTION: </td><td style="text-align:left; width:60%; color: grey; text-shadow:1px 0px 1px #fff; font-size:0.9em">' + package_desc + '</td></tr>'
					str = str + '<tr style="border-bottom:1px solid lightblue;background:#f0f0f0;height:30px"><td style="text-align:right; width:40%; color: #000; text-shadow:1px 0px 1px #fff; font-size:0.9em">AMOUNT SPENT: </td><td style="text-align:left; width:60%; color: grey; text-shadow:1px 0px 1px #fff; font-size:0.9em"> $ ' + f[2] + '</td></tr>'
					str = str + '<tr style="border-bottom:1px solid lightblue;background:#f0f0f0;height:30px"><td style="text-align:right; width:40%; color: #000; text-shadow:1px 0px 1px #fff; font-size:0.9em"># MESSAGES ADDED: </td><td style="text-align:left; width:60%; color: grey; text-shadow:1px 0px 1px #fff; font-size:0.9em">' + msgs_added + '</td></tr>'
					str = str + '<tr style="border-bottom:1px solid lightblue;background:#f0f0f0;height:30px"><td style="text-align:right; width:40%; color: #000; text-shadow:1px 0px 1px #fff; font-size:0.9em">TOTAL BALANCE: </td><td style="text-align:left; width:60%; color: grey; text-shadow:1px 0px 1px #fff; font-size:0.9em">' + bal + ' Messages</td></tr>'
					str = str + '<tr style="border-bottom:1px solid lightblue;#f0f0f0;background:#f0f0f0;height:30px"><td style="text-align:right; width:40%; color: #000; text-shadow:1px 0px 1px #fff; font-size:0.9em">EXPIRES: </td><td style="text-align:left; width:60%; color: grey; text-shadow:1px 0px 1px #fff; font-size:0.9em"> In 1 Month</td></tr>'
					str = str + '</table>'
					console.log(str)
					delCookie('STRIPE_PAYMENT_STATUS')
					document.getElementById("modal").style.display='block'
					document.getElementById("transaction").style.display='block'
					document.getElementById("transaction").innerHTML = str
			}
		}
		
		function close_me() {
			document.getElementById('payment_conf').style.display='none'
			document.getElementById('modal').style.display='none'
			document.getElementById('transaction').style.display='none'
		}
		function switch_me() {
			document.getElementById('avatar').style.display='none'
			document.getElementById('fields').style.display='block'
		}
		
		function switch_back() {
			document.getElementById('avatar').style.display='block'
			document.getElementById('fields').style.display='none'
		}
		
		function format_sms(objSMS) {
			return ' (' + objSMS.substr(1,3) + ') ' + objSMS.substr(4,3) + '-' + objSMS.substr(7,4)
		}
			
		function delCookie(cname)
		{
			var d = new Date();
			 d.setTime(d.getTime());
			var expires = "expires="+d.toGMTString();
			document.cookie = cname + "=" + "" + "; " + expires;
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
		
		function do_logout() {
			delCookie('msid')
			delCookie('USER_DATA')
			location.href='login.html'
		}
		
		function urldecode(str) {
		   return decodeURIComponent((str + '').replace(/\+/g, '%20'));
		}	
		
		function setCookie(cname,cvalue,exdays)
		{
			var d = new Date();
			 d.setTime(d.getTime()+(exdays*24*60*60*1000));
			var expires = "expires="+d.toGMTString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
		 }
