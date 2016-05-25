<?php 
include (dirname(__FILE__) . '/../owsh_secret.php');

echo 'function external_source_js(paht){';		
		
		echo 'return "'.$url_path .'"+paht;';
		//echo 'document.getElementById("lang_code").value ="'.$row['CODE'].'";';
		echo '}';
?>
