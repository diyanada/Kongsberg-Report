
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Role Search </th>
    </tr>
     <tr>
      <td><strong> Role ID </strong></td>
      <td colspan="1"><input type="text" name="role_id" id="role_id"/></td>
    </tr>
    <tr>
      <td><strong> Role Name </strong></td>
      <td colspan="1"><input type="text" name="role_name" id="role_name" /></td>
    </tr>
    <tr>
      <td><strong> Discription </strong></td>
      <td><textarea cols="45" rows="3" name="role_des" id="role_des"></textarea></td>
    </tr>
    
      <td colspan="2"><div align="center">
          <input type='button' id='button' value="Search Quary" onclick="search_querey()"  />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="1T3N9AUMZHNPZ8MA" />
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