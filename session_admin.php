<?php
include('owsh_secret.php');	

session_start();
if(!isset($_SESSION['userid'])){
	header("Location: ".$url_path."admin?error=loginfirst");
    exit();
}

if(!isset($_SESSION['userid']) or $_SESSION['admin'] != true){
	header("Location: ".$url_path."admin?error=nopermission");
    exit();
}
?>
