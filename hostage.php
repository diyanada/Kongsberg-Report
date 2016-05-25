<?php 

//********************************************************************************************
//	Diyanada J. Gunawardena
// 	diyanada@gmail.com
//********************************************************************************************



require_once 'views/kng_contents.php';
$page = new kng_contents();


if (!isset($_GET['_url']) or $_GET['_url'] == "") {
die ($page -> content());
}

$arr = array();
$arr = (explode("/",$_GET['_url']));

if (!isset($arr[1])) $arr[1] = NULL; 
if (!isset($arr[2])) $arr[2] = NULL; 
if (!isset($arr[3])) $arr[3] = NULL; 
if (!isset($arr[4])) $arr[4] = NULL; 
if (!isset($arr[5])) $arr[5] = NULL; 
if (!isset($arr[6])) $arr[6] = NULL; 



//-------------------------------------------------------------------------------------------------------------------------------------------
		switch ($arr[1]) {
//---------------------------------------------------------------		
		   	case "admin":		
				include('hostage_admin.php');
				break;
				
//---------------------------------------------------------------				 
			case "register":
				include('login/cookies.php');
				 break;
//---------------------------------------------------------------				 
			case "getin":
				die ($page -> content("page/main.php"));
				 break;
//---------------------------------------------------------------				 
			case "contact":
				die ($page -> content("page/contact.php"));
				 break;
//---------------------------------------------------------------				 
			case "report":
				require_once('session.php');
				$pram['Report_ID'] = $arr[2];
				$pram['Project_ID'] = $arr[3];
				$js = array();	
				$css = array();
				die ($page -> content("page/report.php", "Kongsberg", $js, $css, $pram));
				 break;
//---------------------------------------------------------------				 
			default :
			
				require_once 'class/DB.php';
				$DB = new database_retrive();
				
				$uid = $DB->user_id($arr[1]);
				
				
				
				if (is_int($uid)){
					require_once('session.php');
					
					if ($uid != $_SESSION['userid'])	die ($page -> content("page/main.php"));
					
					if($arr[2] == "logout"){
					
						session_unset();
						session_destroy();
						die ($page -> content("page/main_font.php"));
					}
					
					$role_id = $DB->pole_id($uid);
					switch ($role_id) {
						case 1:
							die ($page -> content("page/main_font.php"));
							break;
						case 2:
							die ($page -> content("page/main_font.php"));
							break;
						case 3:
							
							include_once('views/content.php');
							
							$js = array("script/js.php", "script/Client_User_ajax.js");	
							$css = array();
							$pram['Username'] = $arr[1];
							$pram['Role_ID'] = $role_id;
							$pram['User_ID'] = $uid;
							$pram['Project_ID'] = $arr[2];
							if ($arr[2] == null)	die ($page -> content("page/customer.php", $arr[1], $js, $css, $pram));
							else die ($page -> content("page/report2.php", $arr[1], $js, $css, $pram));												
							break;
						default:
							die ($page -> content("page/main.php"));
							break;
					}
				}
				else{				
					die ($page -> content("page/main_font.php"));
				}
				 break;		 
		}	
//-------------------------------------------------------------------------------------------------------------------------------------------
	





?>