<!DOCTYPE html> 
<html lang="en">
<head>	
<script>
	var start_magic=true
	var magic_w='65px'
	var magic_h='65px'
</script>			
	<title>VisuaLogin.com :: Never forget a password again!</title>		
	<meta name="keywords" content="sugar daddy, gay, gay sugar daddy, sugardaddy, gay sugardaddy, wealthy gay men, twink, hot young gay men, boyz, gay dating, sugar daddy dating site, daddy dating, find daddy, find twink, GaySugarDaddyFinder" />		
	<meta name="description" content="A place that connects handsome wealthy and caring gay men to hot young gay males" />		
	<meta name="Author" content="Gautam Sharma" />		
	<!-- mobile settings -->		 
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />		

	<!-- Fav Icons -->		
	<link rel="icon" href="assets/img/favicon.ico">		
	<link rel="apple-touch-icon" href="assets/img/favicon.ico">		
	<!-- WEB FONTS -->		
	<link href='css/open_sans_condensed.css' rel='stylesheet' type='text/css'>			
	<link href="css/bootstrap.min.css" rel="stylesheet">		
	<!-- Font awesome CSS -->		
	<link href="css/font-awesome.min.css" rel="stylesheet">				
	<!-- Custom CSS -->		
	<link href="assets/css/essentials.css" rel="stylesheet" type="text/css" />		
	<link href="assets/css/layout.css" rel="stylesheet" type="text/css" />		
	<link href="assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />		
	<link href="assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" />
	<!-- orange: default style -->		
	<link href="assets/css/shadows.css" rel="stylesheet" type="text/css" />
	<!-- orange: default style -->		
	<link href="assets/css/stream.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/jquery-confirm.css" rel="stylesheet" type="text/css" />
	<!-- orange: default style -->		
	<link href="css/buttonstyle.css" rel="stylesheet" type="text/css">		
	<link href="css/style-20.css" rel="stylesheet">	
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-confirm.css" />

	<link href="assets2/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets2/css/style.min.css" rel="stylesheet"> 
	<link href="assets2/css/retina.min.css" rel="stylesheet">
	<link href="pattern.css" rel="stylesheet">	
			<style>
				.tooltipsy {
					padding: 10px;
					max-width: 200px;
					color: #0093D9;
					background: url(assets/images/xxx_big.png) center;
					background-size:cover;
					border: none;
					border-radiuse:4px;
					text-shadow:0px 0px 1px #333;
					opacity:1
				}
				.eee, .content{
					width:400px;
				}
a:hover { 
    text-decoration:none;
}
				
			</style>
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
			<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>		
			<script src="assets/js/jquery-confirm.min.js"></script>
			<script src="demo/libs/pretty.js"></script>
			<script type="text/javascript" src="assets/js/framework.js"></script>		
			<script type="text/javascript" src="assets/js/aes.js"></script>
			<script type="text/javascript" src="hammer.js"></script>
			<script src="//rawgit.com/ngryman/jquery.finger/v0.1.2/dist/jquery.finger.js"></script>
			  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
			<script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( "#forgot_button" ).click(function() {
      $( "#dialog" ).dialog( "open" );
    });
  });
  
	</script>
		</head>
				<body class="boxed" style="background:url:(assets/images/b70.png);background-size:cover;overflow-y:hidden">
		<div id="cam1"  class="www_box5" style="width:240px;height:170px;background:#f0f0f0;padding-top:25px;padding-left:7px;padding-right:7px;right:25px;position:absolute;display:none;z-index:9999999999999999999999999"></div>
				<div id="cam" onclick="slide_dn()" class="www_box www_box5" style="width:240px;height:170px;background:#f0f0f0;padding-top:25px;padding-left:7px;padding-right:7px;right:25px;position:absolute;display:none;z-index:9999999999999999999999999">
					<img id="pull" src="assets/images/pull.png" style="display:none;position:absolute;left:0;width:200px;margin-left:5px;bottom:2px;cursor:hand;cursor:pointer">
					<img src="images/close.png" style="position:absolute;right:0;width:20px;margin-top:-22px;margin-right:5px;cursor:hand;cursor:pointer">
				<div class="www_box" id="webcam" style="margin-top:20px"></div>
			</div>
			<div class="modal" id="code" style="display:none"></div> 
			<div class="modal" id="modal" onclick="this.style.display='none'" style="position:absolute;display:none;cursor:hand;cursor:pointer" onmouseover="clear_all_timers()">
				<div class="modal_bg" id="modal_bg"></div>
				<div class="modal_window" id="modal_window" style="display:block;background:none;box-shadow:none;top:0"></div>
			</div>
			<div id="dark1" class="dark_a" style="opacity:0;display:none"></div> 
			<div id="wrapper" class="www_wrapper" style="background:;top:10px;box-shadow:5px 0px 50px rgba(0,0,0,0.8);border-radius:0px;overflow-x:hidden;b.jpg;overflow-y:hidden;height:728px;margin-bottom:100px;border-radius:5px">
				<section id="section" style="text-align:center;margin:0;padding:0;overflow-y:auto;overflow-x:hidden" align="center">
					<div id="dark2" class="dark_b" style='opacity:0'></div>	
					<input type="hidden" id="cameraNames">
					<div id="g_map" style="display:none;width:100%; height:100%;overflow: hidden;position:absolute;z-index:9"></div>
					<div id="info" class="modal" style="display:none"></div>
					<div style="position:absolute;width:100%;height:100%;top:0px;left:0px;right:0px;bottom:0px;background:#000;opacity:0.7;z-index:1000;display:none" id="pass_modal"></div>
