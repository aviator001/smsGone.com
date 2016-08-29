	var con_id = 1, k, n=1, p_n=0, ec
	var validate = true
	var ns
	var x6,cnt=0
	var m_to, me, you, t, s, objH
	var e_windowObjectReference
	
		if (window_height() < screen.height) objH = window_height()
			else objH = screen.height

		function window_height() {
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

		$(document).keydown(function(e) {
			ec = e.keyCode
			if (e.keyCode == 13) send()
			k = String.fromCharCode(ec)
		})
			
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
			var msid = "<?php echo $_SESSION['msid']; ?>"
		}	
		
		function do_logout() {
			delCookie('msid')
			delCookie('USER_DATA')
			set_link()
			location.href='login.php'
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
			
			function send(msg) {
				var msg = document.all.xmessage.value
				document.all.xmessage.value = ''
				if (!me) me = my_number()
				var url = 'x_send_sms.php?to=' + you + '&from=' + me + '&message=' + msg
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						show_detail(me,you)
					}
				})
			}

			function resize_canvas() {
				var mn = document.getElementById("main").style
				var mc = document.getElementById("content").style
				var mh = objH - 125
				mn.height = mh + 'px'
				mc.height = mh - 100 + 'px'
			}		
			
			function show_detail(m,to) {
				me = m
				you = to
				document.getElementById('send_box').style.display = ''
				document.getElementById('message_header').style.display = ''
				document.getElementById('pre_head').style.display = ''
				document.getElementById('head').style.display = ''
				document.getElementById('head').innerText =  to
				var url = 'x_sms_all_messages.php?mobile=' + m + '&to=' + to
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
			
			function get_messages() {
				set_link()
				if(getCookie('msid')) {
					var m = getCookie('msid')
					m = m.replace('%7C','|')
					m=m.split('|')
					var mo = m[0]
					var lc = m[1]
					my_mobile = mo
					check_new_messages()
					get_sub_info(mo)
					document.getElementById('msid').innerHTML = format_sms(mo)
					document.getElementById('long_code').innerHTML = format_sms(lc)
				} else {
					alert('Login Required!')
					location.href='login.php'
				}
			}
			
			function format_sms(objSMS) {
				return ' (' + objSMS.substr(1,3) + ') ' + objSMS.substr(4,3) + '-' + objSMS.substr(7,4)
			}
			
			function get_sub_info(m) {
				var url = 'x_sms_get_account_status.php?mobile=' + m
				console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						document.getElementById('subs_info').innerHTML = msg
					}
				})
			}

			function add_fav(m) {
				var url = 'x_add_fav.php?mobile=' + m
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg)
					}
				})
			}

			function add_con(m, n) {
				var url = 'x_add_con.php?mobile=' + m + '&name=' + n
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg)
					}
				})
			}

			function add_block(m) {
				var url = 'x_add_block.php?mobile=' + m
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg)
					}
				})
			}

			function add_unblock(m) {
				var url = 'x_add_unblock.php?mobile=' + m
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg)
					}
				})
			}

			function del_call_log(m) {
				var url = 'x_del_call_log.php?mobile=' + m
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (!msg.trim()) {
							location.reload()
						} else {
							alert(msg)
						}
					}
				})
			}

			function del_all_logs(my_mobile) {
				var url = 'x_del_all_logs.php?my_mobile=' + my_mobile
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

			function change_long_code(my_mobile, my_long_code) {
				var url = 'x_change_long_code.php?my_mobile=' + my_mobile + '&my_long_code=' + my_long_code
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (msg) {
							var new_long_code = msg
							alert(new_long_code)
						} else {
							alert ('Error processing your request. Please contact Customer Service')
						}
					}
				})
			}

			function get_user(m) {
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
	
			function pause_edit(obj, i) {
				clear_all_timers()
				obj.contentEditable = true
			}
			
			function edit_contact(objCon, i) {
				var name = objCon.textContent
				var m = document.getElementById('contact_number_' + i).value
				var url = 'x_update_contact.php?mobile=' + m + '&name=' + name
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert(msg)
					}
				})

			}
			
			function clear_all_timers() {
				var maxId = setTimeout(function(){}, 0);
				for(var i=0; i < maxId; i+=1) { 
					clearTimeout(i);
				}		
			}
			
			function openRequestedPopup(mob) {
				setCookie('chat_with', mob)
				var counter = 1
				var windowObjectReference = window.open("mini_chat.php?mob=" + mob, mob, "width=400, height=600, menu=no, addressbar=no, status=no, location=no, titlebar=no, toolbar=no, scrollbars, resizeable=no");
			}
			

			function send_photo(pid, mob) {
				setCookie('chat_with', mob)
				var counter = 1
				e_windowObjectReference = window.open("g/x_sms_encrypt.php?mob=" + mob + "&type=" + pid , "width=400, height=600, menu=no, addressbar=no, status=no, location=no, titlebar=no, toolbar=no, scrollbars, resizeable=no");
			}
			

			function edit_profile() {
				document.getElementById('div_welcome').style.display='none'
				document.getElementById('div_logo').style.display='none'
				document.getElementById('div_profile').style.display='block'
				var a
				var mobile = my_mobile
				var url = "x_profile_data.php?mobile=" + mobile;
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (msg) {
							var profile_data = msg.split('|')
							document.getElementById('email').value = profile_data[1]
							document.getElementById('profile').value = profile_data[2]
							document.getElementById('name').value = profile_data[0].trim()
							document.getElementById('password').value = profile_data[3]

						} else {
							alert('Profile not found!')
						}
					}
				})
			}
			
			function save_profile() {
				var mobile = my_mobile
				var a = mobile + '&email=' + document.getElementById('email').value + '&profile=' + document.getElementById('profile').value + '&name=' + document.getElementById('name').value + '&password=' + document.getElementById('password').value 
				var url = 'x_edit_profile.php?mobile=' + a
				console.log(url)
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						alert('Success')
						document.getElementById('div_welcome').style.display='block'
						document.getElementById('div_logo').style.display='block'
						document.getElementById('div_profile').style.display='none'
					}
				})
			}
			

