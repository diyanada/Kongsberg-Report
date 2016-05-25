<?php 
class reprt_view{

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
	
	public function result_table($sql){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	
	
		$conn = sqlsrv_connect($this->Connection_DBname(), $this->Connection_String());
		if( $conn === false ) {
     	die("Database Connection fail!");
	}
		$result = sqlsrv_prepare( $conn, $sql );
		if( $result === false ) {
		  die("Database Connection fail!");
	  }
		$i=0;
		$return_val = "<table id='report_table' align='center'><tr>";
		foreach( sqlsrv_field_metadata( $result ) as $field ) 
		{
		$return_val .= "<th>".$this->field_nam($field['Name'])."</th>";
		$i += 1;
		}
		$return_val .= "</tr>";
		
		$result = sqlsrv_query($conn, $sql, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
		
		while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
		{
		$return_val .= "<tr>";
		for ($x = 0; $x < $i; $x++) {
		$return_val .= "<td>".$row[$x]."</td>";
		}
		$return_val .= "</tr>";
		}
		
		$return_val .= "</table>";
		$return_val = "<p>Quary returned rows : ". sqlsrv_num_rows( $result ) .".</p>".$return_val;
		return $return_val;
		
	
		
return $return_val;
	
	}
	
	public function field_nam($name){
		$return_val = str_replace("_"," ",$name);
		$return_val = strtolower($return_val);
		$return_val = ucwords($return_val);
		
		return $return_val;
	}
	
	
}
?>