<?php

if($_GET['log'] == "CRXNIGVKHVOABSI")
{

	require_once '../class/system_strings.php';
	$sys_st = new system_strings();
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) die ("zzzz");
		
		$sql = "SELECT [BODY] FROM [REPORT] WHERE [ID] ='" . $_GET['reportID'] . "'";
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) die ("zzzz");
		
		$row = sqlsrv_fetch_array($result);
		
		echo $row['BODY'];
		
		
}