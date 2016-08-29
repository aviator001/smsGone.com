<?
$a=$_REQUEST['task'];
$name=$_REQUEST['name'];
$value=$_REQUEST['value'];
	
if ($a=='all') {
	$c=apcu_cache_info();
	$c=($c[cache_list]);
	$c = json_decode(json_encode($c));	
	for ($i=0;$i<count($c);$i++){
		$k=$c[$i]->key;
		$v=apc_fetch($k);
		$arr[$k]=$v;
	}
	echo json_encode($arr);
	exit;
}

if ($a=='set') {
	apcu_store($name,$value);
	$value_new=apcu_fetch($name);
	if ($value==$value_new) echo 'Ok';
		else echo 'Error';
	exit;
}

if ($a=='get') {
	$value=apcu_fetch($name);
}

if ($a=='clear') {
	clear_apcu_cache();
	$r=dump();
	if (count($r)<1) echo 'Ok';
		else echo 'Error';
}
?>