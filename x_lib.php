<?
	/* ** * ** ** * ** ** * ** ** * ** ** * ** **
	 Copyright 2014 ALL RIGHTS RESERVERD!ew3
    --------------------------------------------
		1.	AUTHOR		:	Gautam Sharma
		2.	COMPANY		:	finggr.com LLC
		2.	APP			:	finggr.com
		3.	MODULE		:	Utility Library
		4.	PAGE		:	x_lib.php
		5.	DESCRIPTION	:	Utility Functions
		6.	DATE		:	July 5th 2014
		7.	EMAIL		:	xtue.web@gmail.com
	--------------------------------------------
	* ** * ** ** * ** ** * ** ** * ** ** * ** **/
	
//error_reporting(0);
$dbhandle=mysql_connect("199.91.65.85","gautamadmin","gautam2014!") or die("Unable to connect");
$select=mysql_select_db("finggr",$dbhandle) or die("Unable to connect to db");

function add_date($date, $days, $unit="Days"){
	$date = strtotime("+".$days." ".$unit, strtotime($date));
	return  date("Y-m-d H:i:s", $date);
}

function query2HTML ($sql)
{
	$x=0; $first_row = true;
	$style  = "style='background:#f0f0f0;color:black;padding:15px;text-shadow:1px 1px 5px white;font-size:14px;width:auto;font-family:Century Gothic;margin-left:auto;margin-right:auto'";
	$header = "<table $style cellpadding=10><tr id='th'>";	
	$f = strGetAB('select','from', $sql);
	$f = explode(',', $f);
	$f = (query($sql));
	$table  = $header;
	$rows = count($f);
		for($c=0; $c <= $rows; $c++){
			$bg = ($x==0) ? 'lightblue' : 'white';
			$x = ($x == 1) ? 0 : 1;
			 if ($c == 0) $table .= "<tr style='background:black; color:white;' id='th'>";
				else $table .= "<tr style='background:$bg' id='r$x'>";
				foreach($f[$c] as $_key => $_value)
					{
						if ($c == 0) $table .= "<td>" . $_key . "</td>";
							else $table .= "<td>" . strtoupper($_value) . "</td>";
					}
		}
	$table .= "</table>";
	return $table;
}
	function isValidMobile($mob) {
		$num = trim($mob);
		$arr_a = array("-","."," ","(",")");
		$arr_b = array("","","","","");
		$num = str_replace($arr_a, $arr_b, $num);

		if ((strlen($num) < 10) || (strlen($num) > 11)) return false;
		$num = (strlen($num) == 11) ? $num : ('1' . $num);	
		
		if ((strlen($num) == 11) && (substr($num, 0, 1) == "1")) {
			return $num;
		} else {
			return false;
		}
	}

	function get_caller_id($m, $external_lookup = false, $my_mob = "") {
	if ($my_mob) {
		$q = query("select name from sms_contacts where phone = '$m' and owner_phone = '$my_mob'");
	} else {
		$q = query("select name from sms_caller_id where mobile = '$m'");
	}
	if (!$q[0][name] || stristr($q[0][name], 'user')) {
		if ($my_mob) {
			$z = query("select name from sms_caller_id where mobile = '$m'");
		} else {
			$z = query("select name from sms_contacts where phone = '$m'");
		}
		if (!$z[0][name]) {
			//if ($external_lookup) $name = trim(file_get_contents("http://shadowsms.com/x_sms_id.php?mobile=".trim($m)));
			if (stristr($name, "Invalid")) $name = "ShadowSMS User";
			if ($name) mysql_query("INSERT INTO sms_caller_id VALUES ('NULL', '$m', '$name')");
		} else {
			$name = $z[0][name];
		}
	} else {
		$name = $q[0][name];
	}
		return !$name ? 'MOBILE USER' : $name;
	}

	function set_caller_id($n, $m) {
		$q = query("select name from sms_caller_id where mobile = '$m'");
		if (!$q[0][name] || stristr($q[0][name], 'user')) {
			mysql_query("INSERT INTO sms_caller_id VALUES ('NULL', '$m', '$name')");
			return true;
		} else {
			return false;
		}
		return $name;
	}
	
	
function q($filter, $field='*', $filter_by = 'mobile',  $table = 'sms_subscribers') {
	$fields = ($field == "*") ? "*,*" : $field;
	$fields = explode(",",$field);
	if ($filter == '0') $filter = $_COOKIE['mobile'];
	$assoc_array = ( count($fields) > 1 ) ? 1 : 0;
	echo "select $field from $table where $filter_by = '$filter'";
	if (($assoc_array)||($field=='*')) {
		$query = mysql_query("select $field from $table where $filter_by = '$filter'");
		if (!$query) return null;
		while ($row = mysql_fetch_assoc($query)) {
			foreach($row as $_key => $_value) {
				$str .= "{$_key}=".$_value.'&';
			}
			return $str = substr($str, 0, -1);
		}
	}
	else
	{
		$result = mysql_fetch_assoc(mysql_query("select $field from $table where $filter_by = '$filter'"));
		if (!$result) return null;
		${$field} = $result[$field];
		return "$field=${$field}";
	}
}	

