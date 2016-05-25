<?php
function content($title = "Kongsberg Reports", $body){

require_once 'class/interface_magic.php';
$int_mg = new interface_magic();

if(isset($_SESSION['language'])) 	$langi = $_SESSION['language'];
else if(isset($_COOKIE['KONGSBERG-REPORTS-LAN'])) 	$langi = $_COOKIE['KONGSBERG-REPORTS-LAN'];
else $langi = "EN";

echo <<<EOS

<!--
Developed by Diyanada J. Gunawardena	(diyanada@gmail.com)
Kongsberg Reports
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>

EOS;

echo $title;

echo <<<EOSF
</title>
</head>

<body>
EOSF;

include ($body);

echo <<<EOE

</body>
</html>

EOE;
}
