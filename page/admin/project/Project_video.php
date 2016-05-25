<script type="text/javascript">
function validateForm() {
    var file = document.getElementById('fileToUpload').value;
	
	if(window.ActiveXObject){
        var fso = new ActiveXObject("Scripting.FileSystemObject");
        var filepath = document.getElementById('fileToUpload').value;
        var thefile = fso.getFile(filepath);
        var sizeinbytes = thefile.size;
    }else{
        var sizeinbytes = document.getElementById('fileToUpload').files[0].size;
    }

    
    fSize = sizeinbytes;
	
	var re = /(\.mp4)$/i;
if(!re.exec(file))
{
alert("File extension not supported!");
return false;
}
	
	else if(fSize >= (1258291200)){
        alert("Selected file is too large");
        return false;
    }

    else if(file.length <= 0){
        alert("Plese select the file");
        return false;
    }
	else{
	document.forms["myForm"]["submit"].style.display = 'none';
		return true;
	}
}
</script>
<?php 
if(!isset($pram['ID'])) die("No User id set");

if(isset($_POST['submit'])) 
{ 
	include_once('Project_video_form.php');
}
?>

<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Project Banner Vdieo </th>
    </tr>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
      <tr>
        <td><strong> User ID </strong></td>
        <td colspan="1"><input type="text" name="user_id" id="user_id" readonly="readonly" value="<?php echo $pram['ID']?>"/></td>
      </tr>
      <tr>
        <td><label for="file"><strong>Filename:</strong></label></td>
        <td colspan="1"><input type="file" name="fileToUpload" accept="video/mp4" id="fileToUpload" ></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center">
            <input type="submit" name="submit" id="button" value="Upload" />
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
		$sql = "SELECT [BANNER] as VALUE FROM [PROJECT] WHERE [ID] = ".$pram['ID'] ."";
			
			require_once dirname(__file__).'/../../../class/DB.php';
			$db=new database_retrive();
			
			$path = "img/image.php?type=BANNER&img=" . $db->set_value($sql);
			$img = $int_mg->external_source($path, "");
			
			$sql = "SELECT [BIV] as VALUE FROM [PROJECT] WHERE [ID] = ".$pram['ID'] ."";
			if ($db->set_value($sql) == 1){
			echo '<video width="100%" height="auto" controls><source src="' . $img . '" type="video/mp4">Your browser does not support the video tag.</video>';
			}
			else echo "<img src='" . $img . "' style='width:100%;height:auto;'/>";
		
			
		?>
        </strong></td>
    </tr>
  </table>
</div>
