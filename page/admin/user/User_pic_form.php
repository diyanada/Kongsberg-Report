<?php 
require_once dirname(__file__).'/../../../class/system_strings.php';
$sys_st = new system_strings();

$sql = "SELECT [IMAGE] as VALUE FROM [SYSTEMUSER_DETAILS] WHERE [ID] = ".$pram['ID'] ."";
			
require_once dirname(__file__).'/../../../class/DB.php';
$db=new database_retrive();

require_once dirname(__file__).'/../../../class/DB_connection.php';
$DBC = new DB_connection();


$target_dir = "/PROFILE_PIC/";
$target_file = $sys_st->image_path($target_dir . $db->set_value($sql) .  ".jpg");

$uploadOk = 1;

$target_file_fake = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file_fake,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check == false)  {
		echo '<script type="text/javascript">alert("File is not an image.")</script>';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {

    if(rename($target_file, $sys_st->image_path($target_dir . "HISTORY/" . $pram['ID'] . "-KNGPROPIC-" . date("Y-m-d-H-i-s", time()) . ".jpg"))){
		$uploadOk = 1;
	}
	else{
		$uploadOk = 0;
	}
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1500000) {
	echo '<script type="text/javascript">alert("Sorry, your file is too large.")</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
$filez = $pram['ID'] . "KNGPROPIC" . rand(111111, 999999);
$target_file = $sys_st->image_path($target_dir . $filez . ".jpg");

if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "KNG_USER_IMAGE";
		
	$params = array( 
					 array($pram['ID'], SQLSRV_PARAM_IN),
					 array($filez, SQLSRV_PARAM_IN),
					 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DBC->DB_StoredProcedure("", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
		if ( $responce['status'] == 100 ){
			
			$txt = "<strong style='color:#009900'>Successfully Upadte</strong><br /><br />
			<input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
			
			echo '<script type="text/javascript"> document.getElementById("resoult").innerHTML = ' . $txt . ';</script>';
		
		}
		
		else{
			$txt = "<strong style='color:#900'>Can't insert to Database<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
			
			echo '<script type="text/javascript"> document.getElementById("resoult").innerHTML = ' . $txt . ';</script>';
		}
	
    } else {
		echo '<script type="text/javascript">alert("Sorry, there was an error uploading your file.")</script>';
    }
}
?>