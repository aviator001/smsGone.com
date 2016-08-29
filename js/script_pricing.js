	var intro_title
	var pkg = getCookie('package')
	var pkg_desc = getCookie('package_desc')
	var pkg1 = document.getElementById('x7')
	var pkg2 = document.getElementById('x8')
	var pkg3 = document.getElementById('x9')
	var plan_h = document.getElementById('plan_h')
	var selected
	setTimeout('c_package()', 100)
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

	if (!pkg_desc.trim() || (!pkg)) {
		pkg_op = '1'
		intro_title = '<h3>Select a Plan to Continue</h3>'
	} else {
		pkg_op = '0.2'
		intro_title = '<h3>Almost Finished!</h3>'
	}
		
	function bridge() {
		setCookie('bridge', 'pricing.html')
		location.href='index.php#pricing'
	}

	function setCookie(cname,cvalue,exdays)	{
		var d = new Date();
		d.setTime(d.getTime()+(exdays*24*60*60*1000));
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + cvalue + "; " + expires;
	 }

	function delCookie(cname) {
		var d = new Date();
		 d.setTime(d.getTime());
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + "" + "; " + expires;
	 }
		
	function c_package() {
		document.getElementById('plan_heading').innerHTML = '<div class="btn btn-block btn-info" style="text-align:left">You have selected the <b>' + urldecode(pkg_desc) + '</b></div> <div><a href="#" onclick="bridge()"><font style="color:#333"><br>Or, Click Here to Select a <b>Different</b> Package</font></a></div><div class="delimiter"></div>'			
		if (pkg == 'x7') {
			selected = 'x7'
		}
		if (pkg == 'x8') {
			selected = 'x8'
		}
		if (pkg == 'x9') {
			selected = 'x9'
		}
		
		document.getElementById('plan_heading2').innerHTML = '<div class="btn btn-block btn-info" style="text-align:left">No Plan Selected. Please select a plan from the 3 plans listed below:</div><br><br>'
		document.getElementById('plan_heading1').innerHTML = intro_title
		document.getElementById('x7').style.opacity = pkg_op
		document.getElementById('x8').style.opacity = pkg_op
		document.getElementById('x9').style.opacity = pkg_op
		if (selected) {
			document.getElementById('pre_selected').style.display = 'block'
			document.getElementById(selected).style.opacity = '1'
			document.getElementById(selected).style.background = '#f0f0f0'
		}
	}		
	
	var r = 0, g=255, b=0, t, op = 1
	function glow() {
		document.getElementById(selected).style.cursor = 'pointer'
		document.getElementById(selected).style.border = '1px solid RGBA(' + 255 + ',' + 0 + ',' + 0 + ',' + op + ')'
		if (op > 0) {
			op = op - 0.005
			t = setTimeout('glow()', 1)
		} else {
			op = 1
			clearTimeout(t)
			glow()
		}
	}
	
	function glow2() {
		document.getElementById(selected).style.border = '1px solid RGB(' + r + ',' + 50 + ',' + 100 + ')'
		document.getElementById(selected).style.opacity = op
		if (r < 220) {
			r++
			g--
			b++
			if (op <0.7) op = 1
			op = op - 0.01
			t = setTimeout('glow()', 1)
		} else {
			r=0
			g=255
			b=0
			op = 1
			clearTimeout(t)
			glow()
		}
	}