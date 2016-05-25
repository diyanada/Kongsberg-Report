<?php 
if(!isset($pram['ID'])) die("No Language id set");

require_once dirname(__FILE__) .'../../../../class/system_strings.php';
	$sys_st = new system_strings();
		
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	die("Database Connection fail!");
	}
	else{
	  $sql = "SELECT [ID]
				  ,[NAME]
				  ,[DESCRIPTION]
				FROM [ROLE]
				WHERE [ID] = '" . $pram['ID'] . "'";	  
		
	  $result = sqlsrv_query($conn, $sql);
	 
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("role_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("role_name").value ="'.$row['NAME'].'";';
		echo 'document.getElementById("role_des").value ="'.$row['DESCRIPTION'].'";';
		
		echo 'document.getElementById("button").disabled = false;';
		echo '}</script>';
	  
		sqlsrv_free_stmt($result);
	  
	}
	
	
	sqlsrv_close($conn);
?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Edit Role </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> Role ID </strong></td>
      <td colspan="1"><input type="text" name="role_id" id="role_id" readonly="readonly"/></td>
    </tr>
    <tr>
      <td><strong> Role Name </strong></td>
      <td colspan="1"><input type="text" name="role_name" id="role_name" /></td>
    </tr>
    <tr>
      <td><strong> Discription </strong></td>
      <td><textarea cols="45" rows="3" name="role_des" id="role_des"></textarea></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" disabled="true"/>
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="4FSQZW41CK8QI9PC" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>