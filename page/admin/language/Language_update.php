<?php 
if(!isset($pram['ID'])) die("No Language id set");

require_once dirname(__FILE__) .'../../../../class/system_strings.php';
	$sys_st = new system_strings();
		
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	die("Database Connection fail!");
	}
	else{
	  $sql = "SELECT 	
	  			[ID]
				,[NAME]
				,[CODE]
				FROM [LANGUAGE]
				WHERE [CODE] = '" . $pram['ID'] . "'";	  
		
	  $result = sqlsrv_query($conn, $sql);
	 
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("lang_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("lang_name").value ="'.$row['NAME'].'";';
		echo 'document.getElementById("lang_code").value ="'.$row['CODE'].'";';
		
		echo 'document.getElementById("button").disabled = false;';
		echo '}</script>';
	  
		sqlsrv_free_stmt($result);
	  
	}
	
	
	sqlsrv_close($conn);
?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Edit Language </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> Type ID </strong></td>
      <td colspan="1"><input type="text" name="lang_id" id="lang_id" readonly="readonly"/></td>
    </tr>
    <tr>
      <td><strong> Language Name </strong></td>
      <td colspan="1"><input type="text" name="lang_name" id="lang_name" /></td>
    </tr>
    <tr>
      <td><strong> Language Code </strong></td>
      <td colspan="1"><input type="text" name="lang_code" id="lang_code" maxlength="2" style="text-transform:uppercase" readonly="readonly"/></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" disabled="true"/>
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="LMTVRNE52GEWMZ1A" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>