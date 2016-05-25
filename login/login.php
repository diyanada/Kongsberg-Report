<?php
	
	
	require_once dirname(__file__) . '/../class/user_mang.php';
	$user = new user_mang();
	
	require_once dirname(__file__) . '/../class/interface_magic.php';
	$int_mg = new interface_magic();
	
	$user_name = $_POST['username'];
	$user_pass = $_POST['pass'];

	$error = "";
	
	if($user->user_cookie($user_name, md5($user_pass))){
		$error = $int_mg->owsh_echo('KONGER16', $langi);
	}
	else if($user->user_login($user_name, md5($user_pass))){
		
		$url = $int_mg->external_source($user_name);
		$user->make_session($user_name, md5($user_pass));
		
		header('Location: ' . $url);
	}
	else{
		$error = $int_mg->owsh_echo('KONGER17', $langi);
	}
	

 
?>
