<?php
class content{

}
function content_user( $title = "Kongsberg Reports", $js = array(), $css = array(), $pram = NULL){

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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
EOS;

echo "
<head>
<title>" . $title . "</title>
";
foreach ($js as $value) {
    echo "<script src=" . $int_mg->external_source($value, "") . " type='text/javascript'></script>";
}
foreach ($css as $value) {
    echo "<link rel='stylesheet' type='text/css' href=" . $int_mg->external_source($value, "") . " />";
}
echo "</head>";


echo "<body>";

require_once 'class/client_user.php';
$cuser = new client_user($pram['User_ID'], $pram['Role_ID'], $pram['Username']);

echo $cuser->make_utility();

$pro_ar = $cuser->porject_arr($pram['User_ID']);
						
echo $cuser->make_header($pram['Project_ID'] , $pro_ar);

$cuser->porject_user_arr();



echo $cuser->make_engineers();

echo "</body></html>";
}
