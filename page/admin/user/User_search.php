
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> User Search </th>
    </tr>
     <tr>
      <td><strong> User ID </strong></td>
      <td colspan="1"><input type="text" name="user_id" id="user_id"/></td>
    </tr>
    <tr>
      <td><strong> Username </strong></td>
      <td colspan="1"><input type="text" name="u_name" id="u_name" /></td>
    </tr>
     <tr>
      <td><strong> Role </strong></td>
      <td colspan="">
        <select name="role" id="role">
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
    
      <td colspan="2"><div align="center">
          <input type='button' id='button' value="Search Quary" onclick="search_querey()"  />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="UMWNXOTXIHFEI1FB" />
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