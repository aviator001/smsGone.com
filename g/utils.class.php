<?php
/*
*  Author: Gautam Sharma
*  Company: finggr.com
*  Website: www.finggr.com
*  File: utils.class.php
*  June 1, 2014
*
*  This software is sold as-is without any warranties, expressed or implied,
*  including but not limited to performance and/or merchantability. No
*  warranty of fitness for a particular purpose is offered. This script can
*  be used on as many servers as needed, as long as the servers are owned
*  by the purchaser. (Contact us if you want to distribute it as part of
*  another project) The purchaser cannot modify, rewrite, edit, or change any
*  of this code and then resell it, which would be copyright infringement.
*  This code can be modified for personal use only.
*
*  Comments, Questions? Contact the author at GS AT XTUE DOT COM
*/
//echo phpInfo();
//exit;
//error_reporting(1);
include("aes_enc.class.php");
include("aesctr.class.php");
include("mobile.class.php");
$USER_ID = 'guatam@strikeiron.com';
$PASSWORD = 'Strike1';
$WSDL = 'http://ws.strikeiron.com/SMSAlerts4?WSDL';
$client = new SoapClient($WSDL, array('trace' => 0, 'exceptions' => 0));
$registered_user = array("RegisteredUser" => array("UserID" => $USER_ID,"Password" => $PASSWORD));
$header = new SoapHeader("http://ws.strikeiron.com", "LicenseInfo", $registered_user);
$client->__setSoapHeaders($header);

class utils {
	public function show_errors($state=TRUE) {
		if ($state) {
			ini_set("error_reporting", 1);
			error_reporting(E_ALL); 
			ini_set("display_errors", 1); 
			ini_set("display_errors", "On"); 
		} else {
			ini_set("error_reporting", 0);
			error_reporting(E_NONE); 
			ini_set("display_errors", 0); 
		}
	}

		function show($arrBigObj) {
			echo "<pre>";
				print_r($arrBigObj);
			echo "</pre>";
		}

		function format_sms($objSMS) {
			if (!$objSMS) return '';
				else return ' (' . substr($objSMS,1,3) . ') ' . substr($objSMS,4,3) . ' - ' . substr($objSMS,7,4);
		}

		static public function set($name, $value)
		{
			$GLOBALS[$name] = $value;
		}

		static public function get($name)
		{
			return $GLOBALS[$name];
		}

       /** 256 Bit AES Encryption
        *   @returns Encrypted Text
        **/
		public function encrypt($string, $pass, $depth=256)	{	
			return AesCtr::encrypt($string, $pass, $depth);
		}
 
       /** 256 Bit AES Decryption
        *   @returns Decrypted Text
        **/
		public function decrypt($enc_string, $enc_pass, $depth=256)	{	
			return AesCtr::decrypt($enc_string, $enc_pass, $depth);
		}
 
       /** Coverts ASCII to Binary
        *   @returns void
        **/
		public function strToBin($string)	{	
			$bin='';
			for ($i=0; $i < strlen($string); $i++)
			{
				$string[$i] = str_replace("a","@",$string[$i]);
				$string[$i] = str_replace("b","!",$string[$i]);
				$string[$i] = str_replace("c","|",$string[$i]);
				$string[$i] = str_replace("d","$",$string[$i]);
				$string[$i] = str_replace("e","#",$string[$i]);
				$string[$i] = str_replace("f","O",$string[$i]);
				if (!($string[$i] == "|") && !($string[$i]=="@") && !($string[$i]=="#") && !($string[$i]=="$") && !($string[$i]=="O") && !($string[$i]=="!")){
					$bx4 .= (strlen(decbin($string[$i])) == 4) ? decbin($string[$i]) : ((strlen(decbin($string[$i])) == 3) ? "0".decbin($string[$i]) : ((strlen(decbin($string[$i])) == 2) ? "00".decbin($string[$i]) : "000".decbin($string[$i])));
				}
				else
				{
					$bx4 .= $string[$i];
				}
			}
			return $bx4;
		}
 
 
        /** Coverts Binary to ASCII
        *   @returns void
        **/
		public function BinToHex($string) {
			$string = str_replace("O","f",$string);
			$hex='';
			for ($i=0; $i < strlen($string); $i++)
			{
				if (in_array($string[$i], array("a","b","c","d","e","f"))) {
					$hex .= $string[$i];
				}
				else
				{
					$hex .= bindec(substr($string, $i, 4));
					$i = $i + 3;
				}
			}
			return $hex;
		}

