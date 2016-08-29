<?
$dbhandle=mysql_connect("199.91.65.85","gautamadmin","gautam2014!") or die("Unable to connect");
$select=mysql_select_db("finggr",$dbhandle) or die("Unable to connect to db");
function query($objSQL)
{
	if (!($objQUERY = mysql_query($objSQL))) return null;
	while ($row = mysql_fetch_assoc($objQUERY)) $result[] = $row;
	return $result;	
}
function uploadImageFile() { // Note: GD library is required for this function

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$new_width = ((int)$_POST['w'] > 600) ? 600 : (int)$_POST['w'];
		$new_height = ((int)$_POST['h'] > 600) ? 600 : (int)$_POST['h'];

		$x1 = (int)$_POST['x1'];
		$y1 = (int)$_POST['y1'];
		
        $iJpgQuality = 100;

        if ($_FILES) {

         // if no errors and size less than 250kb
        //    if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 100000 * 1024 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {

					$cryptic_name = md5(time().rand());
                    $sTempFileName = 'uploads/' . $_COOKIE['mobile'].'_'. $cryptic_name;
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                            case IMAGETYPE_PNG:
                                $sExt = '.png';
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }
                        $vDstImg = @imagecreatetruecolor( $new_width, $new_height );
                        imagecopyresampled($vDstImg, $vImg, 0, 0, $x1, $y1, $new_width, $new_height, (int)$_POST['w'], (int)$_POST['h']);
                        $sResultFileName = 'uploads/'. $cryptic_name . $sExt;
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);

						$mobile = $_COOKIE[mobile];
						$photo = $sTempFileName;

						$sql = "select * from sms_photos where mobile='".trim($mobile)."'";
						$q = query($sql);
						if (count($q)<8) {
							for ($p=0;$p<count($q);$p++) {
								$pid = $pid . $q[$p][photo] . '|';
							}
								mysql_query("insert into sms_photos values('NULL','$mobile','$cryptic_name')");
								$str = "id=$cryptic_name&r=$new_width";
							} else {
								$str = $sql.'err=Max of 8 Photos Allowed!';
						}
						header("Location: x_photos.php?$str");
                    }
                }
			} 
		}
	}

$sImage = uploadImageFile();
?>
