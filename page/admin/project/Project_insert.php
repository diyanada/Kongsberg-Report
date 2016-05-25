
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Add New Project </th>
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
          <input type='button' id='button' value="Update Query" onclick="run_querey()" />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="4Z46LLG0758F0I2N" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>