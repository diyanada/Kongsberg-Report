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
				  ,CONVERT(varchar(10), [START_DATE], 21) AS [START_DATE]
      			  ,CONVERT(varchar(10), [END_DATE], 21) AS [END_DATE]
				FROM [PROJECT]
				WHERE [ID] = '" . $pram['ID'] . "'";	  
		
	  $result = sqlsrv_query($conn, $sql);
	 
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("pro_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("pro_name").value ="'.$row['NAME'].'";';
		echo 'document.getElementById("pro_des").value ="'.$row['DESCRIPTION'].'";';
		
		echo 'document.getElementById("s_date").value ="'.$row['START_DATE'].'";';
		echo 'document.getElementById("e_date").value ="'.$row['END_DATE'].'";';
		
		echo 'document.getElementById("button").disabled = false;';
		echo '}</script>';
	  
		sqlsrv_free_stmt($result);
	  
	}
	
	
	sqlsrv_close($conn);
?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Edit Project </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> Project ID </strong></td>
      <td colspan="1"><input type="text" name="pro_id" id="pro_id" readonly="readonly"/></td>
    </tr>
    <tr>
      <td><strong> Project Name </strong></td>
      <td colspan="1"><input type="text" name="pro_name" id="pro_name" /></td>
    </tr>
    <tr>
      <td><strong> Discription </strong></td>
      <td><textarea cols="45" rows="3" name="pro_des" id="pro_des"></textarea></td>
    </tr>
    <tr>
      <td><strong> Start Date </strong></td>
      <td><input type="date" name="s_date" id="s_date" placeholder="YYYY-MM-DD"></td>
    </tr>
    <tr>
      <td><strong> End Date </strong></td>
      <td><input type="date" name="e_date" id="e_date" placeholder="YYYY-MM-DD"></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" disabled="true"/>
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="5KU64IP1N069K94W" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>