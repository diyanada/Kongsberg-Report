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


if($funti == "WHMYV7PEZLYGCVXO")
{
	require_once("../../../session_admin.php");
	include('../../../owsh_secret.php');

	
		$sql_quary = "SELECT [CODE] FROM [LANGUAGE]";
	
		require_once '../../../class/DB_connection.php';
		$DB = new DB_connection();
		
		require_once ('../../../class/Log_Works.php');
		$log = new Log_Works();
		
		$conn = sqlsrv_connect($DB->Connection_DBname(), $DB->Connection_String());
		
		if ($conn === false) {
			$er_msg = array();
			
			if (($errors = sqlsrv_errors()) != null) {
				foreach ($errors as $error) {
					$er_msg['code'] = $error['code'];
					$er_msg['message'] = $error['message'];
					
				}
			}
   			 	$log->To_log($error['code'], $error['message'], dirname(__FILE__), $_SESSION['userid'], "WHMYV7PEZLYGCVXO");
    			$er = json_decode(file_get_contents($lang_path . "_er/EN_error.php"), true);
		
				$er_code = "KONGER1";
				
					if (array_key_exists($er_code, $er)){
						
						echo "<strong style='color:#900'>" . $er[$er_code] . "<br /><br />
						<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
					}
					else {
						echo "<strong style='color:#900'>" . $er['KONGER0'] . "<br /><br />
						<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
					}
		}
		
		
		$stmt = sqlsrv_query($conn, $sql_quary);
		if ($stmt === false) {
			$er_msg = array();
			
			if (($errors = sqlsrv_errors()) != null) {
				foreach ($errors as $error) {
					$er_msg['code'] = $error['code'];
					$er_msg['message'] = $error['message'];
					
				}
			}
   			 	$log->To_log($error['code'], $error['message'], dirname(__FILE__), $_SESSION['userid'], "WHMYV7PEZLYGCVXO");
    			
				$er = json_decode(file_get_contents($lang_path . "_er/EN_error.php"), true);
		
				$er_code = "KONGER2";
				
					if (array_key_exists($er_code, $er)){
						
						echo "<strong style='color:#900'>" . $er[$er_code] . "<br /><br />
						<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
					}
					else {
						echo "<strong style='color:#900'>" . $er['KONGER0'] . "<br /><br />
						<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
					}
		}
		 else{
		 
		 $file_path = $lang_path . "/en.php";
		
		$thought = json_decode(file_get_contents($file_path), true);
					
		$code = "KONGER" . count($thought);
		 
		 	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      				
					
					
					
					$file_path = $lang_path . "/".$row['CODE'].".php";
		
					$thought = json_decode(file_get_contents($file_path), true);
					
					
					
					$array = array( $code => array(	"thought" => $_GET['thought'], 
													"description" => $_GET['thought_des'])
													 );
					
					$result = array_merge($thought, $array);
							
					file_put_contents($file_path, json_encode($result , JSON_PRETTY_PRINT));
			}	
		 	echo "<strong style='color:#009900'>Successfully Added</strong><br /><br />
					<input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
		 }

}

//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "2WCNMJ2408HRXTJG")
{
	require_once("../../../session_admin.php");
	include('../../../owsh_secret.php');
	
	
	$file_path = $lang_path . "/".$_GET['language'].".php";
		
	$thought = json_decode(file_get_contents($file_path), true);
	
	
	$return_val = "<table id='report_table'><tr>";
		
	$return_val .= "<th>ID</th>";
	$return_val .= "<th>Thought</th>";
	$return_val .= "<th>Description</th>";
	$return_val .= "<th>Edit</th>";
	
	$return_val .= "</tr>";
	
	foreach ($thought as $ID => $arr) {
    $return_val .= "<tr><td>" . $ID . "</td>";
	
	$thought = "";
	$des = "";
	
		foreach ($arr as $code => $thots) {
			if ($code == "description") $des = $thots;
			else $thought = $thots;
		}
	
	$return_val .= "<td>" . $thought . "</td><td>" . $des . "</td><td><a href='edit/".$_GET['language']."/".$ID."'>Edit</a></td></tr>";
	}
	
	$return_val .= "</table>";
	
	echo $return_val;
}


//-------------------------------------------------------------------------------------------------------------------------------------------------	


else if($funti == "G6DD40AW130R8X4H")
{
	require_once("../../../session_admin.php");
	include('../../../owsh_secret.php');
	
	
					$file_path = $lang_path . "/".$_GET['thought_lang'].".php";
		
					$thought = json_decode(file_get_contents($file_path), true);
					
					$thought[$_GET['thought_id']]['thought'] = $_GET['thought'];
					$thought[$_GET['thought_id']]['description'] = $_GET['thought_des'];
							
					file_put_contents($file_path, json_encode($thought , JSON_PRETTY_PRINT));
				
		 	echo "<strong style='color:#009900'>Successfully Added</strong><br /><br />
					<input type='button' id='button' value='New Query' onclick='window.location.reload()' /></strong>";
}

//-------------------------------------------------------------------------------------------------------------------------------------------------	
//-------------------------------------------------------------------------------------------------------------------------------------------------	

else {
	echo "<strong style='color:#900'>Your Action Token is Expired Please Try Again</strong><br /><br />";
	echo "<input type='button' id='button' value='Relord' onclick='window.location.reload()' /></strong>";
}