
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Add New Role </th>
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
          <input type='button' id='button' value="Update Query" onclick="run_querey()" />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="5MES4D0HV7RH9Z8H" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>