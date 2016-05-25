<script type="text/javascript">
function validateForm() {
    var file = document.getElementById('fileToUpload').value;

      if(file.length <= 0){
        alert("Plese select the file");
        return false;
    }
	else if(document.getElementById('file_tit').value == ""){
        alert("Plese add file title");
        return false;
    }
	else{
		document.forms["myForm"]["submit"].readOnly = "true";
		return true;
	}
}
</script>
<?php 

if(isset($_POST['submit'])) 
{ 
	include_once('report_uplords_form.php');
}
?>
<div id="body">
  <table align="center" width="450" height="140" id="input_table">
    <tr>
      <th colspan="2" align="center"> Report Uplords </th>
    </tr>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="myForm">
      <tr>
        <td><strong> File Titel </strong></td>
        <td colspan="1"><input type="text" name="file_tit" id="file_tit" /></td>
      </tr>
      <tr>
        <td><label for="file"><strong>Filename</strong></label></td>
        <td colspan="1"><input type="file" name="fileToUpload" id="fileToUpload" ></td>
      </tr>
      <tr>   
      <td colspan="2"><div align="center" id="resoult">
          <input type='submit' name="submit" id='button' value="Update Query" onclick="run_querey()" />
        </div></td>
    </tr>
    </form>
  </table>
</div>