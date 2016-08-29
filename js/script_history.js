	var msgs
	var new_msgs
	setTimeout('get_messages()', 100)
	setTimeout('check_new_messages()', 100)
	
	var con_id = 1, k, n=1, p_n=0, ec
	var validate = true
	var ns
	var x6,cnt=0
	var m_to, me, you, t, s, objH

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
			
			function send(msg) {
				var msg = document.all.xmessage.value
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
		
			function show_detail(m, to)
			{
				me = m
				you = to
				to = to * 1
				chats[to] = 1
				setCookie('chat_with', you)
				me = msid
				you = getCookie('chat_with')
				var url = 'x_sms_all_messages.php?mobile=' + m + '&to=' + you
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (!msg) alert('Error!')
							if (msg != c[to]) {
								console.log(msg.length)
								document.getElementById(to).style.display='block'
								document.getElementById(to).innerHTML = msg
								t[to] = setTimeout('show_detail(' + m + ',' + to + ')', 3000)
								s[to] = setTimeout('set_scroll(' + to + ')', 3000)
								c[to] = msg
							}
					}
				})
			}
					
			function set_scroll(to) {
				var objCon = document.getElementById(to)
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
							document.getElementById('link').innerHTML =  msg 
							resize_canvas()
						}
					})
				} else {
						document.getElementById('msid').innerHTML = "<span style='font-size:20px; color: #00B2B2'> LOGIN TO CONTINUE</span>"
						alert('Must Login Again')
						location.href='login.html'
				}
			}
			var block = 'block'
			
			function help(x, n, j) {
			var user = getCookie('chat_with')
			var objHelp = document.getElementById('help-text-' + (j * 1 - 1))
			objHelp.style.color = '#333'
			objHelp.style.background='lightblue'
			objHelp.style.textShadow = '1px 0px 0px #fff'
			objHelp.style.border = '1px solid grey'
			objHelp.style.fontSize = '14px'
			objHelp.style.padding = '5px'
			objHelp.style.display = 'block'

				if (x==0) {
					objHelp.innerHTML = 'Delete all conversations with ' + n
				}
				if (x==1) {
					objHelp.innerHTML = 'Add ' + n + ' to your favourites'
				}
				if (x==2) {
					objHelp.innerHTML = 'Save ' + n + ' to your address book'
				}
				if (x==3) {
					objHelp.innerHTML = 'Block ' + n
				}
				if (x==4) {
					objHelp.innerHTML = 'Send ' + n + ' an SMS'
				}
				if (x==5) {
					objHelp.innerHTML = 'Edit Contact'
				}
				if (x==6) {
					objHelp.innerHTML = 'Purchase a 1 day pass!'
				}
			}

			function help_out(x, j) {
				var objHelp = document.getElementById('help-text-' + (j * 1 - 1))
				objHelp.style.display = 'none'
			}

			function get_messages() {
				var m = getCookie('msid')
				m = m.replace('%7C','|')
				m=m.split('|')
				var mo = m[0]
				var lc = m[1]
				check_new_messages()
				if(mo) {
					var url = 'x_sms_get_messages.php?mobile=' + mo + '&parm=' + Math.random * 10000000000000000000000
					console.log(url)
					var request = $.ajax({
						url: url,
						type: "GET",
						dataType: "html",
						cache: false,
						success: function(msg) {
							document.getElementById('content').style.display = 'block'
							document.getElementById('content').innerHTML = msg
							resize_canvas()
							g_msgs = setTimeout('get_messages()', 10000)
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

			function add_fav(m) {
				var url = 'x_add_fav.php?mob=' + m + '&my=' + getCookie('mobile')
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
				var url = 'x_add_con.php?mob=' + m + '&name=' + n
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

			function add_block(m) {
				var url = 'x_add_block.php?mob=' + m
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
				var url = 'x_add_unblock.php?mob=' + m
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
				var url = 'x_del_call_log.php?mob=' + m
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
		var url = 'x_update_contact.php?mob=' + m + '&name=' + name
		var request = $.ajax({
			url: url,
			type: "GET",
			dataType: "html",
			cache: false,
			success: function(msg) {
				console.log(msg)
			}
		})

	}
	
	function clear_all_timers() {
		var maxId = setTimeout(function(){}, 0);
		for(var i=0; i < maxId; i+=1) { 
			clearTimeout(i);
		}		
	}
	
	function delCookie(cname)	{
		var d = new Date();
		 d.setTime(d.getTime());
		var expires = "expires="+d.toGMTString();
		document.cookie = cname + "=" + "" + "; " + expires;
	 }
	 
	function setCookie(cname,cvalue,exdays){
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

	function show_number() {
		setTimeout('s_number()',1000)
	}

	function s_number() {
		document.getElementById('from').innerHTML = '<h2>From: <font color="grey">' + getCookie('msid') + '</font></h2>' 
		document.getElementById('from_h').value =  getCookie('msid') 
	}

	function resize_canvas() {
		var mn = document.getElementById("main").style
		var mc = document.getElementById("content").style
		var mh = objH - 190
		mn.height = mh + 'px'
		mc.height = mh - 100 + 'px'
		
	}
			var timx
			var op = 0
			var y_axis = 1
			var toast = []
			var dismissed = 0
			var my_mobile = my_number()
			
			function check_new_messages() {
				var url = 'x_sms_get_new_messages.php?mobile=' + my_mobile + '&rjs=' + Math.random() * 1000000000000000000000
				var request = $.ajax({
					url: url,
					type: "GET",
					dataType: "html",
					cache: false,
					success: function(msg) {
						if (msg.trim() != '') {
									console.log(msg)
									toast = document.getElementById('toast')
									toast.innerHTML = msg
									toast.style.display = 'block'
									toast.style.opacity = op
									toast.style.position = 'absolute'
									toast.style.zIndex = '9999999999'
									toast.style.top = '0px'
									show_box()
									setTimeout('hide_box()', 20000)
						} 
						new_msgs = setTimeout('check_new_messages()', 30000)
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