function f($obj)
{
	if ($obj) return mysql_fetch_assoc($obj);
}

function query_alt($objSQL)
{
	$objQUERY = mysql_query($objSQL);
	if (!$objQUERY) return null;
		while ($row = mysql_fetch_assoc($objQUERY)) 
		{
				foreach($row as $_key => $_value) {
					$r[] = array("{$_key}" => $_value);
				}
			$result = $r;
		}
	return $result;	
}

function query($objSQL)
{
	if (!($objQUERY = mysql_query($objSQL))) return null;
	while ($row = mysql_fetch_assoc($objQUERY)) $result[] = $row;
	return $result;	
}

function iquery($objSQL)
{
	if (!($objQUERY = mysqli_query($objSQL))) return null;
	while ($row = mysqli_affected_rows($objQUERY)) $result[] = $row;
	return $result;	
}

function iQ($objSQL)
{
	if (!($objQUERY = mysql_query($objSQL))) return null;
	while ($row = mysql_fetch_assoc($objQUERY)) $result[] = $row;
	return $result[0];	
}

function X($objSQL) {
	if (!($objQUERY = mysql_query($objSQL))) return null;
	while ($row = mysql_fetch_assoc($objQUERY)) $result[] = $row;
	return $result[0];	
}

function fields($table) { 
      $result = mysql_query("SHOW COLUMNS FROM ". $table); 
       if (!$result) { 
         echo 'Could not run query: ' . mysql_error(); 
       } 
       $fieldnames=array(); 
       if (mysql_num_rows($result) > 0) { 
         while ($row = mysql_fetch_assoc($result)) { 
           $fieldnames[] = $row['Field']; 
         } 
       } 

       return $fieldnames; 
 } 
 
 
function quote2entities($string,$entities_type='number')
 {
     $search                     = array("\"","'");
     $replace_by_entities_name   = array("&quot;","&apos;");
     $replace_by_entities_number = array("&#34;","&#39;");
     $do = null;
     if ($entities_type == 'number')
     {
         $do = str_replace($search,$replace_by_entities_number,$string);
     }
     else if ($entities_type == 'name')
     {
         $do = str_replace($search,$replace_by_entities_name,$string);
     }
     else
     {
         $do = addslashes($string);
     }
     return $do;
 } 	
 	
	function GetArrayFromColumns($table, $filter_by_field, $filter_by_value, $partial_column_name)	{
		$rowIndex = 0;
		$c = 0;
		$SQL = "select * from $table where ".$filter_by_field." = ".$filter_by_value;
		$resultc = mysql_query($SQL);
		while ($rowc = mysql_fetch_assoc($resultc)) {

			foreach($rowc as $_key => $_value) {
			if(strpos($_key, $partial_column_name) === 0){
			if ((!empty($_value))){
					$photos[$c] = $_value;
					$c++;
				}
			   }
			  }
			}
		mysql_free_result($resultc);
		return $photos;
	}



	function showQUERY($sql)
	{
		$table = "
		<style>
			table, tr
			{
				color: black;
				border:0px solid silver;
				background: #f0f0f0;
				padding: 15px
				font-family: Century Gothic;
				font-size: 12px;
				text-shadow: 1px 1px 5px white;
				width: auto;
			}
			#r0
			{
				text-shadow: 1px 1px 1px white;
				background: lightblue;
			}
			#th
			{
				background: black;
				color: white;
			}
		</style>";
		
		$x=0; $first_row = true;
		$header = "<table cellpadding=10 style='font-family:Century Gothic'><tr id='th'>";	
		$f = strGetAB('select','from', $sql);
		$f = explode(',', $f);
		$f = (query($sql));
		$table  .= $header;
		$rows = count($f);
			for($c=0; $c <= $rows; $c++){
				$x = ($x == 1) ? 0 : 1;
				 if ($c == 0) $table .= "<tr style='background:black; color:white;' id='th'>";
					else $table .= "<tr id='r$x'>";
					foreach($f[$c] as $_key => $_value)
						{
							if ($c == 0) $table .= "<td>" . $_key . "</td>";
								else $table .= "<td>" . strtoupper($_value) . "</td>";
						}
			}
		$table .= "</table>";
		return $table;
	}

