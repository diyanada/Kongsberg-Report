<?php
if(!isset($pram['ID'])) die("No Language ID set");
if(!isset($pram['Language'])) die("No Language set");

		include dirname(__FILE__) .'/../../../owsh_secret.php';
		
		$thought = json_decode(file_get_contents($lang_path . "/".$pram['Language'].".php"), true);
		
		
		echo '<script type="text/javascript">function dats(){';
		
		echo 'document.getElementById("thought_id").value ="'.$pram['ID'].'";';
		echo 'document.getElementById("thought_lang").value ="'.$pram['Language'].'";';
		
		echo 'document.getElementById("thought").value ="'.$thought[$pram['ID']]['thought'].'";';
		echo 'document.getElementById("thought_des").value ="'.$thought[$pram['ID']]['description'].'";';
		
		echo 'document.getElementById("button").disabled = false;';
		echo '}</script>';
	  

	  

?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Edit Thought </th>
    </tr>
    <tr>
      <td><strong> Lord Data </strong></td>
      <td colspan="1"><input type="button" onclick="dats()" value="Lord Data"></td>
    </tr>
    <tr>
      <td><strong> Thought ID </strong></td>
      <td colspan="1"><input type="text" name="thought_id" id="thought_id" width="200" height="25" disabled="disabled" ></td>
    </tr>
    <tr>
      <td><strong> Thought Language </strong></td>
      <td colspan="1"><input type="text" name="thought_lang" id="thought_lang" width="200" height="25" disabled="disabled" ></td>
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
          <input type='button' id='button' value="Update Query" onclick="update_querey()" disabled="true"/>
        </div></td>
    </tr>
    <input type="hidden" name="__action_ts" id="__action_ts" value="G6DD40AW130R8X4H" />
    <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
  </table>
</div>