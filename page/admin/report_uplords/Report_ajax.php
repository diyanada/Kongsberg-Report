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

 if($funti == "1T3N9AUMZHNPZ8MA")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [FILE]
      ,[TITLE]
  	FROM [REPORT_FILE]
	  		WHERE 1=1";
	 
	 
	 if ($_GET['file_tit'] != "") $sql .= " AND [TITLE] LIKE '%".$_GET['file_tit']."%'";
	
    echo $report->result_table($sql);
}
else  if($funti == "1T3N9AUMZHNPZ8AA")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/report.php';
	$report = new reprt_view();
	
	$sql = "SELECT [FILE]
      ,[TITLE]
	  ,'<input type=\"button\" onclick=\"edits_reps('+CONVERT(varchar(10), [ID])+')\" value=\"Add\" />' as 'Link'
  	FROM [REPORT_FILE]
	  		WHERE 1=1";
	 
	 
	 if ($_GET['file_tit'] != "") $sql .= " AND [TITLE] LIKE '%".$_GET['file_tit']."%'";
	
    echo $report->result_table($sql);
}


//-------------------------------------------------------------------------------------------------------------------------------------------------	



//-------------------------------------------------------------------------------------------------------------------------------------------------	
//-------------------------------------------------------------------------------------------------------------------------------------------------	

else {
	echo "<strong style='color:#900'>Your Action Token is Expired Please Try Again</strong><br /><br />";
	echo "<input type='button' id='button' value='Relord' onclick='window.location.reload()' /></strong>";
}