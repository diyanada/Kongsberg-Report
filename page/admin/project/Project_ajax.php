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


if($funti == "4Z46LLG0758F0I2N")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_PROJECT_CREATE";
	
	$params = array( 
					 array($_GET["pro_name"], SQLSRV_PARAM_IN),
					 array($_GET["pro_des"], SQLSRV_PARAM_IN),
					 array($_GET["s_date"], SQLSRV_PARAM_IN),
					 array($_GET["e_date"], SQLSRV_PARAM_IN),
					 
												 
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


else if($funti == "M582S3B05GZO747H")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [NAME]
      ,[DESCRIPTION]
      ,CONVERT(varchar(10), [START_DATE]) AS [START_DATE]
      ,CONVERT(varchar(10), [END_DATE]) AS [END_DATE]
	  ,'<a href=\"edit/'+CONVERT(varchar(10), [ID])+'\">Edit</a>' as 'Edit Project'
	  ,'<a href=\"pic/'+CONVERT(varchar(10), [ID])+'\">Upload Image</a>' as 'Banner'
	  ,'<a href=\"vid/'+CONVERT(varchar(10), [ID])+'\">Upload Video</a>' as 'Banner'
	  ,'<a href=\"mapping/'+CONVERT(varchar(10), [ID])+'\">User Mapping</a>' as 'Configure'
	  ,'<a href=\"../report/add/'+CONVERT(varchar(10), [ID])+'\">Add Reports</a>' as 'Reports'
	  ,'<a href=\"../report/view/'+CONVERT(varchar(10), [ID])+'\">View Reports</a>' as 'Reports'
	  ,'<a href=\"../report/order/'+CONVERT(varchar(10), [ID])+'\">Re-order</a>' as 'Reports'
  	FROM [PROJECT]
	  		WHERE 1=1";
	 
	 
	 if ($_GET['pro_id'] != "") $sql .= " AND [ID] LIKE '".$_GET['pro_id']."'";
	 if ($_GET['pro_name'] != "") $sql .= " AND [NAME] LIKE '%".$_GET['pro_name']."%'";
	 if ($_GET['pro_des'] != "") $sql .= " AND [DESCRIPTION] LIKE '%".$_GET['pro_des']."%'";
	 if ($_GET['o_date'] != "") $sql .= " AND [START_DATE] <= '".$_GET['o_date']."' and [END_DATE] >= '".$_GET['o_date']."'";
	
    echo $report->result_table($sql);
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	



//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "5KU64IP1N069K94W")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_PROJECT_UPDATE";
	$params = array( 
					 array($_GET["pro_id"], SQLSRV_PARAM_IN),
					
					 array($_GET["pro_name"], SQLSRV_PARAM_IN),
					 array($_GET["pro_des"], SQLSRV_PARAM_IN),
					 array($_GET["s_date"], SQLSRV_PARAM_IN),
					 array($_GET["e_date"], SQLSRV_PARAM_IN),
					 
												 
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


else if($funti == "DTYGE3YKYAIYYLHE")
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
	  ,[ROLE_ID]
	  ,'<input type=\"button\" onclick=\"add_mapping(" .$_GET['projet_id']. ", '+CONVERT(varchar(10), [ID])+', '+CONVERT(varchar(10), [ROLE_ID])+')\" value=\"Add\" />' as 'Add Mapping'
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


else if($funti == "HMG885PEHM61F95A")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_PROJECT_MAPPING_CREATE";
	
	$params = array( 
					 array($_GET["user_id"], SQLSRV_PARAM_IN),
					 array($_GET["pro_id"], SQLSRV_PARAM_IN),
					 array($_GET["role_id"], SQLSRV_PARAM_IN),					 
												 
					 array($_SESSION['userid'], SQLSRV_PARAM_IN)

				   );
	
	$responce = $DB->DB_StoredProcedure($funti, $_SESSION['userid'], $sql, $params, dirname(__FILE__));
	
	
	if ( $responce['status'] == 100 ){

	
	echo "<strong style='color:#009900'>Successfully Added</strong>";
	
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


else if($funti == "YMIF97L6A1K1HQZQ")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/DB_connection.php';
	$DB = new DB_connection();
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$sql = "KNG_PROJECT_MAPPING_DELETE";
	
	$params = array( 
					 array($_GET["map_id"], SQLSRV_PARAM_IN),					 
												 
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
//-------------------------------------------------------------------------------------------------------------------------------------------------	

else {
	echo "<strong style='color:#900'>Your Action Token is Expired Please Try Again</strong><br /><br />";
	echo "<input type='button' id='button' value='Relord' onclick='window.location.reload()' /></strong>";
}