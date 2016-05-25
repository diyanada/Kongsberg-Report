<?php 
require_once dirname(__file__).'/../../../class/system_strings.php';
$sys_st = new system_strings();
			
require_once dirname(__file__).'/../../../class/DB.php';
$db=new database_retrive();

require_once dirname(__file__).'/../../../class/DB_connection.php';
$DBC = new DB_connection();

$target_dir = "/REPORT_DATA/";





$target_file = basename($_FILES["fileToUpload"]["name"]);

// Check if $uploadOk is set to 0 by an error

$target_file_fake = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file_fake,PATHINFO_EXTENSION);

$filez =  "KNGREPDT" . rand(111111, 999999);
$target_file = $sys_st->image_path($target_dir . $filez . "." . $imageFileType );

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql = "KNG_REPORT_FILE";
		
	$params = array( 
					 
					 array($filez . "." . $imageFileType  , SQLSRV_PARAM_IN),
					 array($_POST['file_tit'], SQLSRV_PARAM_IN),
					 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DBC->DB_StoredProcedure("", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
		if ( $responce['status'] == 100 ){
			
			$txt = "<strong style='color:#009900'>Successfully Upadte</strong>";
			
			echo $txt;
		
		}
		else 
		{
			
			$txt =  "<strong style='color:#900'>NOT Uplord</strong>";
			
			echo $txt;
		
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>