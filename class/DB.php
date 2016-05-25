<?php

class database_retrive {


    public function select_dropdown($sql, $id=""){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
		
		$return_val = "";
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL;
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		while($row = sqlsrv_fetch_array($result))
  		{
  			$return_val .= "<option id='".$id.$row['VALUE']."' value='".$row['VALUE']."'>".$row['OPTIO']."</option>";
  		}
			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
    }
	
	public function set_value($sql){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL;
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		$row = sqlsrv_fetch_array($result);
  		
		
  		$return_val = $row['VALUE'];
  		
			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
    }
	public function select_count_dropdown($sql, $id=""){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
		
		$return_val = "";
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL;
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		$row = sqlsrv_fetch_array($result);
		for($i=1;$i<=($row['COUNT']+1);$i++)
  		{
  			$return_val .= "<option id='".$id.$i."' value='".$i."'>".$i."</option>";
  		}
			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
    }
	
	public function user_id($uname){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL; 
		
		$sql = "SELECT [ID] FROM [SYSTEMUSER] WHERE USERNAME = '" . $uname . "'";
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		$row = sqlsrv_fetch_array($result);
  		
		
  		$return_val = $row['ID'];
  		
			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
    }
	public function pole_id($user_id){

	require_once 'system_strings.php';
	$sys_st = new system_strings();
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL; 
		
		$sql = "SELECT [ROLE_ID] FROM [SYSTEMUSER] WHERE ID = '" . $user_id . "'";
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		$row = sqlsrv_fetch_array($result);
  		
		
  		$return_val = $row['ROLE_ID'];
  		
			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
    }

}
?>
