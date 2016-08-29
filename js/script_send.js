	setTimeout('pop()', 100)
	setTimeout('link()', 100)

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
			//document.all.xmessage.value = ''
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
		function show_error(f,i)
			{
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
			function clear_error(f)
			{
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
			
     function send(m,f, message){
        m_to = document.getElementById('mobile').value
		if (message.value == '') {
            show_error(message)
          }

		  if (m.value == '') {
            show_error(m)
          }
        
        if (f.value == '') {
          show_error(f)
        }
        
        if (m.value.length < 11) {
          mo = '1' + document.getElementById('mobile').value
        }
        else {
          mo = document.getElementById('mobile').value
        }

		if (!message.value) return false
        if (!m.value) return false
        if (!f.value) return false
	
		document.getElementById('gears').style.display = 'block'
		document.getElementById('send_button').style.display='none'

		mo=mo.replace("(","")
		mo=mo.replace(")","")
		mo=mo.replace(" ","")
		mo=mo.replace("-","")
		mo=mo.replace(".","")

		var from_h = document.getElementById('from_h').value
		from_h=from_h.replace("(","")
		from_h=from_h.replace(")","")
		from_h=from_h.replace(" ","")
		from_h=from_h.replace("-","")
		from_h=from_h.replace(".","")

          var url = 'x_send_sms.php?to=' + mo + '&from=' + from_h + '&message=' + message.value.trim()
		  var request = $.ajax({
                url: url,
                type: "GET",
                dataType: "html",
                cache: false,
                success: function(msg) {
                  if (msg=="ERROR: Message not sent. You Must Register First") {
					  alert(msg)
					  return false
                  } else {
						window.location.href='history.php'
					}
				}
			})
		}
      
      function show_messages(from_long_code,to_long_code) {
        document.getElementById('5grid').style.display='none'
          document.getElementById('link').style.display='none'
              document.getElementById('messenger').style.display='block'
				document.getElementById('to_from').style.display='block'
                  get_messages_by_user(from_long_code,to_long_code)
		}
      
      function get_messages_by_user(from_long_code,to_long_code) {
        var url = 'x_sms_all_messages.php?from_long_code=' + from_long_code + '&to_long_code=' + to_long_code
            var request = $.ajax({
              url: url,
              type: "GET",
              dataType: "html",
              cache: false,
              success: function(msg) {
                document.getElementById('all_messages').innerHTML = msg
              }
            })
		}
      		
		function show_detail(m,to) {
			me = m
			you = to
			document.getElementById('send_box').style.display = ''
			var url = 'x_sms_all_messages.php?mobile=' + m + '&to=' + you
			var request = $.ajax({
				url: url,
				type: "GET",
				dataType: "html",
				cache: false,
				success: function(msg) {
					var objCon = document.getElementById('content')
					objCon.innerHTML = msg
					s = setTimeout('set_scroll()', 500)
					t = setTimeout('show_detail(' + me + ',' + you + ')', 1000)
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
						document.getElementById('content').innerHTML = '<table id="link" class="stripe_table">' + msg + '</table>'
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
						document.getElementById('content').innerHTML = '<table id="link" class="stripe_table">' + msg + '</table>'
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
		

	function get_user(m) {
	if (!document.getElementById('mobile_name')) {
		var url = 'x_sms_id.php?mobile=' + m.value
		if (m.value) {
			var request = $.ajax({
			url: url,
			type: "GET",
			dataType: "html",
			cache: false,
			success: function(msg) {
			if (msg.indexOf('Invalid') > 0) msg = 'MOBILE USER'
				if (document.getElementById('mobile').value != '') {
					//document.getElementById('to_name').innerHTML = '<div><a href="#" class="button alt"> SEND TO: </a><span class=button>' + format_sms(m.value) + '</span>' + '<span class=button5>' + msg + '</span></div>'
					document.getElementById('mobile').value = "<font color=lightblue>" + msg + "</font>"
					document.getElementById('mobile_name').innerHTML = format_sms(m.value)
					document.getElementById('message').value = document.getElementById('message').value.trim()
					
				} else {
					show_error(document.getElementById('mobile'))
				}
			}})
		}
	}
	}

	function put_user(m,n) {
		document.getElementById('mobile').value = format_sms(m.value)
		document.getElementById('mobile_name').innerHTML = '<font style="color: skyblue">' + n + '</font>'
		document.getElementById('message').value = document.getElementById('message').value.trim()
	}

	function delCookie(cname) {
		var d = new Date();
		 d.setTime(d.getTime());
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + "" + "; " + expires;
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
		for(var i=0; i<ca.length; i++) {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
		}
		return "";
	}

	function show_number() {
		setTimeout('s_number()',1000)
	}
	
	function s_number() {
		document.getElementById('message').innerHTML = ""
		document.getElementById('from').innerHTML = '<div style=";margin-left:50px">FROM </div><div class="btn" disabled style="width:150px;margin-left:50px;border:inset 1px solid #f0f0f0;"><font color="#fff">' + format_sms(msid) + '</font></div>' 
		document.getElementById('from_h').value =  msid 
	}

	function resize_canvas() {
		var mn = document.getElementById("main").style
		var mc = document.getElementById("content").style
		var mh = objH - 190
		mn.height = mh + 'px'
		mc.height = mh - 100 + 'px'
		
	}
	
	function link() {
			var mob = document.getElementById('mobile')
			var nam = getCookie('SEND_SMS_NAME')
			show_number()
			if (getCookie('SEND_SMS')) {
				document.getElementById('mobile').value = getCookie('SEND_SMS')
				if (!nam) {
					get_user(mob)
				} else {
					put_user(mob, nam)
				}
				delCookie('SEND_SMS')
				delCookie('SEND_SMS_NAME')	
		}
	}