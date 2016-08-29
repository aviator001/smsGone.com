<?
	error_reporting(0);
	include "x_lib.php";
	$mobile = $_REQUEST['mobile'];
	$q = query("select *, max(sent) as sent1, count(*) as total_calls from sms_history where (((from_mobile = '$mobile')||(to_mobile = '$mobile')) and (message !='' and to_mobile !='' and from_long_code !='' and to_long_code !='1' and to_long_code !='')) group by to_mobile order by sent1 desc");
	for ($i = 1; $i <= count($q); $i++) {
		$call[total_calls] = $q[$i-1][total_calls];
		$call[member_id_from] = $q[$i-1][member_id_from];
		$call[member_id_to] = $q[$i-1][member_id_to];
		$call[to_mobile] = $q[$i-1][to_mobile];
		$call[to_long_code] = $q[$i-1][to_long_code];
		$call[from_mobile] = $q[$i-1][from_mobile];
		$call[from_long_code] = $q[$i-1][to_long_code];
		$call[last_call_at] = $q[$i-1][sent1];
		$call[call_date_time] = date("jS M h:i A", strtotime($q[$i-1][sent1]));
		$call[available_sms_count] = $r[available_sms_count];
		$x1='"'.$mobile.'"';
		$x2='"'.$call[show_number].'"';
		if ($call[to_mobile] == $_COOKIE[mobile]) {
			$call[type] = '<font color=black>INCOMING SMS</font>';
			$call[name_from] = get_caller_id($q[$i-1][from_mobile]);
			$call[name_to] = get_caller_id($mobile, true);
			$call[show_number] = $q[$i-1][from_long_code];
			$call[show_name] = $call[name_from];
			$to_from = "FROM";
			}
		if ($call[from_mobile] == $_COOKIE[mobile]) {
			$call[type] = '<font color=skyblue>OUTGOING SMS</font>';
			$call[name_to] = get_caller_id($q[$i-1][to_mobile], true);
			$call[name_from] = get_caller_id($mobile, true);
			$call[show_number] = $q[$i-1][to_long_code];
			$call[show_name] = $call[name_to];
			$to_from = "TO";
			}
		$name = '"'.strtoupper($call[show_name]) .'"';
	
		if ($i==1) $str .= "<tr style='border-bottom:1px solid #fdfdfd'><td colspan=5><br></td></tr>";
		$block='block';
		$none='none';
		$trash='"Delete this contact"';
		$r = query("select count(*) as total_unread from sms_history where to_mobile = '".$mobile."' and message !='' and from_mobile = '".$call[to_mobile]."' and is_read=0");
		$new_calls = $r[0][total_unread];
		$str_new = "";
		if ($new_calls) {
			$str_new = " <font color=#333>New:</font> <span id='new_calls' style='padding:5px; padding-left: 10px; padding-right: 10px; width:40px; border-radius:150px; background: red; color: white'> $new_calls </span>";
		}
		$str .= "
            <div class='span12 plan' style='margin-bottom: 15px'>
				<div class='title' style='height:40px; background: #fff'>
					<div>".$call[type]."</div>
				</div>
				<input type='hidden' id='contact_number_$i' value='".$call[to_long_code]."'>
				<div><span id='con_name_$i' onclick='pause_edit(this, $i)' onblur='edit_contact(this, $i)' class='price' style='background: #fcfcfc'>
					$to_from " . strtoupper($call[show_name]) . "</span>
				</div>
				<div class='description' style=''><b>Shadow Number </b> ". format_sms($call[show_number])  ."
					<br>
					<b>Time</b> ". $call[call_date_time]. " <br><b>Total</b> Calls ". $call[total_calls] .  $str_new . "  
			   </div>
			   	<div style='position:absolute; width:20%; opacity:0.8; box-shadow: 0px 0px 20px rgba(0,0,0,0.6); margin-right:40%; margin-left:40%; margin-top: -50px; border-radius: 6px;' id='help-text-".($i-1)."'></div>

				<div style='background: #fcfcfc'>
					<span>
						<img onclick='del_call_log(".$call[show_number].")' src='images/trash.png' onmouseover='help(0, $name, $i)' onmouseout='help_out(0, $i)' style='height:30px; cursor: hand; cursor: pointer'>
					</span>
					<span>
						<img onclick='add_fav(".$call[show_number].")' src='images/star.png' onmouseover='help(1, $name, $i)' onmouseout='help_out(1, $i)' style='height:30px; cursor: hand; cursor: pointer'>
					</span>
					<span>
						<img onclick='add_con(".$call[show_number].", $name)' src='images/edit.png' onmouseover='help(2, $name, $i)' onmouseout='help_out(2, $i)' style='height:30px; cursor: hand; cursor: pointer'>
					</span>
					<span>
						<img onclick='add_block(".$call[show_number].")' src='images/lock.png' onmouseover='help(3, $name, $i)' onmouseout='help_out(3, $i)' style='height:30px; cursor: hand; cursor: pointer'>
					</span>
					<span>
						<img onclick='openRequestedPopup($x2)' src='images/mobile.png' onmouseover='help(4, $name, $i)' onmouseout='help_out(4, $i)' style='height:30px; cursor: hand; cursor: pointer'>
					</span>
					 <span id='lc_$i'></span>
				</div>
				<hr>
				

			   <a class='btn btn-primary' href='#' onclick='openRequestedPopup($x2)'>View | Send SMS Message</a>
			</div>";
				$ct++;
	}
	if ($ct == 0) echo '0';
		else echo $str;
?>