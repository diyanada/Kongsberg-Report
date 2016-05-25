
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Project Search </th>
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
      <td><strong> Ongoing project due to date </strong></td>
      <td><input type="date" name="o_date" id="o_date" placeholder="YYYY-MM-DD"></td>
    </tr>
    
      <td colspan="2"><div align="center">
          <input type='button' id='button' value="Search Quary" onclick="search_querey()"  />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="M582S3B05GZO747H" />
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