<?php
function admin_page($body = NULL, $title = "Kongsberg Reports", $js = array(), $css = array()){

require_once 'class/interface_magic.php';
$int_mg = new interface_magic();


echo "
<!--
Developed by Diyanada J. Gunawardena	(diyanada@gmail.com)
Kongsberg Reports
-->
";

echo <<<EOS
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
EOS;

echo "
<head>
<title>" . $title . "</title>
<link rel='stylesheet' type='text/css' href=" . $int_mg->external_source("css/admin_page.css", "") . " />
<link rel='stylesheet' type='text/css' href=" . $int_mg->external_source("css/admin_container.css", "") . " />
<script src=" . $int_mg->external_source("SpryAssets/SpryMenuBar.js", "") . " type='text/javascript'></script>
<link href=" . $int_mg->external_source("SpryAssets/SpryMenuBarHorizontal.css", "") . " rel='stylesheet' type='text/css' />
";
foreach ($js as $value) {
    echo "<script src=" . $int_mg->external_source($value, "") . " type='text/javascript'></script>";
}
foreach ($css as $value) {
    echo "<link rel='stylesheet' type='text/css' href=" . $int_mg->external_source($value, "") . " />";
}
echo "</head>";

date_default_timezone_set('Europe/London');
echo "
<body>
<div id='top_continer'>
<div id='left'> Adminstrator </div>
<div id='right'>"
.date('l j')."<sup>".date('S')."</sup>".date(' \of F Y')
."<br />"
.date('g:i a');

echo <<<EOSS

</div>
</div>

EOSS;
if ($body != NULL)		include ($body);

echo "</body></html>";
}
