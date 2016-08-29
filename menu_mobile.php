	<!-- header-11 -->
        <header class="header-11" style="margin:-50px">
            <div class="container">
                <div class="navbar span12">
                    <div class="navbar-inner">
                        <button type="button" class="btn btn-navbar nav-pull-left" style="margin-top:15px; margin-right:-40px"></button>
                        <a class="brand" href="#">
                            <div style="margin-top:-20px"><span><img src="images/img/logo@2x.png" width="50" height="50" alt=""></span><span>| SMS</span></div>
                        </a>
                        <div class="nav-collapse collapse pull-right">
                            <span id="logged_in_menu">
                                <ul class="nav">
                                    <li class="active"><a href="index.php"> HOME </a></li>
                                    <li><a href="index.php#features">FEATURES</a></li>
                                    <li><a href="members.php">MY ACCOUNT</a></li>
                                    <li><a href="sms.php">SEND SMS</a></li>
                                    <li><a href="history.php">CALL HISTORY</a></li>
                                    <li><a href="contacts.php">CONTACTS</a></li>
                                    <li><a href="billing.php">BILLING</a></li>
                                    <li><a href="help">HELP</a></li>
									<? if ($_COOKIE['msid']) { ?>
									<li><a href="#" onclick="do_logout()">Logout</a></li>
									<? } else { ?>
									<li><a href="login.php">Login</a></li>
									<? } ?>
								</ul>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
		</header>
<div class="delimiter"></div>