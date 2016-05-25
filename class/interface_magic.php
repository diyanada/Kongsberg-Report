<?php 
class interface_magic{
	public function external_source($url, $token=""){

		include (dirname(__FILE__) . '/../owsh_secret.php');	
		return $url_path . $url;
	}
	
	public function owsh_echo($txt, $lan = "EN"){

		require_once dirname(__FILE__) . '/../class/system_strings.php';
		$sys_str = new system_strings();
		
		$thoughts = json_decode(file_get_contents($sys_str->language_path("/".$lan.".php")), true);
		$thoughts_en = json_decode(file_get_contents($sys_str->language_path("/EN.php")), true);
		
		if ($thoughts == NULL) 	$thoughts = array();
		if ($thoughts_en == NULL) 	$thoughts_en = array();
		
		if (array_key_exists($txt, $thoughts))	return $thoughts[$txt]['thought'];
		else if (array_key_exists($txt, $thoughts_en))	return $thoughts_en[$txt]['thought'];
		else return $thoughts_en['un']['thought'];
	}
	

}
?>