$aa = range('A','Z');
$n = range(0,9);
$p = array('SP','PD','CM','BR','BL','EX','DL','PC','HS','AT','AM','ST','PS','CN','QM','QN','EQ','PI','LT','GT','SL','MN','SM','BO','BC','DQ','SQ');
$arr_a = array_merge($aa, $n, $p);

$states_arr = array('AK'=>"Alaska",'AZ'=>"Arizona",'AR'=>"Arkansas",'CA'=>"California",'CO'=>"Colorado",'CT'=>"Connecticut",'DE'=>"Delaware",'DC'=>"District Of Columbia",'FL'=>"Florida",'GA'=>"Georgia",'HI'=>"Hawaii",'ID'=>"Idaho",'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",  'KS'=>"Kansas",'KY'=>"Kentucky",'LA'=>"Louisiana",'ME'=>"Maine",'MD'=>"Maryland", 'MA'=>"Massachusetts",'MI'=>"Michigan",'MN'=>"Minnesota",'MS'=>"Mississippi",'MO'=>"Missouri",'MT'=>"Montana",'NE'=>"Nebraska",'NV'=>"Nevada",'NH'=>"New Hampshire",'NJ'=>"New Jersey",'NM'=>"New Mexico",'NY'=>"New York",'NC'=>"North Carolina",'ND'=>"North Dakota",'OH'=>"Ohio",'OK'=>"Oklahoma", 'OR'=>"Oregon",'PA'=>"Pennsylvania",'RI'=>"Rhode Island",'SC'=>"South Carolina",'SD'=>"South Dakota",'TN'=>"Tennessee",'TX'=>"Texas",'UT'=>"Utah",'VT'=>"Vermont",'VA'=>"Virginia",'WA'=>"Washington",'WV'=>"West Virginia",'WI'=>"Wisconsin",'WY'=>"Wyoming");
//Get all Characters between 2 strings or tags in a bigger string
function strGetAB($a, $b, $str)	
{
	return substr($str, (strPos($str, $a) + strlen($a)), (strPos($str, $b) - (strPos($str, $a) + strlen($a))));
}

//Get all Characters between 2 strings or tags in a URL
function urlGetAB($a, $b, $url)
{
	$str = file_get_contents($url);
	return substr($str, (strPos($str, $a) + strlen($a)), (strPos($str, $b) - (strPos($str, $a) + strlen($a))));
}

function pages($showing, $of, $results, $url)
{
			$a = urlGetAB($showing, $results, $url);
			$a = "1".strGetAB("1", 'results', $a);
			$x = explode(" $of ", $a);
			$total = $x[1];
			$p = explode("-", $x[0]);
			$start_page = $p[0];
			$end_page = $p[1];
			$ep = explode("of", $end_page);
			$detail = array( "total" => trim($ep[1]),
						   "start_page" =>  trim($start_page),
						   "end_page"   =>  trim($ep[0])
						);
			return $detail;
}

function stripHTML($document){ 
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
                '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
                '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
                '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
); 
	$text = preg_replace($search, '', $document); 
	return $text; 
 } 

