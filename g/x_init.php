<?	include "utils.class.php";	include "../x_lib.php";	$utils = new utils();	$dir = date('HYmdHh');	mkdir("../xsr/$dir", 0777, true);	$src = "../../img";	$dst = "../xsr/$dir";	$fnstr = '';	$key = date('Ymdh');	$user_token = substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4).substr(abs(rand(1111,9999)),0,4);	$bin_user_token = $utils->strToBin($user_token);	$aes_user_token = $utils->encrypt($bin_user_token, $key);	for ($i=1; $i <= 63; $i++) {		$fn = substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4).'x'.substr(abs(rand(1111,6666)),0,4);		$fn2 = $fn."_o";		$f = '"'.$fn.'"';		$f2 = "$dst/$fn2.png";		$f_o = '"'.$f2.'"';		$f3 = "$dst/$fn.png";		$f_b = '"'.$f3.'"';		if ($i > 36) {			$fn = "z$i";			$fn2 = "z$i";		}		$width="50px";		if ($i>61) $width="65px";		copy("$src/z$i.png", "$dst/$fn.png");		copy("$src/z$i.png", "$dst/$fn2.png");		$img['img'] = "<img id='$fn' onclick='print_me($f)' onmouseover='this.style.opacity=1' onmouseout='this.style.opacity=0.8' style='opacity:0.8;cursor:mouse;cursor:pointer;box-shadow:inset 2px 2px 10px #666666' src='$dst/$fn.png'>";		if ($i == 39) $str .= "<img id='$fn' onmouseover='this.style.opacity=1' onmouseout='this.style.opacity=0.8' onclick='delete_me(this)' style='opacity:0.8;cursor:mouse;cursor:pointer;box-shadow: inset 2px 2px 10px #666666; width: $width' src='$dst/$fn.png'>";			else $str .= "<img id='$fn' onmouseover='this.style.opacity=1' onmouseout='this.style.opacity=0.8' onclick='print_me(this,$f_b)' style='opacity:0.8;cursor:mouse;cursor:pointer;box-shadow: inset 2px 2px 10px #666666; width: $width' src='$dst/$fn.png'>";		$img_arr[$arr_a[$i-1]] = $fn;		$fnstr .= $fn.' ';	}		$file = "../../fn/".$bin_user_token;	 	$link = "../../f/".$bin_user_token;		$current = $fnstr;		file_put_contents($file.'_a', json_encode($img_arr));		file_put_contents($file.'_b', $current);		echo( date('Ymdh').'|'.$aes_user_token.'|'.$str.'|'.$bin_user_token.'|'.$file.'_a'.'|'.$dir);?> 