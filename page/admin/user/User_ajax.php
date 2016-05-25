<?php
function generate_password($length = 30, $complex=3) {
		$min = "abcdefghijklmnopqrstuvwxyz";
		$num = "0123456789";
		$maj = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$symb = "!@#$%^&*()_-=+;:,.?";
		$chars = $maj;
		$chars .= $num; 
		$password = substr( str_shuffle( $chars ), 0, $length );
	return $password;
} 
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


if($funti == "WQEDDRFU9NWGCF1X")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/interface_magic.php';
	$inter = new interface_magic();
	require_once '../../../class/email.php';
	$email = new email();
	
	$sql = "KNG_USER_CREATE";
	
	$cookie = generate_password();
	
	$params = array( 
					 array($_GET["u_name"], SQLSRV_PARAM_IN),
					 array(md5($_GET["u_pass"]), SQLSRV_PARAM_IN),
					 array($_GET["role"], SQLSRV_PARAM_IN),
					 array($_GET["language"], SQLSRV_PARAM_IN),
					 
					 array($_GET["company"], SQLSRV_PARAM_IN),
					 
					 array($_GET["f_name"], SQLSRV_PARAM_IN),
					 array($_GET["l_name"], SQLSRV_PARAM_IN),
					 array($_GET["user_des"], SQLSRV_PARAM_IN),		 
					 array($_GET["user_mail"], SQLSRV_PARAM_IN),
					 
					 array($_GET["tel_land"], SQLSRV_PARAM_IN),
					 array($_GET["tel_mob"], SQLSRV_PARAM_IN),
					 array($_GET["user_fax"], SQLSRV_PARAM_IN),
					 
					 array(md5($cookie), SQLSRV_PARAM_IN),
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure($funti, $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){
	
	$link = $inter->external_source("register/" . $responce['identity'] . "/" . $_GET['language'] . "/" . $cookie, "");

	$to = $_GET["user_mail"];
	
	$subject = $inter->owsh_echo("KONGER3", $_GET['language']);
	
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
    <span style="font-size:28px; font-weight:bold;">' . $_GET["f_name"] . ', your latest report is ready!</span><br />
      <br />
      Please click the link below and enter the following login details:<br />
      <br />
      <span style="font-weight:bold; font-size:18px; font-style:italic;">
	  Username: '.$_GET["u_name"].'<br />
      Password: '.$_GET["u_pass"].'</span> </td>
  </tr>
  <!-- LINK BUTTON -->
  <tr>
    <td style="width:100%; background:#f9b516; text-align:center; font-family:arial; color:#FFF; font-size:16px; padding:60px 0 50px 0;">
    <a href="' . $link . '" 
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
	
	if($email->Send_mail(dirname(__FILE__), $_SESSION['userid'], "WQEDDRFU9NWGCF1X", $to, $subject, $msgbody, $msgbody)){
		echo "<strong style='color:#009900'>Successfully Added</strong><br /><br />
		<input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
	}
	else $DB->error_report(8);
		
	}
	else $DB->error_report($responce['status']);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "UMWNXOTXIHFEI1FB")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [ID]
      ,[USERNAME]
      ,[COUNTER]
      ,CONVERT(varchar(10), [LAST_LOGING]) AS [LAST_LOGING]
      ,[FIRST_NAME]
      ,[LAST_NAME]
      ,[DESCRIPTION]
      ,[EMAIL]
      ,[TELEPHONE_LAND]
      ,[TELEPHONE_MOBILE]
      ,[FAX]
	  ,'<a href=\"edit/'+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit User'
	  ,'<a href=\"pic/'+CONVERT(varchar(10), [ID])+'\">Uplord</a>' as 'Profile Picture'
  FROM [KNG_USERS]
	WHERE 1=1";
	
	if ($_GET['role'] != "") $sql .= " AND [ROLE_ID] = '".$_GET['role']."'";
	if ($_GET['language'] != "") $sql .= " AND [LANGUAGE_ID] = '".$_GET['language']."'";
	 
	 
	 if ($_GET['user_id'] != "") $sql .= " AND [ID] LIKE '".$_GET['user_id']."'";
	 if ($_GET['u_name'] != "") $sql .= " AND [USERNAME] LIKE '%".$_GET['u_name']."%'";
	 if ($_GET['f_name'] != "") $sql .= " AND [FIRST_NAME] LIKE '%".$_GET['f_name']."%'";
	 
	 if ($_GET['l_name'] != "") $sql .= " AND [LAST_NAME] LIKE '%".$_GET['l_name']."%'";
	 if ($_GET['user_des'] != "") $sql .= " AND [DESCRIPTION] LIKE '%".$_GET['user_des']."%'";
	 if ($_GET['user_mail'] != "") $sql .= " AND [EMAIL] LIKE '%".$_GET['user_mail']."%'";
	 
	 if ($_GET['tel_land'] != "") $sql .= " AND [TELEPHONE_LAND] LIKE '%".$_GET['tel_land']."%'";
	 if ($_GET['tel_mob'] != "") $sql .= " AND [TELEPHONE_MOBILE] LIKE '%".$_GET['tel_mob']."%'";
	 if ($_GET['user_fax'] != "") $sql .= " AND [FAX] LIKE '%".$_GET['user_fax']."%'";
	
    echo $report->result_table($sql);
}


//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "9P061H216C1XMFOG")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	
	$sql = "KNG_USER_UPDATE";
	$params = array( 
					 array($_GET["user_id"], SQLSRV_PARAM_IN),
					 array($_GET["role"], SQLSRV_PARAM_IN),
					 array($_GET["language"], SQLSRV_PARAM_IN),
					 
					 array($_GET["company"], SQLSRV_PARAM_IN),
					 
					 array($_GET["f_name"], SQLSRV_PARAM_IN),
					 array($_GET["l_name"], SQLSRV_PARAM_IN),
					 array($_GET["user_des"], SQLSRV_PARAM_IN),		 
					 array($_GET["user_mail"], SQLSRV_PARAM_IN),
					 
					 array($_GET["tel_land"], SQLSRV_PARAM_IN),
					 array($_GET["tel_mob"], SQLSRV_PARAM_IN),
					 array($_GET["user_fax"], SQLSRV_PARAM_IN),
					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure($funti, $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){
	
	echo "<strong style='color:#009900'>Successfully Upadte</strong><br /><br />
	<input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
	
	}
	else {
	
		$er = json_decode(file_get_contents($lang_path . "_er/EN_error.php"), true);
		
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