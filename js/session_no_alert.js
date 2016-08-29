var msid, m
setTimeout('pop()',250)
function pop() {
	if(getCookie('msid')) {
		msid = getCookie('msid')
		var n = urldecode(getCookie('msid'))
		n = n.split('|'); m = n[0];	c = n[1];
		msid = m
		if(document.getElementById("msid")) document.getElementById("msid").innerHTML = "<a href='send.php'><font color=black>" + format_sms(m) + "<font></a>"
		if(document.getElementById("long_code")) document.getElementById("long_code").innerHTML = "<a href='send.php'><font color=black>" + format_sms(c) + "</a>"
		if(document.getElementById("sub_menu_home")) document.getElementById("sub_menu_home").innerHTML = "<a class='active' href='members.php'>" + document.getElementById("sub_menu_home").textContent + "</a>"
		if(document.getElementById("loginout")) {
			document.getElementById("loginout").innerHTML = '<a class="btn btn-primary" href="#" onclick="do_logout()">SIGN OUT</a>'
			document.getElementById("logged_in_menu").innerHTML = '<ul class="nav"><li class="active"><a href="members.php"> ACCOUNT </a></li><li><a href="/support">SUPPORT</a></li><li><a href="pricing.php">PRICING</a></li><li><a href="contact.php">CONTACT</a></li></ul>'
		}
		if(document.getElementById("footer_menu")) {
		}
	} else {
		if(document.getElementById("sub_menu")) document.getElementById("sub_menu").style.display = 'none'
	}
}

function urldecode(str) {
   return decodeURIComponent((str + '').replace(/\+/g, '%20'));
}	

function delCookie(cname){
	var d = new Date();
	d.setTime(d.getTime());
	var expires = "expires="+d.toGMTString();
	document.cookie = cname + "=" + "" + "; " + expires;
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
	location.href='login.php'
}

