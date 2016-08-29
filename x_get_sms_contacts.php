<?
	include('x_lib.php');
	$mobile = $_REQUEST["mobile"];
	$str .= "<div style='width:100%'>";
	$ctr = 1;
	$arr_a = array(' ');
	$arr_b = array('_');

	$per_page = 10; 
	include 'x_paginate.php'; /* FIRST LINE ADDED TO YOUR CODE*/
	$pages_query = mysql_query("select count(id) as count from sms_contacts where owner_number = '".$mobile."' and cat not in (' ','1','2','3','4','5','6','7','8','9','0','C')") or die(mysql_error());  
	$pages = ceil(mysql_result($pages_query, 0) /$per_page);
 	
	$Q = query("select * from sms_contacts where owner_number = '".$mobile."'  and cat not in (' ','1','2','3','4','5','6','7','8','9','0','C') order by cat asc, name asc  LIMIT $start, $per_page");
	if ($Q) {
		for ($i=1;$i<count($Q);$i++) {
			$phone =  $Q[$i][phone];
			$name  =  addslashes($Q[$i][name]);
			$send_sms = 'send_sms("'.$phone.'","")';
			$phone = '('.substr($phone,1,3).') ' . substr($phone,4,3) . ' - ' . substr($phone,7,4); 
			$str .=	"<div style='margin:10px;padding:20px'><div style='padding:20px;text-align:center;border:3px solid #f0f0f0' onclick='show_hide($i)'><span style='margin-left:20px;'><a href='#'><font style='color:#333;text-shadow:1px 1px 0px #fff'><font style='font-size:1.8em; color: silver'>$name</font></a></span><br><span><font style='font-size:1.3em; color: #28ABE1'>$phone</font></span>";
			$str .=	"</div>";
			$str .=	"<div style='border:3px solid #f0f0f0; border-top: 1px solid #f0f0f0;text-align:center'>";
	
			$str .=	"<table align=center width=100%>
						<tr style='cursor: hand; cursor: pointer; background: #fcfcfc; text-shadow: 1px 1px 0px #fff'>
							<td style='text-align:right;width:12.5%'>
								<span onclick=$send_sms style=''>
									<img src='images/s2.png' style='height:35px'>
								</span>
							</td>
							<td style='text-align:left;width:12.5%'>
								<span style='width:10%'>
									Send SMS
								</span>
							</td>
							<td style='text-align:right;width:12.5%'>
								<span>
									<img src='images/star.png' onmouseover='help(1, $name, $i)' onmouseout='help_out(1, $i)' style='height:30px; cursor: hand; cursor: pointer'>
								</span>
							</td>
							<td style='text-align:left;width:12.5%'>
								<span>
									Add to Favs
								</span>
							</td>
							<td style='text-align:right;width:12.5%'>
								<span>
									<img src='images/edit.png' onmouseover='help(2, $name, $i)' onmouseout='help_out(2, $i)' style='height:30px; cursor: hand; cursor: pointer'>
								</span>
							</td>
							<td style='text-align:left;width:12.5%'>
								<span>
									Add to Contacts
								</span>
							</td>
							<td style='text-align:right;width:12.5%'>
								<span>
									<img src='images/lock.png' onmouseover='help(3, $name, $i)' onmouseout='help_out(3, $i)' style='height:30px; cursor: hand; cursor: pointer'>
								</span>
							</td>
							<td style='text-align:left;width:12.5%'>
								<span>
									Block
								</span>
							</td>
						</tr>
					</table>
					";
		$str .=	"</div>
			</div>";
    	$ctr++;
		}
	}	
	echo paginate_me_header(ceil(mysql_result($pages_query, 0)/$per_page), $per_page);
	echo $str;
	echo paginate_me(ceil(mysql_result($pages_query, 0)/$per_page), $per_page);
?>
