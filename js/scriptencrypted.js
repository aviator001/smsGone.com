	function setCookie(cname,cvalue,exdays) {		var d = new Date();		d.setTime(d.getTime()+(exdays*24*60*60*1000));		var expires = "expires="+d.toGMTString();		document.cookie = cname + "=" + cvalue + "; " + expires;	 }	function getCookie(cname) {		var name = cname + "=";		var ca = document.cookie.split(';');		for(var i=0; i<ca.length; i++) 		  {		  var c = ca[i].trim();		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);		}		return "";	}		function window_width() {		if (document.body && document.body.offsetWidth) {			winW = document.body.offsetWidth;			winH = document.body.offsetHeight;		}			if (document.compatMode=='CSS1Compat' &&				document.documentElement &&				document.documentElement.offsetWidth ) {				return document.documentElement.offsetWidth;			}			if (window.innerWidth && window.innerHeight) {			return window.innerWidth;		}	}	function window_height() {		if (document.body && document.body.offsetWidth) {		 winH = document.body.offsetHeight;		}		if (document.compatMode=='CSS1Compat' &&			document.documentElement &&			document.documentElement.offsetWidth ) {			winH = document.documentElement.offsetHeight;			return winH		}		if (window.innerWidth && window.innerHeight) {		 winH = window.innerHeight;		 return winH;		}	}				var usr_input = ''			var v = ''			var objUser = ''			var objPhrase			var pass 			var aes_user_token			var str			var image_job = ''			setTimeout('x_init()', 500)			var swt = true			var img_arr			var im = new Array			var d = ''			var cntAtt = 1			var curr_att = ''		function show_hide() {			if (document.getElementById('five').innerHTML == 'Hide Photo') {					document.getElementById('two').style.display = 'none'					document.getElementById('two').style.display = 'none'					document.getElementById('three').style.display = 'none'					document.getElementById('four').style.display = 'none'					document.getElementById('five').innerHTML = 'Show Photo'			} else {					document.getElementById('one').style.display = ''					document.getElementById('two').style.display = ''					document.getElementById('three').style.display = ''					document.getElementById('four').style.display = ''					document.getElementById('five').innerHTML = 'Hide Photo'				}			}						function x_init() {				document.getElementById('gears').style.display='block'				document.getElementById('tint').style.display='block'								var url = "http://smsgone.com/g/x_init.php"				var request = $.ajax({				   type: 'GET',					url: url,				    success: function(msg) {						clean(getCookie('PHPSESSID'))						setCookie('attach','')						setCookie('files_added',0)						var php = msg.split('|')						pass = php[0].trim()						aes_user_token = php[1].trim()						str = php[2]						var bin = php[3]						d = php[5]						z_init(bin, d)				    }				})			}						function clean(phpsessid) {				var url = "http://smsgone.com/g/x_sql.php?phpsessid=" + phpsessid				var request = $.ajax({				   type: 'GET',					url: url,				    success: function(msg) {						}				})							}			function z_init(bin, d) {				var url = "http://smsgone.com/g/z_init.php?bin_user_token=" + bin 				var request = $.ajax({				   type: 'GET',					url: url,				    success: function(msg) {						msg = msg.replace('{','')						msg = msg.replace('}','')						var	img_arr = msg.split(',')						for (i=0;i<=img_arr.length-1;i++) {							im[img_arr[i].replace(/"/g,'').split(':')[0]] = img_arr[i].replace(/"/g,'').split(':')[1]							console.log(img_arr[i].replace(/"/g,'').split(':')[0] + '    ' + img_arr[i].replace(/"/g,'').split(':')[1])							document.getElementById('gears').style.display='none'							document.getElementById('tint').style.display='none'													}				    }				})			}	function delCookie(cname) {		var d = new Date();		d.setTime(d.getTime());		var expires = "expires="+d.toGMTString();		document.cookie = cname + "=" + "" + "; " + expires;	 }	function setCookie(cname,cvalue,exdays)	{		var d = new Date();		d.setTime(d.getTime()+(exdays*24*60*60*1000));		var expires = "expires="+d.toGMTString();		document.cookie = cname + "=" + cvalue + "; " + expires;	 }	function getCookie(cname)	{		var name = cname + "=";		var ca = document.cookie.split(';');		for(var i=0; i<ca.length; i++) {		  var c = ca[i].trim();		  if (c.indexOf(name)==0) return c.substring(name.length,c.length);		}		return "";	}		function dispatch(enc_msg, enc_key, enc_cell, enc_self)	{			var url = 'http://smsgone.com/g/x_scramble.php?enc_msg=' + enc_msg + '&enc_key=' + enc_key + '&enc_cell=' + enc_cell + '&token=' + aes_user_token + '&enc_self=' + enc_self			document.getElementById('gears').style.display='block'			document.getElementById('tint').style.display='block'			console.log(url)				var request = $.ajax({					headers: {						Accept : "text/plain; charset=utf-8",						"Content-Type": "text/plain; charset=utf-8"					},					url: url,					type: "GET",					dataType: "html",					cache: false,					success: function(msg) {						document.getElementById('gears').style.display='none'						document.getElementById('tint').style.display='none'						console.log(msg)						alert('Sent!')						//location.href='../members.php'					}				})			}			objUser=''			function go() {				var j				var last_char = ''				var last_pic = ''				var msg_arr = new Array				var m = document.getElementById('alpha')				var msg_str=m.textContent				var arrA = new Array('&lt;','&amp;','&quot;','&nbsp','&gt')				var arrB = new Array('<','&','"',' ','>')				msg_str=msg_str.replace(/&lt;/g,'<')				msg_str=msg_str.replace(/&amp;/g,'&')				msg_str=msg_str.replace(/&quot;/g,'"')				msg_str=msg_str.replace(/&nbsp;/g,' ')				msg_str=msg_str.replace(/&gt;/g,'>')				var m_str=''				var op=''				for (j=0;j<=msg_str.length-1;j++) {					var strL=msg_str.substring(j,j+1)					if (strL == ' ') strL = "SP"  // space - z37					if (strL == '!') strL = "EX"  // !					if (strL == '@') strL = "AT"  // @					if (strL == '#') strL = "HS"  // #					if (strL == '$') strL = "DL"  // $					if (strL == '%') strL = "PC"  // %					if (strL == '&') strL = "AM"  // &					if (strL == '*') strL = "ST"  // *					if (strL == "(") strL = "BL"  // (					if (strL == ")") strL = "BR"  // )					if (strL == "_") strL = "US"  // _					if (strL == '+') strL = "PS"  // +					if (strL == '-') strL = "MN"  // -					if (strL == '=') strL = "EQ"  // =					if (strL == '[') strL = "SL"  // [					if (strL == ']') strL = "SR"  // ]					if (strL == '{') strL = "CL"  // {					if (strL == '}') strL = "CR"  // }					if (strL == '|') strL = "PI"  // |					if (strL == ':') strL = "CN"  // :					if (strL == ';') strL = "SN"  // ;					if (strL == '"') strL = "QD"  // "					if (strL == "'") strL = "QS"  // '					if (strL == '.') strL = "PD"  // .					if (strL == ',') strL = "CM"  // ,					if (strL == '?') strL = "QM"  // ?					if (strL == '<') strL = "LT"  // <					if (strL == '>') strL = "GT"  // >					if (strL == '^') strL = "CT"  // ^					if (strL == '~') strL = "SG"  // ~ - z66					if (strL == "/") strL = "FS"  // ~ - z67					//$p = array('SP','EX','AT','HS','DL','PC','AM','ST','BL','BR','US','PS','MN','EQ','SL','SR','CL','CR','PI','CN','SN','QD','QS','PD','CM','QM','LT','GT','CT','SG','FS');					m_str = m_str + im[strL.toUpperCase()]+'|'					last_char = '<img style="width:10px" src="../xsr/' + d.trim() + '/' + im[strL.toUpperCase()].trim() + '.png">'					op = op + last_char					msg_arr[j] = last_char					objUser = objUser + im[strL.toUpperCase()] + '|'				}				console.log(m_str)				document.getElementById('alpha').innerHTML=op				getim(objUser.substring(0, objUser.length-1), getCookie('PHPSESSID'))			}			function trap(event) {				alert(event.type)			}			function getim(strmsg,id) {				var curr_a = getCookie('attach')				var key = document.getElementById('key').value				var cell = document.getElementById('cell').value				var url = 'http://smsgone.com/g/x_getim.php?id=' + id				var request = $.ajax({					url: url,					type: "GET",					dataType: "html",					cache: false,					success: function(msg) {						strmsg = strmsg + '@@' + msg						if (cell.substring(0,1)=='1') {							cell=cell.substring(1,cell.length)							document.getElementById('cell').value=cell						}						if (!cell) {							document.getElementById('cell').style.background = 'Lavenderblush'							document.getElementById('cell').style.border = '1px solid red'							alert('I need to know who you want to send this to')							return false						}						if (!key) {							document.getElementById('key').style.background = 'Lavenderblush'							document.getElementById('key').style.border = '1px solid red'							alert('Must Set Secret Phrase')							return false						}						console.log(key)						console.log(pass)						console.log(strmsg)						var selfDestruct = document.getElementById('selfDestruct').innerHTML						var enc_key = Aes.Ctr.encrypt(key, pass, 256)						var enc_msg = Aes.Ctr.encrypt(strmsg, key, 256)						var enc_cell = Aes.Ctr.encrypt(cell, key, 256)						var enc_self = Aes.Ctr.encrypt(selfDestruct, key, 256)						document.getElementById('tint').style.display='block'						document.getElementById('gears').style.display='block'						dispatch(enc_msg, enc_key, enc_cell, enc_self)											}				})				return false			}						function swap_me(fn, fn_o) {				fn.src = fn_o			}			function swap_me_back(fn, fn_b) {				fn.src = fn_b			}			function print_me(fn, fn_b) {				v = v + "<img style='width:40px' src='" + fn_b + "'>"				document.getElementById('alpha').innerHTML = v				objUser = objUser + fn.id + '|'			}			function delete_me(fn) {				var w = document.getElementById('alpha').innerHTML				var objI = w.substring(0, w.length-76)				objUser = objUser.substring(0, objUser.length-21)				document.getElementById('alpha').innerHTML = objI				v = objI			}						function del_photo(id) {			//	delCookie('pic_arr')			//	delCookie('cur_att')				document.getElementById('alpha2').innerHTML = ''				var url = 'http://smsgone.com/g/x_del_photo.php?id=' + id				var request = $.ajax({					url: url,					type: "GET",					dataType: "html",					cache: false,					success: function(msg) {						location.reload()					}				})				return false			}			// convert bytes into friendly format			function bytesToSize(bytes) {				var sizes = ['Bytes', 'KB', 'MB'];				if (bytes == 0) return 'n/a';				var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));				return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];			};			// check for selected crop region			function checkForm() {			//	if (parseInt($('#w').val())) return true;			//	$('.error').html('Please select a crop region and then press Upload').show();				return true			}			// update info by cropping (onChange and onSelect events handler)			function updateInfo(e) {				$('#x1').val(e.x);				$('#y1').val(e.y);				$('#x2').val(e.x2);				$('#y2').val(e.y2);				$('#w').val(e.w);				$('#h').val(e.h);			};			// clear info by cropping (onRelease event handler)			function clearInfo() {				$('.info #w').val('');				$('.info #h').val('');			};		// Create variables (in this scope) to hold the Jcrop API and image size			var jcrop_api, boundx, boundy;			function fileSelectHandler() {			// get selected file				var oFile = $('#image_file')[0].files[0];				// hide all errors				//$('.error').hide();				// check for image type (jpg and png are allowed)				var rFilter = /^(image\/jpeg|image\/png)$/i;				if (! rFilter.test(oFile.type)) {					$('.error').html('Please select a valid image file (jpg and png are allowed)').show();					return;				}				// check for file size				if (oFile.size > 10 * 1024 * 1024) {					$('.error').html('You have selected too big file, please select a one smaller image file').show();					return;				}								// preview element				var oImage = document.getElementById('preview');				// prepare HTML5 FileReader				var oReader = new FileReader();					oReader.onload = function(e) {					// e.target.result contains the DataURL which we can use as a source of the image					oImage.src = e.target.result;					oImage.onload = function () { // onload event handler					$('#ow').val(oImage.naturalWidth)					$('#oh').val(oImage.naturalHeight)						if ((oImage.naturalWidth > 1024)||(oImage.naturalHeight > 1024)) {							alert('Keep below 1024px by 1024px please!')							return false						}						// display step 2						$('.step2').fadeIn(500);						// display some basic image info						var sResultFileSize = bytesToSize(oFile.size);						$('#filesize').val(sResultFileSize);						$('#filetype').val(oFile.type);						$('#filedim').val(oImage.naturalWidth + ' x ' + oImage.naturalHeight);						// destroy Jcrop if it is existed						if (typeof jcrop_api != 'undefined') {							jcrop_api.destroy();							jcrop_api = null;							$('#preview').width(oImage.naturalWidth);							$('#preview').height(oImage.naturalHeight);						}						setTimeout(function(){							// initialize Jcrop							$('#preview').Jcrop({								bgFade: true, // use fade effect								bgOpacity: .3, // fade opacity								onChange: updateInfo,								onSelect: updateInfo,								onRelease: clearInfo,								aspectRatio: 1							}, function(){								// use the Jcrop API to get the real image size								var bounds = this.getBounds();								boundx = bounds[0];								boundy = bounds[1];								console.log(boundx)								// Store the Jcrop API in the jcrop_api variable								jcrop_api = this;							});						},500);					};				};				// read selected file as DataURL				oReader.readAsDataURL(oFile);			}		function show_attach() {			document.getElementById('attach').style.display='block'		}					function delete_attach(objA) {			objA.style.display='none'			curr_att = getCookie('curr_att')			curr_att = curr_att.replace(objA.id + '|', '')			setCookie('curr_att', curr_att)		}		function att_photo(cntA, pid) {			cntAtt = cntAtt + 5			curr_att = curr_att + pid + '|'			image_job = "<img src='uploads/" + pid + ".jpg' style='width:50px; border-radius:50px; top:-10px; border:5px solid #fff; box-shadow: 2px 5px 15px rgba(0,0,0,1)'>"			setCookie('pic_arr', image_job)			setCookie('curr_att', curr_att)			document.getElementById('alpha2').innerHTML = document.getElementById('alpha2').innerHTML + '<div id="' + pid + '" onclick="delete_attach(this)" style="margin-top:-20px;cursor:hand;cursor:pointer"><span title="Remove Attachment" class="fui-cross" style="margin-left:5px;color:red"></span><span><img src="../images/clip2.png" style="margin-left:15px;height:25px"></span><span style="margin-left:10px"><font color=black>ATTACHMENT: <b><font color=grey>1 PHOTO ATTACHED</b> </font></font></span><span style="margin-left:10px">' + image_job + '</span><span style="margin-left:75px">CREDITS:</span><span><b> 5 </b></span><span><img style="height:15px;margin-left:5px;margin-bottom:2px" src="../images/img/down.png"></span></div>'			document.getElementById('total_count').innerHTML = cntAtt		}