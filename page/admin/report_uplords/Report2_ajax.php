<?php




if($_GET['log'] == "JCQIJP1VBWASZWNV")
{
	require_once("../../../session_admin.php");
	require_once '../../../class/system_strings.php';
	$sys_str = new system_strings();
	
	$conn = sqlsrv_connect( $sys_str->severnam(), $sys_str->connectionInfo());
		if ($conn === false) return NULL;
		  
		$sql = "SELECT [FILE] ,[TITLE] FROM [REPORT_FILE] WHERE ID = " . $_GET['ids'];
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		$row = sqlsrv_fetch_array($result);
		
		$img = "https://kongsberg-reports.com/img/image.php?img=" . $row['FILE'] . "&type=REPORT_DATA";
		
		echo "<a id='KNGDOWNLOADS' href='" . $img . "' title='" . $row['TITLE'] . "'>" . $row['TITLE'] . "</a>";

}

