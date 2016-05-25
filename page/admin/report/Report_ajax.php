<?php

require_once '../../../class/action_token.php';
require_once("../../../session_admin.php"); 
$token = new action_token();

if ($token->admin_access($_GET['token'])){
 	$funti = $_GET['log'];
}
else{
	$funti = "NOFUNTIONS";
	//$funti = $_GET['log'];
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	
 if($funti == "YMIF97L6A1KRRRR")
{
 $data = $_GET['data'];
 		require_once '../../../class/system_strings.php';
		$sys_st = new system_strings();
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) die();
		  

		parse_str($data,$str);
		$menu = $str['item'];
		foreach($menu as $key => $value){
			$key=$key+1;
			
			$sql = "UPDATE [REPORT_MAPPING] SET [ORDER] = " . $key . "  WHERE [ID] = '" . str_replace('KNGRP','KNGRP-',$value) . "'";
			$result = sqlsrv_query($conn, $sql);
			if ($conn === $result) echo($sql);
			
			sqlsrv_free_stmt( $result);
		
		}
		sqlsrv_close( $conn );
		
		echo "Successfully Arranged";
}

else if($funti == "81DGOI21169058PM")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	require_once '../../../class/email.php';
	
	require_once '../../../class/interface_magic.php';
	$inter = new interface_magic();
	
	$sql = "KNG_REPORT_CREATE";
	
	$params = array( 
					 array($_GET["user"], SQLSRV_PARAM_IN),
					 array($_GET["rep_type"], SQLSRV_PARAM_IN),
					 array($_GET["report"], SQLSRV_PARAM_IN),
					 array($_GET["pro_id"], SQLSRV_PARAM_IN),
					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure("5MES4D0HV7RH9Z8H", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){
	
	echo "<strong style='color:#009900'>Successfully Added</strong><br /><br />
		</strong>";
	
	$sql = "SELECT EMAIL, FIRST_NAME FROM   PROJECT_MAPPING INNER JOIN
SYSTEMUSER ON dbo.PROJECT_MAPPING.USER_ID = SYSTEMUSER.ID INNER JOIN
SYSTEMUSER_DETAILS ON dbo.SYSTEMUSER.ID = SYSTEMUSER_DETAILS.ID
WHERE SYSTEMUSER.ROLE_ID = 3 AND PROJECT_MAPPING.PROJECT_ID =  " . $_GET["pro_id"];
		
	$conn = sqlsrv_connect( $sys_str->severnam(), $sys_str->connectionInfo());
	if (!($conn === false)){
	  
		$result = sqlsrv_query($conn, $sql);
		if (!($conn === false)) {
			while($row = sqlsrv_fetch_array($result))
			{
				
				$email = new email();
				
				$to = $row['EMAIL'];
	
	$subject = $inter->owsh_echo("KONGER3");
	
	$msgbody = '
<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<body style="background:#e6e6e7;">
<table cellpadding="0" cellspacing="0" width="540" style="margin:20px auto;">
  <tr>
    <td style="background:#232323; width:100%; height:15px;"></td>
  </tr>
  <!-- TOP BORDER -->
  <!-- TOP BANNER -->
  <tr>
    <td style="width:100%;"><img src="http://kongsberg-reports.com/email/banner_top.jpg" style="border:0; display:block;" /> </td>
  </tr>
  <!-- CONTENT -->
  <tr>
    <td style="width:100%; background:#FFF; text-align:center; padding:40px; font-family:arial; color:#454545; font-size:16px; line-height:24px;">
    <span style="font-size:28px; font-weight:bold;">' . $row["FIRST_NAME"] . ', your latest report is ready!</span><br />
      <br />
       </td>
  </tr>
  <!-- LINK BUTTON -->
  <tr>
    <td style="width:100%; background:#f9b516; text-align:center; font-family:arial; color:#FFF; font-size:16px; padding:60px 0 50px 0;">
    <a href="http://kongsberg-reports.com/" 
	target="_blank" 
    style="color:#FFF; text-decoration:none; padding:20px 40px;; border:2px solid #FFF; display:inline-block;" alt="Login Now">LOGIN NOW</a> </td>
  </tr>
  <!-- SOCIAL LINKS -->
  <tr>
    <td style="width:100%; background:#f9b516; text-align:center; font-family:arial; color:#FFF; font-size:16px; padding:0 0 60px 0;">
    <table cellpadding="0" cellspacing="0" width="138" style="margin:auto;">
        <tr>
          <td><a href="https://www.facebook.com/KongsbergGruppen" target="_blank" style="border:0; display:block;" >
          <img alt="Like us on Facebook" src="http://kongsberg-reports.com/email/fb.gif" /></a></td>
          <td><a href="https://twitter.com/kongsbergasa" target="_blank" style="border:0; display:block;">
          <img alt="follow us on twitter" src="http://kongsberg-reports.com/email/twitter.gif" /></a></td>
          <td><a href="https://www.youtube.com/user/kongsbergmaritime" target="_blank" style="border:0; display:block;">
          <img alt="follow us on youtube" src="http://kongsberg-reports.com/email/yt.gif" /></a></td>
          <td><a href="https://instagram.com/kongsbergasa/" target="_blank" style="border:0; display:block;">
          <img alt="follow us on Instagram" src="http://kongsberg-reports.com/email/instagram.gif" /></a></td>
          <td><a href="https://www.linkedin.com/company/kongsberg" target="_blank" style="border:0; display:block;">
          <img alt="follow us on linkedin" src="http://kongsberg-reports.com/email/lin.gif" /></a></td>
        <tr>
      </table></td>
  </tr>
  <!-- TERMS -->
  <tr>
    <td style="width:100%; text-align:center; padding:20px; font-family:arial; color:#454545; font-size:12px; line-height:24px;"> 
    Copyright &copy; 2015 Kongsberg Gruppen - All rights reserved. 
    </td>
  </tr>
</table>
</body>
</html>
<!-- ----------------------------------------------------------------------------------------------------------------------------------- -->	
';
	
	if($email->Send_mail(dirname(__FILE__), $_SESSION['userid'], "81DGOI21169058PM", $to, $subject, $msgbody, $msgbody)){
		echo "<strong style='color:#009900'>E-mail Send. ( ".$row['EMAIL']." )</strong>";
	}
	else echo "<strong style='color:#900'>E-mail Not Send. ( ".$row['EMAIL']." )</strong>";
		

	echo "<br />";
				
			}
		}
		sqlsrv_free_stmt( $result);
	}
	sqlsrv_close( $conn );
		echo "<input type='button' id='button' value='New Query' onclick='window.location.reload()' />";
	}
	else {
	
		$er = json_decode(file_get_contents($sys_str->language_path("_er\EN_error.php")), true);
		
		$er_code = "KONGER" . $responce['status'];
				
		if (array_key_exists($er_code, $er)){
			
			echo "<strong style='color:#900'>" . $er[$er_code] . "<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		}
		else {
			echo "<strong style='color:#900'>" . $er['KONGER0'] . "<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		}
	}
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "1T3N9AUMZHNPZ8MA")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [NAME]
      ,[DESCRIPTION]
	  ,'<a href=\"edit/'+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit Role'
  	FROM [ROLE]
	  		WHERE 1=1";
	 
	 
	 if ($_GET['role_id'] != "") $sql .= " AND [ID] LIKE '".$_GET['role_id']."'";
	 if ($_GET['role_name'] != "") $sql .= " AND [NAME] LIKE '%".$_GET['role_name']."%'";
	 if ($_GET['role_des'] != "") $sql .= " AND [DESCRIPTION] LIKE '%".$_GET['role_des']."%'";
	
    echo $report->result_table($sql);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "YMIF97L6A1K1HQZQ")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_REPORT_DELETE";
	
	$params = array( 
					 array($_GET["report_id"], SQLSRV_PARAM_IN),					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure($funti, $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){

	
	echo "<strong style='color:#009900'>Successfully Deleted</strong>";
	
	}
	else {
	
		$er = json_decode(file_get_contents($sys_str->language_path("_er\EN_error.php")), true);
		
		$er_code = "KONGER" . $responce['status'];
				
		if (array_key_exists($er_code, $er)){
			
			echo "<strong style='color:#900'>" . $er[$er_code] . "</strong>";
		}
		else {
			echo "<strong style='color:#900'>" . $er['KONGER0'] . "</strong>";
		}
	}
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "4FSQZW41CK8QI9PC")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_ROLE_UPDATE";
	$params = array( 
					 array($_GET["role_id"], SQLSRV_PARAM_IN),
					 array($_GET["role_name"], SQLSRV_PARAM_IN),
					 array($_GET["role_des"], SQLSRV_PARAM_IN),
					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure("4FSQZW41CK8QI9PC", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){
	
	echo "<strong style='color:#009900'>Successfully Upadte</strong><br /><br />
	<input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
	
	}
	else {
	
		$er = json_decode(file_get_contents($sys_str->language_path("_er\EN_error.php")), true);
		
		$er_code = "KONGER" . $responce['status'];
				
		if (array_key_exists($er_code, $er)){
			
			echo "<strong style='color:#900'>" . $er[$er_code] . "<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		}
		else {
			echo "<strong style='color:#900'>" . $er['KONGER0'] . "<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		}
	}
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	
//-------------------------------------------------------------------------------------------------------------------------------------------------	

else {
	echo "<strong style='color:#900'>Your Action Token is Expired Please Try Again</strong><br /><br />";
	echo "<input type='button' id='button' value='Relord' onclick='window.location.reload()' /></strong>";
}