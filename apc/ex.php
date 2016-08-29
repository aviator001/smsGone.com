<?php
	include "apc.php";
	$token=$_REQUEST[token];
	$action=$_REQUEST[action];
	$name=$_REQUEST[name];
	$value=$_REQUEST[value];
	
	if ($action=='set') {
		store($name,$value);
		if ($value==$value_new) echo 'Ok';
		//	else echo 'Error';
	} else if ($action=='get') {
		echo apc_fetch($name);
		echo $r=get($name);
		if (count($r)>0) echo 'Ok';
			else echo 'Error';
	} else if ($action=='kill') {
		kill($name);
		if (!get($name)) echo 'OK';
			else echo 'Error';
	} else if ($action='all') {
		 $r=dump();
		if (count($r)>0) echo $r;
			else echo 'Error';
	} else if ($action=='clear') {
		$q=clear();
		if ($q<1) echo 'OK';
			else echo 'Error';
	}

	function store($name,$value) {
		apc_store($name,$value,60*60);
		//$value_new=apc_fetch($name);
		//return $value_new;
	}

	function get($name) {
		return apc_fetch($name);
	}

	function dump() {
		$c=apc_cache_info();
		$c=($c[cache_list]);
		return json_encode($c);
	}


	function clear() {
		clear_apc_cache();
		$r=dump();
		return count($r);
	}

	?>
