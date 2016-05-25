<?php 
if(!isset($pram['ID'])) die("No User id set");

require_once dirname(__FILE__) .'../../../../class/system_strings.php';
	$sys_st = new system_strings();
		
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if( $conn === false ) {
     	die("Database Connection fail!");
	}
	else{
	  $sql = "SELECT [ID]
	  ,[USERNAME]
      ,[ROLE_ID]
      ,[LANGUAGE_ID]
	  ,[COMPANY]
      ,[FIRST_NAME]
      ,[LAST_NAME]
      ,[DESCRIPTION]
      ,[EMAIL]
      ,[TELEPHONE_LAND]
      ,[TELEPHONE_MOBILE]
      ,[FAX]
      ,[IMAGE]
				FROM [KNG_USERS]
				WHERE [ID] = '" . $pram['ID'] . "'";	  
		
	  $result = sqlsrv_query($conn, $sql);
	 
	

	  if( $result === false ) {
		  die("Database Connection fail!");
	  }
	  
	  	$row = sqlsrv_fetch_array($result);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("user_id").value ="'.$row['ID'].'";';
		echo 'document.getElementById("company").value ="'.$row['COMPANY'].'";';
		echo 'document.getElementById("f_name").value ="'.$row['FIRST_NAME'].'";';
		echo 'document.getElementById("l_name").value ="'.$row['LAST_NAME'].'";';
		
		echo 'document.getElementById("user_des").value ="'.$row['DESCRIPTION'].'";';
		echo 'document.getElementById("user_mail").value ="'.$row['EMAIL'].'";';
		echo 'document.getElementById("tel_land").value ="'.$row['TELEPHONE_LAND'].'";';
		
		echo 'document.getElementById("tel_mob").value ="'.$row['TELEPHONE_MOBILE'].'";';
		echo 'document.getElementById("user_fax").value ="'.$row['FAX'].'";';
		echo 'document.getElementById("u_name").value ="'.$row['USERNAME'].'";';
		
		
		
		echo 'document.getElementById("rl_'.$row['ROLE_ID'].'").selected = "true";';
		echo 'document.getElementById("lan_'.$row['LANGUAGE_ID'].'").selected = "true";';
		
		echo 'document.getElementById("button").disabled = false;';
		echo '}</script>';
	  
		sqlsrv_free_stmt($result);
	  
	}
	
	
	sqlsrv_close($conn);
?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Edit User </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> User ID </strong></td>
      <td colspan="1"><input type="text" name="user_id" id="user_id" readonly="readonly"/></td>
    </tr>
   <tr>
      <td><strong> User Name </strong></td>
      <td colspan="1"><input type="text" name="u_name" id="u_name" readonly="readonly" /></td>
    </tr>
     <tr>
      <td><strong> Role </strong></td>
      <td colspan="">
        <select name="role" id="role" disabled="disabled">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once dirname(__file__).'/../../../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [ROLE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "rl_");
			?>
        </select>
        </td>
    </tr>
    <tr>
      <td><strong> Language </strong></td>
      <td colspan="">
        <select name="language" id="language">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once dirname(__file__).'/../../../class/DB.php';
			
			$sql = "SELECT [ID] as VALUE ,[NAME] as OPTIO FROM [LANGUAGE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "lan_");
			?>
        </select>
        </td>
    </tr>
    <tr>
      <td><strong> Company </strong></td>
      <td colspan="1"><input type="text" name="company" id="company"/></td>
    </tr>
    <tr>
      <td><strong> First Name </strong></td>
      <td colspan="1"><input type="text" name="f_name" id="f_name"/></td>
    </tr>
    <tr>
      <td><strong> Last Name </strong></td>
      <td colspan="1"><input type="text" name="l_name" id="l_name" /></td>
    </tr>
    <tr>
      <td><strong> Discription </strong></td>
      <td><textarea cols="45" rows="3" name="user_des" id="user_des"></textarea></td>
    </tr>
    <tr>
      <td><strong> E-mail </strong></td>
      <td><textarea cols="45" rows="1" name="user_mail" id="user_mail"></textarea>
      </td>
    </tr>
    <tr>
      <td><strong> Telephone (Land Line) </strong></td>
      <td colspan="1"><input type="text" name="tel_land" id="tel_land" /></td>
    </tr>
    <tr>
      <td><strong> Telephone (Mobile) </strong></td>
      <td colspan="1"><input type="text" name="tel_mob" id="tel_mob" /></td>
    </tr>
    <tr>
      <td><strong> Fax </strong></td>
      <td colspan="1"><input type="text" name="user_fax" id="user_fax" /></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" disabled="true"/>
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="9P061H216C1XMFOG" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
    <input type="hidden" name="u_pass" id="u_pass"/>
  </table>
</div>