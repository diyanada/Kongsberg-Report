<?php 
class Log_Works{
	public function To_log($er_code, $er_msg, $file, $userid, $actionID){
		include (dirname(__FILE__) . '/../owsh_secret.php');
		
		date_default_timezone_set('UTC');
		
		$file_path = $log_path . "/" . date("Y-m-d") . ".php";
		
		if (!file_exists($file_path)) {
  
		$file = fopen($file_path, "w") ;
		fclose($file);
		}
		
		
		
		
		$txt = "<tr><td>" . date("F j, Y, g:i:u a") . "</td><td>" . $er_code . "</td><td>" . $er_msg . "</td><td>" . $file . "</td><td>" . $userid . "</td><td>" . $actionID .  "</td></tr>\n";
		
		file_put_contents($file_path, $txt, FILE_APPEND | LOCK_EX);
	}
}
?>