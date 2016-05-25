<?php 

class system_strings{
	
	function severnam(){
		include dirname(__FILE__) . '/../owsh_secret.php';
		return 	$server_name; 
	}
	
	function connectionInfo(){
		include dirname(__FILE__) . '/../owsh_secret.php';
		$connectionInfo = array( "Database"=>$database , "UID"=>$db_username, "PWD"=>$db_password);
		return 	$connectionInfo; 
	}
	function language_path($fiel){
		include dirname(__FILE__) . '/../owsh_secret.php';
		$path = $lang_path . $fiel;
		return 	$path; 
	}
	function image_path($fiel){
		include dirname(__FILE__) . '/../owsh_secret.php';
		$path = $image_path . $fiel;
		return 	$path; 
	}
}
?>