<?php
  require_once('session_admin.php')
?>


<div id="topbar">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a class="MenuBarItemSubmenu" href="#">language</a>
        <ul>
          <li><a href="<?php echo $int_mg->external_source("admin/language/add", ""); ?>">language Add</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/language/list", ""); ?>">Language List (Edit)</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/thoughts/add", ""); ?>">Thoughts Add</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/thoughts/list", ""); ?>">Thoughts List (Edit)</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">User</a>
        <ul>
          <li><a href="<?php echo $int_mg->external_source("admin/role/add", ""); ?>">Role Add</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/role/list", ""); ?>">Role List (Edit)</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/user/add", ""); ?>">Register User</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/user/add/2", ""); ?>">Register Engineer</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/user/add/3", ""); ?>">Register Clients</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/user/list", ""); ?>">Edit User</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">Project</a>
        <ul>
          <li><a href="<?php echo $int_mg->external_source("admin/project/add", ""); ?>">Project Add</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/project/list", ""); ?>">Project List (Edit)</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">Tab</a>
        <ul>
          <li><a href="<?php echo $int_mg->external_source("admin/report_type/add", ""); ?>">Tab Type Add</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/report_type/list", ""); ?>">Tab Type List</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">File</a>
        <ul>
          <li><a href="<?php echo $int_mg->external_source("admin/report_uplords/add", ""); ?>">File Add</a></li>
          <li><a href="<?php echo $int_mg->external_source("admin/report_uplords/list", ""); ?>">File List</a></li>
        </ul>
      </li>
      <li><a href="#">---------------</a></li>
      <li><a href="#">---------------</a></li>
      <li><a href="<?php echo $int_mg->external_source("admin/main", ""); ?>">Main</a></li>
      
    </ul>

</div>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
