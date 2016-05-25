<?php 
class user_mang{
	public function user_login($usern, $password){

	require_once dirname(__file__) .  '/system_strings.php';
	$sys_st = new system_strings();
	
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false)	return false;
		
		$sql = "SELECT [ID] FROM [SYSTEMUSER] WHERE [USERNAME] = '".$usern."' and [PASSWORD] = '".$password."' and ROLE_ID = 3"; 
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
		if ($result === false)	return false;
		
		$row_count = sqlsrv_num_rows( $result );
		
		if ($row_count == 1) return true;
		else return false;
		
		sqlsrv_free_stmt( $result);
	
	}
	public function user_cookie($usern, $password){

	require_once dirname(__file__) .  '/system_strings.php';
	$sys_st = new system_strings();
	
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false)	return false;
		
		$sql = "SELECT [ID], [LANGUAGE_ID] FROM [SYSTEMUSER] WHERE [USERNAME] = '".$usern."' and [PASSWORD] = '".$password."'"; 
		$result = sqlsrv_query($conn, $sql);
		if ($result === false)	return false;
		
		
		$row = sqlsrv_fetch_array($result);
		
		$sql = "SELECT [CODE] FROM [LANGUAGE] WHERE [ID] = ".$row['LANGUAGE_ID']."";
		$result2 = sqlsrv_query($conn, $sql);
		if ($result2 === false)	return false;
		
		$row2 = sqlsrv_fetch_array($result2);
		
		$cookie_name = "KONGSBERG-REPORTS-" . $row['ID'];
		
		if(isset($_COOKIE[$cookie_name])){
		
		$sql = "SELECT [COOKIE_VALUE] FROM [USER_COOKIE] WHERE [USER_ID] = '".$row['ID']."'"; 
		$result = sqlsrv_query($conn, $sql);
		if ($result === false)	return false;
		
		$row = sqlsrv_fetch_array($result);
		
		if(md5($_COOKIE[$cookie_name]) == $row['COOKIE_VALUE']){
		
			$cookie_value = $_COOKIE[$cookie_name];
			
			setcookie($cookie_name , "", time()-3600, "/");
			setcookie($cookie_name, $cookie_value, time() + (86400 * 30 * 3), "/");
		
			setcookie("KONGSBERG-REPORTS-LAN" , "", time()-3600, "/");
			setcookie("KONGSBERG-REPORTS-LAN", $row2['CODE'], time() + (86400 * 30 * 3), "/");
			
			return false;
		}
		else{return true;}
		}
		
		else{return true;}
		
		sqlsrv_free_stmt( $result);
	
	}
	
	public function admin_login($usern, $password){

	require_once dirname(__file__) .  '/system_strings.php';
	$sys_st = new system_strings();
	
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false)	return false;
		
		$sql = "SELECT [ID] FROM [SYSTEMUSER] WHERE [USERNAME] = '".$usern."' and [PASSWORD] = '".$password."' and ROLE_ID = 1"; 
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
		if ($result === false)	return false;
		
		$row_count = sqlsrv_num_rows( $result );
		
		if ($row_count == 1) return true;
		else return false;
		
		sqlsrv_free_stmt( $result);
	
	}
	
	public function make_session($usern, $password){

	require_once dirname(__file__) .  '/system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [ID], [USERNAME], [LANGUAGE_ID], [COUNTER], [LAST_LOGING] FROM [SYSTEMUSER] WHERE [USERNAME] = '".$usern."' and [PASSWORD] = '".$password."' and ROLE_ID = 3"; 
		$result = sqlsrv_query($conn, $sql);
		$row = sqlsrv_fetch_array($result);
		
		$sql = "SELECT [CODE] FROM [LANGUAGE] WHERE [ID] = ".$row['LANGUAGE_ID']."";
		$result2 = sqlsrv_query($conn, $sql);	
		$row2 = sqlsrv_fetch_array($result2);
		
		$count = $row['COUNTER'] + 1;
		
		date_default_timezone_set('Europe/London');
		
		$sql = "UPDATE [SYSTEMUSER] SET [COUNTER] = ".$count.", [LAST_LOGING] = '".date("Y-m-d H:i:s")."' WHERE [ID] = ".$row['ID']."";
		$result3 = sqlsrv_query($conn, $sql);
		
		
		
		session_start();
		session_unset();
		session_destroy();
		
		session_start();
			$_SESSION['userid']=$row['ID'];
			$_SESSION['uname']=$row['USERNAME'];
			$_SESSION['admin']=false;
			$_SESSION['language']=$row2['CODE'];
			$_SESSION['login_time']=date("Y-m-d H:i:s");
  		
		sqlsrv_free_stmt( $result);
		sqlsrv_free_stmt( $result2);
		sqlsrv_free_stmt( $result3);
	}
	public function make_admin_session($usern, $password){

	require_once dirname(__file__) .  '/system_strings.php';
	$sys_st = new system_strings();
	
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		$sql = "SELECT [ID], [USERNAME], [LANGUAGE_ID] FROM [SYSTEMUSER] WHERE [USERNAME] = '".$usern."' and [PASSWORD] = '".$password."'"; 
		$result = sqlsrv_query($conn, $sql);
		$row = sqlsrv_fetch_array($result);
		$sql = "SELECT [CODE] FROM [LANGUAGE] WHERE [ID] = ".$row['LANGUAGE_ID']."";
		$result2 = sqlsrv_query($conn, $sql);
		
		
		$row2 = sqlsrv_fetch_array($result2);
		
		session_start();
		session_unset();
		session_destroy();
		
		session_start();
			$_SESSION['userid']=$row['ID'];
			$_SESSION['uname']=$row['USERNAME'];
			$_SESSION['admin']=true;
			$_SESSION['language']=$row2['CODE'];
  		
		sqlsrv_free_stmt( $result);
		sqlsrv_free_stmt( $result2);
	}
}
?>