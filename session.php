<?php
include('owsh_secret.php');	

session_start();
if(!isset($_SESSION['userid'])){
	header("Location: ".$url_path);
    exit();
}


?>
