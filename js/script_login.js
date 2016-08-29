			var login
			var data_type
			var password
			var validate
			var form_errors
			setTimeout('remember_me()', 100)
			
			$(document).keydown(function(e){
				ec = e.keyCode
				if (e.keyCode == 13) send()
				k = String.fromCharCode(ec)
			})

			function show_error(f,i)
				{
					if(!i) i = '<font color="#fff">Invalid Entry! Please re-enter</font>'
					var e = ' <font color="#fff">No Blanks!</font>'
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
				}

			function show_login_error(err)
				{
					validate = false
					r = document.getElementById('form_errors')
					r.style.border = '5px solid rgba(255,0,0,1)'
					r.style.color = 'white'
					r.style.background = 'red'
					r.innerHTML = err
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
					
					function remember_me() {
						if (document.getElementById('remember_session').checked) {
							if (getCookie('MY_SESSION')) {
								var ts = urldecode(getCookie('MY_SESSION'))
								ts = ts.split('|')
								document.getElementById('login').value = ts[0]
								document.getElementById('password').value = ts[1]
								document.getElementById('login').focus()
								if (getCookie('KEEP_LOGGED_IN'))  {
									setTimeout('login_me_in()', 500)
								} else {
									delCookie('KEEP_LOGGED_IN')
								}
							} else {
								delCookie('MY_SESSION')
								delCookie('KEEP_LOGGED_IN')
							}
						}
					}
					
					function login_me_in() {
						data_type = whats_this(document.getElementById('login').value)
						var url = 'x_login.php?joint_user_input=' + document.getElementById('login').value + '&data_type=' + data_type + '&password=' + document.getElementById('password').value + '&remember=' + document.getElementById('remember_session').checked + '&keep_logged_in=' + document.getElementById('logged_in').checked
						console.log(url)
						var request = $.ajax({
							url: url,
							type: "GET",
							dataType: "html",
							cache: false,
							success: function(msg) {
							if (msg == "") {
									show_login_error('<font style="color:#fff">INVALID LOGIN! Please re-enter</font>')
								} else {
									setTimeout('go()', 500)
								}
							}
						})
					}
					
					
					function send_password() {
						var user_mobile = document.getElementById('forgotPass').value
						var url = 'x_sms_api.php?sms=' + user_mobile
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
					
					function go() {
						location.href = 'g/x_photos.php?x=' + Math.random()*10000000000000000000000
					}
					function whats_this(data) {
						var email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
						var mobile = /^(\W|^)[(]{0,1}\d{3}[)]{0,1}[.]{0,1}[\s-]{0,1}\d{3}[\s-]{0,1}[\s.]{0,1}\d{4}(\W|$)/
						if(email.test(data)) {
							data_type = 'email'
						} else {
							if(mobile.test(data)) {
								data_type = 'mobile'
							} else {
								data_type = 'login'
							}
						}
						return data_type
					}
					
					function validate_form(){
						validate == true
						login = document.getElementById('login')
						password = document.getElementById('password')
						form_errors = document.getElementById('form_errors')
						
						if (!login.value) {
							show_error(login)
							validate == false
						}
						if (!password.value) {
							show_error(password)
							validate == false
						}
						if (validate) login_me_in()
							else form_errors.innerHTML = 'Correct Errors please!'
					}	
					
			function set_link() {
				document.getElementById('login').focus()
				var msid = getCookie('msid')
			}	

			function do_logout() {
				delCookie('msid')
				delCookie('USER_DATA')
				set_link()
				location.href='login.php'
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
