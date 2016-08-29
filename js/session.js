	location.href='g/x_photos.php'

	var msid, m
setTimeout('pop()',250)
setTimeout('check_new_messages()',250)
function pop() {
	if(getCookie('msid')) {
		msid = getCookie('msid')
		var n = urldecode(getCookie('msid'))
		n = n.split('|'); m = n[0];	c = n[1];
		msid = m
		
		var user_data = urldecode(getCookie('USER_DATA'))
		user_data = user_data.split('|')
		var name = user_data[5]
		var lc = user_data[6]
		var points_balance = user_data[8]
		if(document.getElementById("name")) document.getElementById("name").innerHTML = "<a class='active' href='#'>" + name + "</a>"
		if(document.getElementById("points_balance")) document.getElementById("points_balance").innerHTML = "<a class='active' href='#'>" + points_balance + "</a>"
		
		if(document.getElementById("msid")) document.getElementById("msid").innerHTML = "<a class='active' href='send.php'>" + format_sms(m) + "<font></a>"
		if(document.getElementById("long_code")) document.getElementById("long_code").innerHTML = "<a class='active' href='send.php'>" + format_sms(c) + "</a>"
		if(document.getElementById("sub_menu_home")) document.getElementById("sub_menu_home").innerHTML = "<a class='active' href='members.php'>" + document.getElementById("sub_menu_home").textContent + "</a>"
		if(document.getElementById("loginout")) {
			document.getElementById("loginout").innerHTML = '<a class="btn btn-primary" href="#" onclick="do_logout()">SIGN OUT</a>'
			document.getElementById("logged_in_menu").innerHTML = '<ul class="nav"><li class="active"><a href="members.php"> ACCOUNT </a></li><li><a href="/support">SUPPORT</a></li><li><a href="contact.php">CONTACT</a></li></ul>'
		}
		if(document.getElementById("footer_menu")) {
		}
	} else {
//		if(document.getElementById("sub_menu")) document.getElementById("sub_menu").style.display = 'none'
//		if(document.getElementById("loginout")) {
//			alert('Login Required!')
//			location.href='login.php'
		}
	}
}

function terms() {
var url = 'x_get_terms.php'
	var request = $.ajax({
	  url: url,
	  type: "GET",
	  dataType: "html",
	  cache: false,
	  success: function(msg) {
		document.getElementById('legal').style.display = 'block'
		document.getElementById('terms').style.position = 'absolute'
		document.getElementById('terms').style.display = 'block'
		document.getElementById('terms').style.maxHeight = '85%'
		document.getElementById('terms').style.maxWidth = '50%'
		document.getElementById('terms').innerHTML = msg
	  }
	})
}

function privacy() {
var url = 'x_get_terms.php'
	var request = $.ajax({
	  url: url,
	  type: "GET",
	  dataType: "html",
	  cache: false,
	  success: function(msg) {
		document.getElementById('legal').style.display = 'block'
		document.getElementById('terms').style.position = 'absolute'
		document.getElementById('terms').style.display = 'block'
		document.getElementById('terms').style.maxHeight = '85%'
		document.getElementById('terms').style.maxWidth = '50%'
		document.getElementById('terms').innerHTML = msg
	  }
	})
}


		
function urldecode(str) {
   return decodeURIComponent((str + '').replace(/\+/g, '%20'));
}	

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

function do_logout() {
	delCookie('msid')
	delCookie('chat_with')
	delCookie('USER_DATA')
	delCookie('SEND_SMS')
	delCookie('SEND_SMS_NAME')
	delCookie('KEEP_LOGGED_IN')
	if(location.href='login.php') location.href='login.php'
		else location.href='../login.php'
}

	function openRequestedPopup(mob) {
		setCookie('chat_with', mob)
		var counter = 1
		var windowObjectReference = window.open("mini_chat.php?long=" + mob, mob, "width=400, height=600, menu=no, addressbar=no, status=no, location=no, titlebar=no, toolbar=no, scrollbars, resizeable=no");
	}
	
			var timx
			var op = 0
			var y_axis = 1
			var toast = []
			var dismissed = 0
			var my_mobile = ""
			
			function check_new_messages() {
				var url = 'http://shadowsms.com/x_sms_get_new_messages.php?mobile=' + my_mobile + '&rjs=' + Math.random() * 1000000000000000000000
				console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (msg.trim() != '') {
									toast = document.getElementById('toast')
									toast.innerHTML = msg
									toast.style.display = 'block'
									toast.style.opacity = op
									toast.style.position = 'absolute'
									toast.style.zIndex = '9999999999'
									toast.style.top = '0px'
									show_box()
									setTimeout('hide_box()', 10000)
						} 
							setTimeout('check_new_messages()', 30000)
					}
				})
			}
			
			function show_box() {
				if (op < 1) {
					op = op + 0.05
					if (y_axis < 100) {
						y_axis = y_axis + 1
						toast.style.top = y_axis + 'px'
					} 
					toast.style.opacity = op
					
					timx = setTimeout('show_box()', 10)
				} else {
					clearTimeout(timx)
					op = 1
					y_axis = 0
				}
			 }
			
			function hide_box() {
				if (op > 0) {
					op = op - 0.01
					toast.style.opacity = op
					timx = setTimeout('hide_box()', 10)
				} else {
					clearTimeout(timx)
				}
			 }
			
			function dismiss(obj) {
				obj.style.display = 'none'
				dismissed = 1
			}
