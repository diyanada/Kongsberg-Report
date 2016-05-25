
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
	<tr>
      <th colspan="2" align="center"> Add New Thoughts </th>
    </tr>
    
	<tr>
      <td><strong> Thought ID </strong></td>
      <td colspan="1"><input type="text" name="thought_id" id="thought_id" width="200" height="25" disabled="disabled" ></td>
    </tr>

    <tr>
      <td><strong> Thought </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="l" name="thought" id="thought"></textarea>
        </strong></td>
    </tr>
     <tr>
      <td><strong> Thought Description </strong></td>
      <td colspan="1"><strong>
        <textarea cols="45" rows="3" name="thought_des" id="thought_des"></textarea>
        </strong></td>
    </tr>
    
      <td colspan="2"><div align="center" id="resoult">
          <input type='button' id='button' value="Update Query" onclick="run_querey()" />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="WHMYV7PEZLYGCVXO" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>