<?php include 'header.php'; ?>
<script src="js/script_login.js"></script>
	<script src="js/session_no_alert.js"></script>
		<section class="header-11-sub bg-midnight-blue">
            <div class="background">
                &nbsp;
            </div>
            <div class="container" style="margin-top:-50px">
                <div class="row">
                    <div class="span4">
                        <h3>Your Shadow | sms account</h3>
                        <p style="color: #ccc;">
                            Welcome back to Shadow | sms login below.
							
                        </p>
                        <div class="signup-form">
							<div class="controls controls-row">
								<input style="width:300px" type="text" name="login" value="<?=$_REQUEST['login']?>"  id="login" placeholder="Enter your mobile number" onclick="clear_error(this)"  onfocus="clear_error(this)"/>
								<span name="login_err" id="login_err"></span><span name="login_err_txt" id="login_err_txt"></span>
							</div>
							<div class="controls controls-row">
								<input style="width:300px" type="password" name="password" id="password" placeholder="Password" onclick="clear_error(this)"  onfocus="clear_error(this)"/>
								<span name="password_err" id="password_err"></span><span name="password_err_txt" id="password_err_txt"></span>
							</div>
							<div class="controls controls-row">
								<button style="width:315px" onclick="validate_form()" class="btn btn-block btn-info">
									Login
								</button>
							</div>
							<div class="controls controls-row">
								<span><a href="#" onclick="document.all.divForgot.style.display='block'">Forgot Password?</a></span> <span align=right style="text-align:right">Not a Member? <a href="index.php">Register Here</a></span>
							</div>
							<br>
							<div class="controls controls-row" style="display:none" id="divForgot">
								<span><input style="width:200px" type="password" placeholder="Enter your Mobile Number" id="forgotPass"></span><span><input type="button" value="Send Via SMS" onclick="send_password()" class="btn" style="width:125px; margin-left:15px; margin-bottom:10px"></span>
							</div>
							<div class="controls controls-row">
								<span><input  style="margin-bottom:5px" id="remember_session" checked type="checkbox" onclick="remember_me()"></span> <span>Remember Me</span>
								<span><input  style="margin-bottom:5px" id="logged_in" type="checkbox"></span> <span>Keep me Logged In</span>
							</div>
                        </div>
                        <div id="form_errors" style="margin-top:10px;-moz-corner-radius:4px; border-radius: 4px"></div>
						<div STYLE='color: #f0f0f0' class="fb-login-button" data-max-rows="5" data-size="xlarge" data-show-faces="true" data-auto-logout-link="false"></div>
                    </div>
	
                </div>
            </div>
			

</div>

        </section>
        <!-- footer-2 -->
        <footer class="footer-2 bg-midnight-blue">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li class="active">
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Features</a>
                        </li>
                        <!-- <li>
                            <a href="#">Pricing</a>
                        </li> -->
                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- <div class="social-btns pull-right">
                    <a href="#"><div class="fui-vimeo"></div><div class="fui-vimeo"></div></a>
                    <a href="#"><div class="fui-facebook"></div><div class="fui-facebook"></div></a>
                    <a href="#"><div class="fui-twitter"></div><div class="fui-twitter"></div></a>
                </div> -->
                <div class="additional-links">
                    Be sure to take a look to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                </div>
				
            </div>
        </footer>
    </body>
</html>