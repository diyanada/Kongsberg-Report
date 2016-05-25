<?php 
if(!isset($_GET['img'])) die("No image id set");
include('../owsh_secret.php');

require_once '../class/system_strings.php';
$sys_st = new system_strings();

if(!isset($_GET['type']))	$_GET['type'] = NULL;
if(!isset($_GET['dir']))	$_GET['dir'] = NULL;
if(!isset($_GET['ext']))	$_GET['ext'] = ".jpg";

if($_GET['type'] == "PROPIC"){

	$name = $sys_st->image_path("/PROFILE_PIC/". $_GET['img'].".jpg") ;
	$path =  realpath($name);
	
	if (file_exists($path)) {
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	} 
	else {
		$name = $sys_st->image_path("/NO-THUMB.jpg") ;
		
		$path =  realpath($name);
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	}

}
else if($_GET['type'] == "REPORT_DATA"){

	$name = $sys_st->image_path("/REPORT_DATA/". $_GET['img']) ;
	$file =  realpath($name);
	
	if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}

}
else if($_GET['type'] == "DISNER"){

	$name = $sys_st->image_path("/".$_GET['dir']."/". $_GET['img'].$_GET['ext']) ;
	$path =  realpath($name);
	
	if (file_exists($path)) {
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	} 
	else {
		$name = $sys_st->image_path("/NO-THUMB.jpg") ;
		
		$path =  realpath($name);
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	}

}
else if($_GET['type'] == "BANNER"){

	$name = $sys_st->image_path("/BANNER/". $_GET['img'].".jpg") ;
	
	$path =  realpath($name);
	
	$name2 = $sys_st->image_path("/BANNER/". $_GET['img'].".mp4") ;
	
	$path2 =  realpath($name2);
	
	if (file_exists($path)) {
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	} 
	if (file_exists($path2)) {
	require_once '../class/VideoStream.php';
	$stream = new VideoStream($path2);
	$stream->start();
    exit;
	}
	else {
		$name = $sys_st->image_path("/NO-THUMB.jpg") ;
		
		$path =  realpath($name);
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	}

}
else{
	$name = $sys_st->image_path("/". $_GET['img'].".jpg") ;
	
	$path =  realpath($name);
	
	if (file_exists($path)) {
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	} 
	else {
		$name = $sys_st->image_path("/NO-THUMB.jpg") ;
		
		$path =  realpath($name);
		$fp = fopen($path, 'rb');
		header("Content-Type: image/jpeg");
		header("Content-Length: " . filesize($name));

		fpassthru($fp);
		exit;
	}
}




// send the right headers


?>