<div id="loginMain" style="height:500px" style="position:absolute;top:100px;left:0px;right:0px;bottom:0px;margin:auto">
<div class="col-md-6" style="position:absolute;top:0px;left:0px;right:0px;bottom:0px;margin:auto;margin-top:10px">
<h1>Account <strong>Login</strong></h1>
<h2 class="hastip" title="Never again forget a password. Access many sites(SSO) with a single visual pattern">Login with username and password <i>or</i> VISUAL|<b>LOGIN</b></h2>
<br><br><div id="form_login_errors" class="alert alert-danger" style="display:none">
<i class="fa fa-frown-o"></i> 
<strong>E-mail Address</strong> not found!
<button onclick="forgotMyPass()" type="button" class="btn btn-primary pull-right" style="margin-right:15px;margin-top:-8px">Forgot Password?</button>
</div>
<div  id="lbox" class="white-row" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.8)">
<!-- alert failed -->
<div class="row">
<span style="text-align:center"><h2>DEMO <B>LOGIN</B>: <font color=maroon>admin</font> | DEMO <B>PASSWORD</B>: <font color=maroon>admin</font></h2></span>
<div class="form-group">
<div class="col-md-12" style="text-align:left">
<label>login</label>
<input onclick="clear_login_error(this)" type="text"  name="user_input" value=""  id="user_input" placeholder="Enter any of the above" class="form-control input-box" style="color:grey;padding-left:50px">
<i id='meh' class='fa fa-eye' onmouseover="this.className='fa fa-eye-slash'" onmouseout="this.className='fa fa-eye'" style="font-size:24px;margin-top:-35px;margin-left:10px;color:#CACAD9;position:absolute"></i>
<div id="user_input_err_txt"></div>
</div>
</div>
</div>
<div class="row">
<div class="form-group">
<div class="col-md-12" style="text-align:left">
<label class="" title="">Password</label>
<input onclick="clear_login_error(this)" type="password" name="pswd" id="pswd" placeholder="Password" class="form-control input-box" style="color:grey;padding-left:50px">
<i class='fa fa-signal' style="font-size:24px;margin-top:-35px;margin-left:10px;color:#CACAD9;position:absolute"></i>
<div id="pswd_err_txt"></div>
</div>
</div>
</div>
	<div class="row">
		<div class="col-md-12">
			<table style="width:100%" border=0>
				<tr>
					<td style="width:25%">
						<div style="text-align:center;font-size:12px;text-shadow:none"><button onclick="login_now()" class="btn btn-primary pull-left"><span  style="text-align:center;font-size:12px;text-shadow:none">Sign In</span></button>
					</td>
					<td style="width:50%">
						<div id="pattern_logo"></div>
					</td>
					<td style="width:25%">
						<div style="text-align:center"><input type="button" name="forgot_button" id="forgot_button" class="btn btn-danger pull-right" onclick="" value="Forgot"></div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<div id="results" style="display:none"><!-- results will be placed here --></div><a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;"></a><div style="display:none" id="fb-root"></div>
