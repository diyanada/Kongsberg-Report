<?php
	
	
	require_once '../class/user_mang.php';
	
	$user_name = $_POST['username'];
	$user_pass = $_POST['pass'];
			
	$user=new user_mang();
	
	/*if($user->user_cookie($user_name, md5($user_pass))){
		$url="../admin?error="."no cookie"."&uname=".$user_name;
	}
	else*/ 
	if($user->admin_login($user_name, md5($user_pass))){
		$url="../admin/main";
		$user->make_admin_session($user_name, md5($user_pass));
	}
	else{
		$url="../admin?error="."Username or Password is invalid."."&uname=".$user_name;
	}
?>
<html>
<head>
<meta http-equiv="refresh" content="0; url=<?php echo $url;?>">
</head>
<body>
</body>
</html>
