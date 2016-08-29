<?
require_once __DIR__ . '/inc/utils.class.php';
$c=new utils;
$c->connect();

if (!isset($_REQUEST[categoryID])) $categoryID=-1;
	else $categoryID=$_REQUEST[categoryID];

$sql="select * from cat where parentID=$categoryID";
$q=$c->query($sql);
if ($q) { 
$sql="select * from cat where categoryID=$categoryID";
$menu=$c->query($sql);
	$path="<a href='javascript:gen_ebay_cat()'><span style='font-size:16px'>Home</span></a> > ";
	$parts=explode(":",$menu[0]['pathID']);
	for ($p=0;$p<count($parts);$p++) {
		$r=rand(50,200);
		$g=rand(20,255);
		$b=rand(40,255);
		$color="RGB($r,$g,$b)";
		$menu=$c->query("select * from cat where categoryID='".$parts[$p]."'");
		$mCatName='"'.$menu[0][category].'"';
		$mCatPath='"'.$menu[0][path].'"';
		$mCatID=$menu[0][categoryID];
	
		$path .= "<a href='javascript:gen_ebay_cat($mCatID)'><span style='color:$color;opacity:1;font-size:16px'>" . $menu[0][category] . "</span><span></a> > </span>";
	}
	echo "<h2><div style='opacity:1;font-family: Fredericka the Great;text-align:left'>$path</div></h2>";

foreach ($q as $cat) {
	$catName='"'.$cat[path].'"';
	echo "<a href='javascript:gen_ebay_cat(".$cat[categoryID].",$catName)'><div style='text-align:left'><span><img src='images/star_on.png' style='width:10px;margin-right:20px'></span><span style='font-family:Open Sans Condensed;font-size:16px;color:#000'>".$cat[category]."</span></div></a>";
}
}