function html2txt($document){ 
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
                '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
                '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
                '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
); 
	$text = preg_replace($search, '', $document); 
	return $text; 
 } 

		function show($arrBigObj) {
			echo "<pre>";
				print_r($arrBigObj);
			echo "</pre>";
		}

		function format_sms($objSMS) {
			return ' (' . substr($objSMS,1,3) . ') ' . substr($objSMS,4,3) . ' - ' . substr($objSMS,7,4);
		}

		function fetchJSON($query)
		{
			$api = "4RRta5iMn9I2lDTRoo2I2Spnl74xZzaz";
			$sec = "1lyd0XoDBvNP9Auk";
			$objURL = "http://api.developer.sears.com/v2.1/products/search/Kmart/json/keyword/$query?apikey=$api";
			$json = file_get_contents($objURL);
		}
		
		function rebuildJSON($json)
		{
			//Loop through all Records in JSON string/object and:
			//For EACH field in RESULTS, recreate each field below:
			
			$item_results[] = array(
						'id' =>  "ID",
						'name' =>  "NAME",
						'description' => "DESCRIPTION",
						'image' => "IMAGE",
						'price' => "PRICE"
					);

			$count++;
			$results['count'] = $count."";
			$results['results'] = $item_results;

			$json = stripslashes(@json_encode($results));
			echo $json;
		}

		function fetchandRebuildJSON($query)
		{
			$api = "4RRta5iMn9I2lDTRoo2I2Spnl74xZzaz";
			$sec = "1lyd0XoDBvNP9Auk";
			$objURL = "http://api.developer.sears.com/v2.1/products/search/Kmart/json/keyword/$query?apikey=$api";
			$json = file_get_contents($query);

			//Loop through all Records in JSON string/object and:
			//For EACH field in RESULTS, recreate each field below:
			
			$item_results[] = array(
						'id' =>  "ID",
						'name' =>  "NAME",
						'description' => "DESCRIPTION",
						'image' => "IMAGE",
						'price' => "PRICE"
					);

			$count++;
			$results['count'] = $count."";
			$results['results'] = $item_results;

			$json = stripslashes(@json_encode($results));
			echo $json;
		}


		function trimWHITE($objHTMLText){
			$event_desc = preg_replace("/(\\t|\\r|\\n)/","",trim($objHTMLText));  //recursively remove new lines \\n, tabs and \\r
		}

		function dt($da, $strDate = "D jS \of M \[h A\]") {
			return date_format(date_create($da), $strDate);
		}
		
		function switchDateforWords($date2)
		{
			$ts1 = strtotime(date("Y")."-".date("m")."-".date("d"));
			$ts2 = strtotime($date2);
			$dateDiff    = $ts1 - $ts2;
			$fd    = floor($dateDiff/(60*60*24));
			if ($fd == 0) $rt = "Today!";
			if ($fd > 0) $rt = "$fd Days Ago";
			if ($fd < 0) $rt = "In ".$fd*(-1)." Days";
			return $rt;
		}


		function array_to_json( $array ){
		if( !is_array( $array ) ){
			return false;
			echo "mp";
		}

		$associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
		if( $associative ){

			$construct = array();
			foreach( $array as $key => $value ){
				if( is_numeric($key) ){
					$key = "key_$key";
				}
				$key = "\"".addslashes($key)."\"";
				if( is_array( $value )){
					$value = array_to_json( $value );
				} else if( !is_numeric( $value ) || is_string( $value ) ){
					$value = "\"".addslashes($value)."\"";
				}
				$construct[] = "$key: $value";
			}
			$result = "{ " . implode( ", ", $construct ) . " }";
		} else {
			$construct = array();
			foreach( $array as $value ){
				if( is_array( $value )){
					$value = array_to_json( $value );
				} else if( !is_numeric( $value ) || is_string( $value ) ){
					$value = "'".addslashes($value)."'";
			   }
				$construct[] = $value;
			}
			$result = "[ " . implode( ", ", $construct ) . " ]";
		}
		return $result;
	}

	function makeHTML($field, $table, $type, $validation)
	{
		$type = "text, combo, auto-complete";
	}


 function getUrlContents($url, $maximumRedirections = null, $currentRedirection = 0)
 {
     $result = false;
     
     $contents = @file_get_contents($url);
     
     // Check if we need to go somewhere else
     
     if (isset($contents) && is_string($contents))
     {
         preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?' . '[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?' . '[\s]*[\/]?[\s]*>/si', $contents, $match);
         
         if (isset($match) && is_array($match) && count($match) == 2 && count($match[1]) == 1)
         {
             if (!isset($maximumRedirections) || $currentRedirection < $maximumRedirections)
             {
                 return getUrlContents($match[1][0], $maximumRedirections, ++$currentRedirection);
             }
             
             $result = false;
         }
         else
         {
             $result = $contents;
         }
     }
     
     return $contents;
 }
	
function setJS($varName, $varVAL)
{
	echo "<script>";
		echo "var $varName = '$varVAL'";
	echo "</script>";
}
	
function yell($objMSG)
{
	echo "<script>";
		echo "alert('$objMSG')";
	echo "</script>";
}


function query2HTML1 ($sql)
{
	$x=0; 
	$first_row = true;
	$style  = "style='background:#f0f0f0;color:black;padding:15px;text-shadow:1px 1px 5px white;font-size:14px;width:auto;font-family:Open Sans Condensed;margin-left:auto;margin-right:auto'";
	$header = "<table $style cellpadding=10><tr id='th'>";	
	$f = strGetAB('select','from', $sql);
	$f = explode(',', $f);
	$f = (query($sql));
	$table  = $header;
	$rows = count($f);
		for($c=0; $c <= $rows; $c++){
			$bg = ($x==0) ? 'lightblue' : 'white';
			$x = ($x == 1) ? 0 : 1;
			 if ($c == 0) $table .= "<tr style='background:black; color:white;' id='th'>";
				else $table .= "<tr style='background:$bg' id='r$x'>";
				foreach($f[$c] as $_key => $_value)
					{
						if ($c == 0) $table .= "<td>" . $_key . "</td>";
	 						else $table .= "<td>" . strtoupper($_value) . "</td>";
					}
		}
	$table .= "</table>";
	return $table;
}
?>

                            