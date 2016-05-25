<?php 
class DB_connection{
	
	public function Connection_DBname(){
		include (dirname(__FILE__) . '/../owsh_secret.php');
		
		
		return $server_name;	
	}
	
	public function Connection_String(){
		include (dirname(__FILE__) . '/../owsh_secret.php');
		
		return array(
			"Database" => $database,
			"UID" => $db_username,
			"PWD" => $db_password,
			"CharacterSet" => "UTF-8"
		);
	}
	public function error_report($responce){
	
		require_once dirname(__FILE__) . '/../class/system_strings.php';
		$sys_str = new system_strings();
		
		$er = json_decode(file_get_contents($sys_str->language_path("_er\EN_error.php")), true);
		
		$er_code = "KONGER" . $responce;
				
		if (array_key_exists($er_code, $er)){
			
			echo "<strong style='color:#900'>" . $er[$er_code] . "<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		}
		else {
			echo "<strong style='color:#900'>" . $er['KONGER0'] . "<br /><br />
			<input type='button' id='button' value='Update Query' onclick='run_querey()' /></strong>";
		}
	}
	
	public function DB_StoredProcedure($actionID, $userID, $sql, $params = array(), $er_file){
		
		
		
		require_once ('Log_Works.php');
		$log = new Log_Works();
		
		$conn = sqlsrv_connect($this->Connection_DBname(), $this->Connection_String());
		
		if ($conn === false) {
			$er_msg = array();
			
			if (($errors = sqlsrv_errors()) != null) {
				foreach ($errors as $error) {
					$er_msg['code'] = $error['code'];
					$er_msg['message'] = $error['message'];
					
				}
			}
   			 	$log->To_log($error['code'], $error['message'], $er_file, $userID, $actionID);
    			return array('status' => 1, 'identity' => NULL );
		}
		
		
		$status = 0;
	  	$identity = 0;
		
		array_push($params,
						array($status, SQLSRV_PARAM_INOUT),
						array($identity, SQLSRV_PARAM_INOUT)
						);
		
		$sql_quary = "{CALL " . $sql ."(";
			
			for ($i = 0 ; $i < count($params) ; $i++){
				if ($i != 0) $sql_quary .= ",?";
				if ($i == 0) $sql_quary .= "?";
			}
		
		$sql_quary .= " )}";
		
		//echo $sql_quary;
		
		$stmt = sqlsrv_query($conn, $sql_quary, $params);
		if ($stmt === false) {
			$er_msg = array();
			
			if (($errors = sqlsrv_errors()) != null) {
				foreach ($errors as $error) {
					$er_msg['code'] = $error['code'];
					$er_msg['message'] = $error['message'];
					
				}
			}
   			 	$log->To_log($error['code'], $error['message'], $er_file, $userID, $actionID);
    			return array('status' => 2, 'identity' => NULL );
		}
		 else{
		 
		   
			  sqlsrv_next_result($stmt);
			  sqlsrv_next_result($stmt);
			  sqlsrv_next_result($stmt);
			  sqlsrv_next_result($stmt);
			  sqlsrv_next_result($stmt);
		  
			 
				return array('status' => $status, 'identity' => $identity );
			  
		}
		sqlsrv_free_stmt( $stmt);
		sqlsrv_close($conn);
	  }
		
		
		
	
	
}

?>