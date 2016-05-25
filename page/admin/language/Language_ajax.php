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


if($funti == "134593HU2I03SNBM")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	
	$sql = "KNG_LANGUAGE_CREATE";
	
	$params = array( 
					 array($_GET["lang_name"], SQLSRV_PARAM_IN),
					 array(strtoupper($_GET["lang_code"]), SQLSRV_PARAM_IN),
					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure("134593HU2I03SNBM", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){
	

	$language = array ("UN" => array("thought" => "Unknown", "description" => "Unknown Thought"));
	
	include('../../../owsh_secret.php');
	
	$file_path = $lang_path . "/" .strtoupper($_GET["lang_code"]).".php";
	
	if (!file_exists($file_path)) {
  
		$file = fopen($file_path, "w") ;
		fclose($file);
		}
	
	
	file_put_contents($file_path, json_encode($language , JSON_PRETTY_PRINT));
	
	echo "<strong style='color:#009900'>Successfully Added</strong><br /><br />
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


else if($funti == "U7I4OBFDLQEUVWAU")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [NAME]
      ,[CODE]
	  ,'<a href=\"edit/'+CONVERT(varchar(10), [CODE])+'\">Edit</a>' as 'Edit Language'
  	FROM [LANGUAGE]
	  		WHERE 1=1";
	 
	 
	 if ($_GET['lang_id'] != "") $sql .= " AND [ID] = '".$_GET['lang_id']."'";
	 if ($_GET['lang_name'] != "") $sql .= " AND [NAME] LIKE '%".$_GET['lang_name']."%'";
	 if ($_GET['lang_code'] != "") $sql .= " AND [CODE] LIKE '%".$_GET['lang_code']."%'";
	
    echo $report->result_table($sql);
}


//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "LMTVRNE52GEWMZ1A")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	
	$sql = "KNG_LANGUAGE_UPDATE";
	$params = array( 
					 array($_GET["lang_id"], SQLSRV_PARAM_IN),
					 array($_GET["lang_name"], SQLSRV_PARAM_IN),
					 array(strtoupper($_GET["lang_code"]), SQLSRV_PARAM_IN),
					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure("LMTVRNE52GEWMZ1A", $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
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