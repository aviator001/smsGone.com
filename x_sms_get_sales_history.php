<?
	include "x_lib.php";
	$bg = "#f0f0f0";
	$bg2 = "#fcfcfc";
	$ct=0;
	
	$mobile = $_REQUEST['mobile'];
	$qs = iQ("select no_sent, available_sms_count from sms_subscribers where mobile = '$mobile'");
	$qr = iQ("select max(x_subscription_start) as 'x_subscription_start' from sms_sales where mobile = '$mobile'");
		$bg = "#fff";
		$ct=0;
	$last_purchase = $qr[x_subscription_start];
	if ((!$last_purchase) && ($qs[available_sms_count])) $last_purchase = date('Y-m-d');
	$subscription_expires = add_date($last_purchase, 30);
	$account_balance = $qs[available_sms_count];
	$total = $qs[no_sent];

	if (time() < strtotime($subscription_expires)) {
			$account_status = "Expires " . switchDateforWords($subscription_expires);
			$status = "Active";
		} else {
			$account_status = "Expired " . switchDateforWords($subscription_expires);
			$status = "Suspended";
		}
	$subscription_expiry = date('D jS M Y', strtotime($subscription_expires));
	
	if (time() < strtotime($subscription_expires)) {
		if ((!$qr[x_subscription_start]) && ($qs[available_sms_count])) {
				$sales='<div id="buy_sub" class="btn" align="center" style="width:250px; margin: 15px; margin-left: 25px">Purchase a Subscription</div><hr> <div> <span style="width:250px" id="buy_sms" class="btn">Buy 2500 Credits</span> <span style="width:250px" id="buy_sms" class="btn">Buy 5000 Credits</span> <span style="width:250px" id="buy_sms" class="btn">Buy 10,000 Credits</span></div>';
			} else {
				$sales='<span style="width:250px; margin: 15px; margin-left: 25px" id="buy_sms" class="btn btn-primary">Buy 1000 Credits</span>';			
			}
	} else {
		$sales='<span id="buy_sub" class="btn btn-info btn-active" style="width:250px; margin: 15px; margin-left: 25px">Purchase a Subscription</span>';
	}

	$str =  "	<div style='width:100%;font-size:1.2em; margin: 15px; margin-left: 25px'> ".($status)."</div><div style='width:100%;font-size:1.2em; margin: 15px; margin-left: 25px'>".($account_status)." ($subscription_expiry) </div>
				<div style='width:100%;font-size:1.2em; margin: 15px; margin-left: 25px'>$account_balance Credits Remaining</div>
				$sales
			";
	$query = mysql_query("select * from sms_sales where x_status = 'Pass' and mobile = '".$_REQUEST[mobile]."' order by x_subscription_start desc");
	while ($res = mysql_fetch_assoc($query)) {
		if ($res[x_amount]=="19.99") $p_desc = "Starter Package";
		if ($res[x_amount]=="39.99") $p_desc = "Professional Package";
		if ($res[x_amount]=="99.99") $p_desc = "Business Package";
		if ($res[x_amount]=="19.99") $p_det = "<font color=black>Messages </font>1,000<br><font color=black>Data </font>Unlimited Data<br><font color=black>Numbers </font> 1<br><font color=black>Cost </font> 19.95 $/Month";
		if ($res[x_amount]=="39.99") $p_det = "<font color=black>Messages </font>2,500<br><font color=black>Data </font>Unlimited Data<br><font color=black>Numbers </font> 3<br><font color=black>Cost </font> 39.95 $/Month";
		if ($res[x_amount]=="99.99") $p_det = "<font color=black>Messages </font>10,000<br><font color=black>Data </font>Unlimited Data<br><font color=black>Numbers </font> 10<br><font color=black>Cost </font> 99.95 $/Month";
		$date=date_create($res[x_rebill_date]);
		date_add($date,date_interval_create_from_date_string("$res[x_days] days"));
		if(strtotime($res[x_rebill_date]) > time()) {
			$tense = "Next";
			$button = "<span><a href='' class='btn btn-primary'> Cancel this Subscription</a></span>";
		} else {
			$tense = "Last";
			$button = "<span><a href='' class='btn btn-primary btn-active'> Activate this Subscription</a></span>";
		}
		if (!$res[x_status]) $status = "FAIL";
			else $status = "PASS";
		$str .= "
		<div style='margin:10px; border:4px solid #f0f0f0; text-shadow: 1px 1px 0px #fff;text-align:center'>
			<div style='background:#fcfcfc;border-bottom:4px solid #f0f0f0;padding:2px;margin:0px;padding:0px;text-align:center'>
				<span style='margin-left:10px;margin-right:0px;cursor:hand;cursor:pointer;text-align:left;color:#333;font-size:1.2em;text-align:center' onclick='show_detail($x1,$x2)'>
					<h6>
						<span style='margin-left:20px;margin-right:10px;cursor:hand;cursor:pointer;text-align:left;color:#333;font-size:1.2em;text-align:center' onclick='show_detail($x1,$x2)'>
							<img src='images/dollars.png' style='height:25px;margin-bottom:5px'>
						</span>
						<span>
							$p_desc
						</span>
						<span>
							
						</span>
					</h6>
				</span>
			</div>
			<div style='padding:10px;background: #fff; text-shadow: 1px 1px 0px #fff;text-align:center'>		
				<div style='margin-left:10px;margin-right:10px;text-align:left;color:#333;font-size:1.2em;text-align:center'>$tense Rebill: <FONT COLOR=skyblue>" . 
						date_format($date,"D jS M Y") . " <font color=grey>(" .switchDateforWords($res[x_rebill_date]) .")</font>
				</div>
				<div style='margin-left:10px;margin-right:10px;text-align:left;color:#333;font-size:1.2em;padding:1px; text-shadow: 1px 1px 0px #fff;text-align:center'>Amount Paid: <FONT COLOR=skyblue> $" . 
						strtoupper($res[x_amount]) . "
				</div>
				<div style='margin-left:10px;margin-right:10px;text-align:left;color:#333;font-size:1.2em;padding:1px; text-shadow: 1px 1px 0px #fff;text-align:center'>Valid for Days: <FONT COLOR=skyblue>" . 
						strtoupper($res[x_days]) . "
				</div>

				<div style='margin-left:10px;margin-right:10px;text-align:left;color:#333;font-size:1.2em;padding:1px; text-shadow: 1px 1px 0px #fff;text-align:center'>Transaction ID: <FONT COLOR=silver>" . 
						substr($res[x_charge_id], 0, 10)  . "
				</div>
				<div style='margin-left:10px;margin-right:10px;text-align:left;color:#333;font-size:1.2em;padding:1px; text-shadow: 1px 1px 0px #fff;text-align:center'><FONT COLOR=silver>" . 
						$p_det  . "
				</div>
				<hr>
				</div>
					$button<br><br>
				</div>
			</div>
		</div>";
		
		if ($bg=="#f0f0f0") $bg="#fff";
			else $bg="#f0f0f0";
		if ($bg2=="#fff") $bg2="#fcfcfc";
			else $bg2="#fff";
	}
	if ($str) echo $str;

?>
