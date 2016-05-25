
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Thoughts Search </th>
    </tr>
    <tr>
      <td><strong> Language </strong></td>
      <td colspan="">
        <select name="language" id="language">
          <option value=""> -- Select a Value -- </option>
          <?php
		  	require_once dirname(__file__).'/../../../class/DB.php';
			
			$sql = "SELECT [CODE] as VALUE ,[NAME] as OPTIO FROM [LANGUAGE]";
			
			$db=new database_retrive();
			echo $db->select_dropdown($sql, "lan_");
			?>
        </select>
        </td>
    </tr>
    
      <td colspan="2"><div align="center">
          <input type='button' id='button' value="List Quary" onclick="search_querey()"  />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="2WCNMJ2408HRXTJG" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  	<tr>
        <td colspan="2"><div id="spriner" align="center">
        	<br /><br />
           <div class="throbber-loader"></div>
          </div></td>
      </tr>
  </table>
  <div align="center" id="resoult"></div>
</div>