	public function random_string($str_length_total, $prepend_str="", $special = false) {
		if ($special) $arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','U','V','W','X','Y','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
			else $arr = array('!','_','-','{','}','[',']','?',';',',','.','%','$','@','~','#','^','*','(',')','+','=','|','<','>','&',':','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','U','V','W','X','Y','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
		for ($i=1; $i<=($str_length_total-strlen($prepend_str)*1); $i++) 
		{
			$prepend_str .= $arr[rand(1,count($arr))];
		}
		return $prepend_str;
	}

	public function make_string($str_length,$str="",$fill)
	{
		$str="";
		for ($i=1; $i<=($str_length-strlen($str)*1); $i++) 
		{
			$str .= $fill;
		}
		return $str;
	}
		
	public function send_sms_old($msg, $cell) {
		if (strlen(trim($cell)) == 10) $cell = '1'.trim($cell);
		$url = 'https://api.clockworksms.com/http/send.aspx?key=6408525f8f27b18fc59ee6c36c8c8c8bb5d2bb83&to=' . trim($cell) . '&content=' . urlencode($msg);
		return file_get_contents($url);
	}	
		
	public function is_mobile() {
		if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$tablet_browser++;
		}
		 
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
			$mobile_browser++;
		}
		 
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
			$mobile_browser++;
		}
		 
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			'newt','noki','palm','pana','pant','phil','play','port','prox',
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			'wapr','webc','winw','winw','xda ','xda-');
		 
		if (in_array($mobile_ua,$mobile_agents)) {
			$mobile_browser++;
		}
		 
		if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
			$mobile_browser++;
			//Check for tablets on opera mini alternative headers
			$stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
			if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
			  $tablet_browser++;
			}
		}
	
		if ($tablet_browser > 0) {
		   // do something for tablet devices
		  return true;
		}
		else if ($mobile_browser > 0) {
		   // do something for mobile devices
		   return true;
		}
		else {
		   // do something for everything else
		   return false;
		}   		
}


	public function __construct ($ip='') {
	ini_set("error_reporting", 1);
/*
	$f="/home/gaysugar/settings.ini";
	try {
			$iniSet = fopen($f, "r");
			while(!feof($iniSet)) {
				$xln=fgets($iniSet);
				$str .= "&".$xln;
				$v=split("=",$xln);
				${$v[0]}=$v[1];
				global $_CONSTANTS;
				$_CONSTANTS[$v[0]]=$v[1];
				
			}
				foreach($_CONSTANTS as $key => $val)
					define(trim($key), trim($val));

				parse_str($str,$ini);
				fclose($iniSet);
				
		} catch (Exception $e) {
			throw new Exception("'settings.ini' file not found.");
		}*/
	}

	public function connect() {
			global $db;
			try {
				global $conn;
				$db = new mysqli("199.91.65.85", "gautamadmin", "Shadow2015!", "finggr");
				$this->conn = $db;
				return $this->conn = $db;
			} catch (Exception $e) {
				return "Unable to connect";
				exit;
			}
	}

		public function close() {
		try {
			$this->conn->close();
			return "Closed";
		} catch (Exception $e) {
			return "Unable to Close";
			exit;
		}
	}

	protected function _ip() {
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];
		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}
		return $ip;
	}

	protected function _ip2($mob) {
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];
		if(filter_var($client, FILTER_VALIDATE_IP))
		{
			$ip = $client;
		}
		elseif(filter_var($forward, FILTER_VALIDATE_IP))
		{
			$ip = $forward;
		}
		else
		{
			$ip = $remote;
		}
		return $mob;
	}

	public function fixMobile($mob) {
		$num = trim($mob);
		$arr_a = array("-","."," ","(",")");
		$arr_b = array("","","","","");
		$num = str_replace($arr_a, $arr_b, $num);

		if ((strlen($num) < 10) || (strlen($num) > 11)) return false;
		$num = (strlen($num) == 11) ? $num : ("1$num");	
		
		if ((strlen($num) == 11) && (substr($num, 0, 1) == "1")) {
			return $num;
		} else {
			return false;
		}
	}

	public function sql($sql) {
		return $this->_sql($sql);
	}

	public function insert($sql) {
		return $this->_insert($sql);
	}

	public function query($sql) {
		return $this->_sql_arr($sql);
	}
	protected function _sql($sql) {
		global $result;
		try {	
				$db=$this->conn;
				if($this->result = $db->query($sql)){
					return $this->result;
				} else {
					return null;
				}
			} catch (Exception $e) {
			return null;
		}
	}

	protected function _insert($sql) {
		global $result;
		try {	
				$db=$this->conn;
				if($db->query($sql)){
					return $db->insert_id;
				} else {
					return null;
				}
			} catch (Exception $e) {
			return null;
		}
	}

	protected function _update($sql) {
		global $result;
		try {	
				$db=$this->conn;
				if($db->query($sql)){
					return $db->insert_id;
				} else {
					return null;
				}
			} catch (Exception $e) {
			return null;
		}
	}

	protected function _sql_arr($sql) {
		global $dbs;
		global $row;
		global $rowset;
		try {
				$db=$this->conn;
			try {
					if($r = $db->query($sql)){
						while ($row =  $r->fetch_assoc()) {
							$arr[] = $row;
						}
						$this->rowset = $arr;
						$r->free();
						return $this->rowset;
					} else {
							return null;
					}
				} catch (Exception $e) {
					return null;
				}
			return $res;
		} catch (Exception $e) {
			return "Unable to connect";
			exit;
		}
	}
	
	function isValidMobile($mob) {
		$num = trim($mob);
		$arr_a = array("-","."," ","(",")");
		$arr_b = array("","","","","");
		$num = str_replace($arr_a, $arr_b, $num);

		if ((strlen($num) < 10) || (strlen($num) > 11)) return false;
		$num = (strlen($num) == 11) ? $num : ("1$num");	

		if ((strlen($num) == 11) && (substr($num, 0, 1) == "1")) {
			return $num;
		} else {
			return false;
		}
	}
}