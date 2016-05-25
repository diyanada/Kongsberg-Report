
<form id="abcc" method="post" action="<?php echo $int_mg->external_source("login/login_admin.php", ""); ?>" autocomplete="off">

<div id="login">

    <table width="360" align="center" border="0">
      <tr>
        <td width="120"> User Name </td>
        <td>:</td>
        <td colspan="2">
        	<input autocomplete="off" type="text" name="username" id="username" value="<?php if (isset($_GET['uname'])) echo $_GET['uname'] ?>"/>
         </td>
      </tr>
      <tr>
        <td width="120"> Password </td>
        <td>:</td>
        <td colspan="2">
        	<input autocomplete="off" type="password" name="pass" id="pass" value=""/>
         </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center"><input type="submit"  value="Sign In" /></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <br />
    <div align="center">
    <p ><?php if (isset($_GET['error'])) echo $_GET['error'] ?></p>
    </div>
    
</div>

</form>

