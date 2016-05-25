<?php 
class kng_contents{

function content ($body = NULL, $title = "Kongsberg", $js = array(), $css = array(), $pram = NULL){

if(isset($_SESSION['language'])) 	$langi = $_SESSION['language'];
else if(isset($_COOKIE['KONGSBERG-REPORTS-LAN'])) 	$langi = $_COOKIE['KONGSBERG-REPORTS-LAN'];
else $langi = "EN";

require_once 'class/interface_magic.php';
$int_mg = new interface_magic();

require_once 'class/action_token.php';
$token = new action_token();

echo "
<!--
Developed by Diyanada J. Gunawardena	(diyanada@gmail.com)
Kongsberg Reports
-->
";
echo <<<EOS
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
EOS;

echo '
<head>
<title>' . $title . '</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0">
	<meta name="description" content="Kongsberg">
	<meta name="keywords" content="Kongsberg">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="' . $int_mg->external_source("css/style.css", "") . '">
	<link rel="stylesheet" type="text/css" href="' . $int_mg->external_source("css/style.php", "") . '">

	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700,100,300" rel="stylesheet" type="text/css">

	<!--JAVASCRIPT-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
	<script src=' . $int_mg->external_source("script/font_js.js", "") . ' type="text/javascript"></script>
';
foreach ($js as $value) {
    echo "<script src=" . $int_mg->external_source($value, "") . " type='text/javascript'></script>";
}
foreach ($css as $value) {
    echo "<link rel='stylesheet' type='text/css' href=" . $int_mg->external_source($value, "") . " />";
}
echo "</head>";
echo "<body>";
if ($body != NULL)		include ($body);
echo "</body></html>";

}
}
?>
