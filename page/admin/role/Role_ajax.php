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


if($funti == "5MES4D0HV7RH9Z8H")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_ROLE_CREATE";
	
	$params = array( 
					 array($_GET["role_name"], SQLSRV_PARAM_IN),
					 array($_GET["role_des"], SQLSRV_PARAM_IN),
					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure("5MES4D0HV7RH9Z8H", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){

	
	echo "<strong style='color:#009900'>Successfully Added</strong><br /><br />
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