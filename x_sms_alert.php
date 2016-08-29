<?php
/*
 * StrikeIron SMS Alerts & Notifications 4.0.0
 * http://www.strikeiron.com/ProductDetail.aspx?p=450
 *
 * Required:
 *
 * 	1. PHP 5 with soap extensions
 *	2. A registered StrikeIron account with a userid/password.
 *		To register please visit: http://www.strikeiron.com/Register.aspx
 * 		Then set the $USER_ID and $PASSWORD below
 *  3. Call send_message() or track_message()
 *  4. You can only send a predefined StrikeIron test message with a trial account. To send custom messages, you will need a paid subscription.
 *
 * To run place this script, copy it to a directory on your web server and access with a browser.
 *
 *
 * For additional support:
 *  email: support@strikeiron.com
 *  phone: +1 919-467-4545 opt. 3
 *
 *
 */
	$phoneNumber = $_REQUEST['mobile'];
	$USER_ID = 'xtue.web@gmail.com';
	$PASSWORD = 'ybkebp';

$WSDL = 'http://ws.strikeiron.com/SMSAlerts4?WSDL';

// create client
$client = new SoapClient($WSDL, array('trace' => 1, 'exceptions' => 1));

// create registered user for soap header
$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);

// set soap headers - this will apply to all operations
$client->__setSoapHeaders($header);

try
{
  //for send message, enter a valid mobile number and message to send
  send_message($phoneNumber, "This is a test message." );

  //for track message, comment out the line above and uncomment the line below.  Enter a valid tracking tag
  //track_message("60509509");
}
catch (Exception $ex)
{
	echo $ex->getMessage() . "<br />";
}

function send_message ($number, $message)
{
  global $client;

  //set up parameter array
  //note that from-name is hard-coded here.  This name appears in the message BODY.
  //optionally, if you wish to send a message in unicode, you can add another parameter named "OptionalTextFormat." This parameter value should be "UNICODE".
  //The UNICODE parameter only works for international messages. Both the carrier and the receiving device need to support unicode characters
  $params = array("ToNumber" => $number, "FromName" => "PHPSample", "MessageText" => $message);

  //call the web service operation
  $result = $client->__soapCall("SendMessage", array($params), null, null, $output_header);

  //show service results
  echo "<h1>SendMessage Result:</h1><br />";
  output_SendMessage_result($result->SendMessageResult->ServiceResult);

  //show status info
  echo "<br /><h2>Status Info:</h2><br />";
  output_status_info($result->SendMessageResult->ServiceStatus);

  //show subscription info
  echo "<br /><h2>Subscription Info:</h2><br />";
  output_subscription_info($output_header['SubscriptionInfo']);
}

function track_message ($tag)
{
  global $client;

  //set up parameter array
  $params = array("TrackingTicket" => $tag);

  //call the web service operation
  $result = $client->__soapCall("TrackMessage", array($params), null, null, $output_header);

  //show service reuslt
  echo "<h1>TrackMessage Result:</h1><br />";
  output_TrackMessage_result($result->TrackMessageResult->ServiceResult);

  //show status info
  echo "<br /><h2>Status Info:</h2><br />";
  output_status_info($result->TrackMessageResult->ServiceStatus);

  //show subscription info
  echo "<br /><h2>Subscription Info:</h2><br />";
  output_subscription_info($output_header['SubscriptionInfo']);
}

function output_SendMessage_result( $svcResult )
{
  echo '<table border="1">';
      echo '<tr><td>ToNumber:</td><td>' . $svcResult->ToNumber . '</td></tr>';
      echo '<tr><td>Ticket:</td><td>' . $svcResult->Ticket . '</td></tr>';
      echo '<tr><td>StatusExtra:</td><td>' . $svcResult->StatusExtra . '</td></tr>';
      echo '<tr><td>WelcomeMessageSent:</td><td>' . $svcResult->WelcomeMessageSent . '</td></tr>';
  echo '</table>';
}

function output_TrackMessage_result( $result )
{
  echo '<table border="1">';
      echo '<tr><td>ToNumber:</td><td>' . $result->ToNumber . '</td></tr>';
      echo '<tr><td>Ticket:</td><td>' . $result->Ticket . '</td></tr>';
      echo '<tr><td>StatusExtra:</td><td>' . $result->StatusExtra . '</td></tr>';
      echo '<tr><td>WelcomeMessageSent:</td><td>' . $result->WelcomeMessageSent . '</td></tr>';
  echo '</table>';
}

function output_status_info( $status_info )
{
	echo '<table border="1">';
		echo '<tr><td>Status Description</td><td>' . $status_info->StatusDescription . '</td></tr>';
		echo '<tr><td>Status Nbr</td><td>' . $status_info->StatusNbr . '</td></tr>';
	echo '</table>';
}

function output_subscription_info( $subscription_info )
{
	echo '<table border="1">';
		echo '<tr><td>License Status</td><td>' . $subscription_info->LicenseStatus . '</td></tr>';
		echo '<tr><td>License Action</td><td>' . $subscription_info->LicenseAction . '</td></tr>';
		echo '<tr><td>Remaining Hits</td><td>' . $subscription_info->RemainingHits . '</td></tr>';
	echo '</table>';
}

?>
