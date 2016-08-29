<?

	include "g/utils.class.php";

	$u = new utils();

	$is = $u->is_mobile();

	$menu = $is ? "mobile.menu.php" : "menu.php";

?>

<!DOCTYPE html>

<html lang="en">

<head>

       <meta charset="utf-8">

        <title>Shadow | sms</title>

        <!-- header include -->

        <?php require_once('headtag.php'); ?>

        <meta name="apple-mobile-web-app-capable" content="yes" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <meta name="apple-mobile-web-app-status-bar-style" content="black" />

        <script src="js/jquery-1.10.2.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script src="js/startup-kit.js"></script>

		<script type="text/javascript" src="js/plupload.full.min.js"></script>

		<!-- debug 

			<script type="text/javascript" src="../js/moxie.js"></script>

			<script type="text/javascript" src="../js/plupload.dev.js"></script>

		-->

	</head>

    <body style="overflow: none">

        <style type='text/css'>@import url('http://getbarometer.s3.amazonaws.com/assets/barometer/css/barometer.css');</style>
<script src='http://getbarometer.s3.amazonaws.com/assets/barometer/javascripts/barometer.js' type='text/javascript'></script>
<script type="text/javascript" charset="utf-8">
  BAROMETER.load('3F66a4gqee3MGBpFykg2z');
</script>

       <?php include $menu;?>

		<div onclick="dismiss(this)" style="text-align:center;padding:10px;display:none;position:absolute;z-index:999999999;right:0%; top: 0px; background:url('http://shadowsms.com/images/av/alert_05.png') no-repeat center; width: 320px; height:100px;font-size:11pz; color: white" id="toast"></div>

        <div id="legal" style="width:100%; height:100%; position: absolute; top: 0px; bottom: 0px; right: 0px; left: 0px; background: #000; opacity: 0.8; z-index:10000; display: none" onclick="this.style.display='none'; document.all.privacy.style.display='none'; document.all.terms.style.display='none'"></div>

        <div id="terms" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>

        <div id="privacy" style="box-shadow: 10px 10px 25px rgba(0,0,0,0.6), -10px -10px 25px rgba(0,0,0,0.6) ;width:60%; background: #f0f0f0; opacity: 1.0; z-index:10001; display: none; margin-left: 25%; margin-right: 25%; margin-top:-20px;cursor: hand; cursor: pointer;  overflow-Y: auto; overflow-X: none; padding:20px" onclick="this.style.display='none'; document.all.legal.style.display='none'"></div>

