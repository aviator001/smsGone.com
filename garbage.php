<?
	include("../x_lib.php");
	include("utils.class.php");
	$utils = new utils();
	$pass=date('YmdH');
	
	$bin_user_token = $_REQUEST['bin_user_token'];
	$user_token = date('HYmdHh');

	$src = "../../img";
	$dst = "../xsr/";

	for ($i=1; $i < 800; $i++) {
		$k = abs(rand(1,34));
		echo "<img src='../images/img/z$k.png'>";
	}

	if (is_dir("../xsr/$user_token/")) {
		delTree("../xsr/$user_token/");
		unlink("../../f/$bin_user_token");
	}
	
function delTree($dir) { 
   $files = array_diff(scandir($dir), array('.','..')); 
    foreach ($files as $file) { 
      (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
	} 
    return rmdir($dir); 
  } 
?>