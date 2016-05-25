<?php if(!isset($pram['ID'])) die("No Project ID set"); ?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Add New Report </th>
    </tr>
    <tr>
      <td><strong> Project ID </strong></td>
      <td colspan="1"><input type="text" name="pro_id" id="pro_id" readonly="readonly" value="<?php echo $pram['ID']; ?>"/></td>
    </tr>
    <tr>
      <td><strong> User </strong></td>
      <td colspan="">
        <select name="user" id="user">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once dirname(__file__).'/../../../class/DB.php';
			
			$sql = "SELECT SYSTEMUSER.ID AS VALUE, FIRST_NAME + ' ' + LAST_NAME + ' (' + [USERNAME] + ')' as OPTIO
					FROM PROJECT_MAPPING INNER JOIN SYSTEMUSER ON PROJECT_MAPPING.USER_ID = SYSTEMUSER.ID 
					INNER JOIN SYSTEMUSER_DETAILS ON SYSTEMUSER.ID = SYSTEMUSER_DETAILS.ID
					WHERE PROJECT_MAPPING.[ROLE_ID] = 2
					AND PROJECT_ID = ". $pram['ID'];		
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "ur_");
			?>
        </select>
        </td>
    </tr>
    <tr>
      <td><strong> Tab Type </strong></td>
      <td colspan="">
        <select name="rep_type" id="rep_type">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once dirname(__file__).'/../../../class/DB.php';
			
			$sql = "SELECT [ID] AS VALUE, [NAME] as OPTIO FROM [REPORT_TYPE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "rty_");
			?>
        </select>
        </td>
    </tr>
    
    <tr>
      <td><strong> Report Content </strong></td>
      <td><textarea cols="45" rows="3" name="report" id="report"></textarea></td>
    </tr>
    
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="81DGOI21169058PM" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>