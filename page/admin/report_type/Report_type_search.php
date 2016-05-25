
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Report Type Search </th>
    </tr>
     <tr>
      <td><strong> ID </strong></td>
      <td colspan="1"><input type="text" name="rep_ty_id" id="rep_ty_id" readonly="readonly"/></td>
    </tr>
    <tr>
      <td><strong> Name </strong></td>
      <td colspan="1"><input type="text" name="rep_ty_name" id="rep_ty_name" /></td>
    </tr>
    <tr>
      <td><strong> Discription </strong></td>
      <td><textarea cols="45" rows="3" name="rep_ty_des" id="rep_ty_des"></textarea></td>
    </tr>
    
      <td colspan="2"><div align="center">
          <input type='button' id='button' value="Search Quary" onclick="search_querey()"  />
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="GAXNKP85WHBO7L4L" />
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