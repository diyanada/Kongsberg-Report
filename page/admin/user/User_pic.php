<script type="text/javascript">
function validateForm() {
    var file = document.getElementById('fileToUpload').value;

      if(file.length <= 0){
        alert("Plese select the file");
        return false;
    }
	else{
		document.forms["myForm"]["submit"].readOnly = "true";
		return true;
	}
}
</script>
<?php 
if(!isset($pram['ID'])) die("No User id set");

if(isset($_POST['submit'])) 
{ 
	include_once('User_pic_form.php');
}
?>

<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> User Profile Picture </th>
    </tr>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
      <tr>
        <td><strong> User ID </strong></td>
        <td colspan="1"><input type="text" name="user_id" id="user_id" readonly="readonly" value="<?php echo $pram['ID']?>"/></td>
      </tr>
      <tr>
        <td><label for="file"><strong>Filename:</strong></label></td>
        <td colspan="1"><input type="file" name="fileToUpload" id="fileToUpload" ></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <input type="submit" name="submit" id="button" value="Upload" />
          </div></td>
      </tr>
      <tr>
        <td colspan="2"><div id="spriner" align="center"><br />
            <br />
            <div class="throbber-loader"></div>
          </div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center" id="resoult"></div></td>
      </tr>
      <input type="hidden" name="__action_ts" id="__action_ts" value="9P061H216C1XMFOG" />
      <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
    </form>
    <tr>
      <td colspan="2"><strong>
        <?php 	
		$sql = "SELECT [IMAGE] as VALUE FROM [SYSTEMUSER_DETAILS] WHERE [ID] = ".$pram['ID'] ."";
			
			require_once dirname(__file__).'/../../../class/DB.php';
			$db=new database_retrive();
			
			$path = "img/image.php?type=PROPIC&img=" . $db->set_value($sql);
			
			$img = $int_mg->external_source($path, "");
		
			echo "<img src='" . $img . "' style='width:100%;height:auto;'/>";
		
		?>
        </strong></td>
    </tr>
  </table>
</div>
