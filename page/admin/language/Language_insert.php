
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Add New Language </th>
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
      <td colspan="1"><input type="text" name="lang_code" id="lang_code" maxlength="2" style="text-transform:uppercase"/></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="134593HU2I03SNBM" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>