<div style="font-family:Open Sans Condensed;font-size:18px;color:#333">
<a href="javascript:jalert('Its just a demo bro')"><span style="color:#000;font-weight:300px;font-size:20px;color:#000;text-shadow:0 0 1px #fff">NO ACCOUNT? DONT BE SAD.</span><br><span style="color:#fff;font-weight:300px;font-size:32px"> CLICK HERE TO CREATE ONE<BR></SPAN><SPAN STYLE="font-size:24px;color:#000;text-shadow:0 0 1px #fff">NOTHING IN LIFE IS FOR FREE, BUT YES, YOU CAN CREATE A PROFILE AND START COMMUNICATION WITH OTHER MEMBERS ON THE SITE WITHOUT GIVING US YOUR CREDIT CARD</span></a></div></div><!-- /LOGIN --><!-- PASSWORD --><div class="col-md-6" style="display:none" id="forgot_send">
<h2>Forgot <strong>Password</strong>?</h2>
<div class="white-row">
<p>
Enter cellphone or email to retrieve password
</p>
<div style="display:none" class="alert alert-success">
<i class="fa fa-check-circle"></i> 
<strong>New Password Sent!</strong> Check your E-mail Address!
</div>

	<div style="display:none" class="alert alert-danger">
		<i class="fa fa-frown-o"></i> 
		<strong>E-mail Address</strong> not found!
		</div>
			<label>E-mail Address OR Mobile Number</label>
                <form class="input-group" method="post" action="#">
                    <input id="emobile" type="text" class="form-control" name="s" id="s" value="" placeholder="Mobile No or E-mail Address" />
                    <span class="input-group-btn">
                    <button class="btn btn-primary" id="send">SEND</button>
                    </span>
                </form>
			</div>
		</div>
	</div>
				</section>
			</div>
			<script type="text/javascript">
						var pointer
						function hide_search1() {
							document.getElementById('search_results').style.display='none'
						}
	
						function login_now() {
							validate = true
							user_input = document.getElementById('user_input').value
							pswd = document.getElementById('pswd').value
							if ((user_input=='admin') && (pswd=='admin')) {
								jalert('Login Successfull!')
								location.href='members_home.php'
							} else {
								jalert('Login Failure!')
							}
							form_errors = document.getElementById('form_login_errors')
							form_errors.style.display='none'
						}
					
						function clear_login_error(f) {
							validate = true
							var r = f.id + '_err'
							var t = r + '_txt'
							var p = f.value
							f.style.background = '#fff'
							f.style.color='grey'
							t = document.getElementById(t)
							t.innerHTML = ''
							form_errors = document.getElementById('form_login_errors')
							form_errors.style.display='none'
						}

						window.fbAsyncInit = function() {
							FB.init({
								appId: '340032229516154',
								cookie: true,xfbml: true,
								channelUrl: 'http:///channel.php',
								oauth: true
							});
						};
						
						(function() {
						var e = document.createElement('script');
						e.async = true;e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
						document.getElementById('fb-root').appendChild(e);}());
						
						function CallAfterLogin(){
							setTimeout("CallAfterLoginFB()",500)
						}
				
						function CallAfterLoginFB(){
						FB.login(function(response) {
							if (response.status === "connected") {
								var accessToken = response.authResponse.accessToken;
								FB.api('/me', function(data) {
								  if(data.email == null) {
										alert("You must allow us to access your email id!"); 
									}else{
										AjaxResponse();
									}
								});
							}} ,{scope:'publish_actions,email'});
						}

						function AjaxResponse(){
							$( "#results" ).load( "process_facebook.php" );
						}

						function LodingAnimate() {
							$("#LoginButton").hide(); 
							$("#results").html('<img src="img/ajax-loader.gif" /> Please Wait Connecting...');
						}
						
						function ResetAnimate() {
							$("#LoginButton").show();
							$("#results").html('');
						}
			</script>

			
						
				<script>
					var start_magic=true
					document.getElementById('magic_box').appendChild(magic1)
					document.getElementById('magic_box').appendChild(magic2)
					//document.getElementById('magic_box')
				</script>
				<? 
					include "inc/utils.class.php"; 
					$c=new utils;
					if ($c->is_mobile()) {
						?><script type="text/javascript" src="pattern.mobile.js"></script><?
					} else {
						?><script type="text/javascript" src="pattern.js"></script><?
					}
					if ($_REQUEST['show_login']=='1') {
						?><script>pattern()</script><?
					}
				?>
				
								
		</body>
	</html>
