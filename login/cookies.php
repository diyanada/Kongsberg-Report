<?php
	
	
	require_once 'class/system_strings.php';
	$sys_st = new system_strings();
	
	require_once 'class/interface_magic.php';
	$inter = new interface_magic();
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	$sql = "SELECT [USER_ID] FROM [USER_COOKIE] WHERE [USER_ID] = '".$arr[2]."' and [COOKIE_VALUE] = '".md5($arr[4])."'"; 
	$result = sqlsrv_query($conn, $sql);
	$row = sqlsrv_fetch_array($result);
	
	if($row['USER_ID'] == $arr[2])	{
	
	$cookie_name = "KONGSBERG-REPORTS-" . $arr[2];
	$cookie_value = $arr[4];
	
		if(isset($_COOKIE[$cookie_name])) {
			setcookie($cookie_name , "", time()-3600, "/");
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 3), "/");
			
			setcookie("KONGSBERG-REPORTS-LAN" , "", time()-3600, "/");
			setcookie("KONGSBERG-REPORTS-LAN", $arr[3], time() + (86400 * 30 * 3), "/");
		} else {
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 3), "/");
			setcookie("KONGSBERG-REPORTS-LAN", $arr[3], time() + (86400 * 30 * 3), "/");
		}
	
	require_once '/views/kng_contents.php';
	$page = new kng_contents();
	die ($page -> content("page/main.php"));
		
	}
	else{
		die ($inter->owsh_echo("KONGER10", $arr[3]));
	}
		
	sqlsrv_free_stmt( $result);
?>
