<?php 
	
				switch ($arr[2]) {
				//----------------------------
				 	case "main":
						require_once('session_admin.php');
						include_once('views/admin_page.php');
						die (admin_page("", "Administrator"));
				  		break;	
				//----------------------------	
					case "language":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "page/admin/language/Language_ajax.js", "script/js.php");	
								die (admin_page("page/admin/language/Language_insert.php", "Administrator", $js));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/language/Language_ajax.js");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/language/Language_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "edit":	
								$js = array("script/comon.js", "page/admin/language/Language_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/language/Language_update.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
					//----------------------------	
					case "thoughts":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "page/admin/language_thoughts/Language_thoughts_ajax.js", "script/js.php");	
								die (admin_page("page/admin/language_thoughts/Language_thoughts_insert.php", "Administrator", $js));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/language_thoughts/Language_thoughts_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/language_thoughts/Language_thoughts_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "edit":	
								$js = array("script/comon.js", "page/admin/language_thoughts/Language_thoughts_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[5];
								$pram['Language'] = $arr[4];
								die (admin_page("page/admin/language_thoughts/Language_thoughts_update.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------	
					case "role":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "page/admin/role/Role_ajax.js", "script/js.php");	
								die (admin_page("page/admin/role/Role_insert.php", "Administrator", $js));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/role/Role_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/role/Role_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "edit":	
								$js = array("script/comon.js", "page/admin/role/Role_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/role/Role_update.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------	
					case "user":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "page/admin/user/User_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ROLE_ID'] = $arr[4];
								die (admin_page("page/admin/user/User_insert.php", "Administrator", $js, $css, $pram));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/user/User_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/user/User_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "edit":	
								$js = array("script/comon.js", "page/admin/user/User_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/user/User_update.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							case "pic":	
								$js = array("script/comon.js", "page/admin/user/User_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/user/User_pic.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------
					case "project":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "page/admin/project/Project_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/project/Project_insert.php", "Administrator", $js, $css));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/project/Project_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/project/Project_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "edit":	
								$js = array("script/comon.js", "page/admin/project/Project_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/project/Project_update.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							case "pic":	
								$js = array("script/comon.js", "page/admin/project/Project_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/project/Project_pic.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							case "vid":	
								$js = array("script/comon.js", "page/admin/project/Project_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/project/Project_video.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							case "mapping":	
								$js = array("script/comon.js", "page/admin/project/Project_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/project/Project_mapping.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------	
					case "report_type":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "page/admin/report_type/Report_type_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/report_type/Report_type_insert.php", "Administrator", $js, $css));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/report_type/Report_type_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/report_type/Report_type_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------	
					case "report":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "tinymce/tinymce.min.js", "page/admin/report/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/report/Report_insert.php", "Administrator", $js, $css, $pram));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/report/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/report/Report_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "edit":	
								$js = array("script/comon.js", "page/admin/report/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/report/Report_update.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							case "view":	
								$js = array("script/comon.js", "page/admin/report/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/report/Report_prjecid.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							case "order":	
								$js = array("script/comon.js", "page/admin/report/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/report/Report_order.php", "Administrator", $js, $css, $pram));
								break;
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------	
					case "report_uplords":
						include_once('views/admin_page.php');
						require_once('session_admin.php');
						
						switch ($arr[3]) {
						//----------------------------
							case "add":	
								$js = array("script/comon.js", "tinymce/tinymce.min.js", "page/admin/report_uplords/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								$pram['ID'] = $arr[4];
								die (admin_page("page/admin/report_uplords/Report_insert.php", "Administrator", $js, $css, $pram));
								break;	
						//----------------------------
							case "list":	
								$js = array("script/comon.js", "page/admin/report_uplords/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page("page/admin/report_uplords/Report_search.php", "Administrator", $js, $css));
								break;
						//----------------------------
							case "listMCE":	
								$js = array("script/comon.js", "tinymce/tinymce.min.js", "page/admin/report_uplords/Report_ajax.js", "script/js.php");	
								$css = array("css/throbber.css");
								die (admin_page_pn("page/admin/report_uplords/Report_search_tmc.php", "Administrator", $js, $css));
								break;
						
						//----------------------------
							default :
								die (admin_page("", "Administrator"));
								break;
						//----------------------------
						}
						 break;
				//----------------------------
					default :
						include_once('views/admin_page_main.php');
						die (admin_page("page/admin/main.php", "Administrator"));
						break;
				//----------------------------
				 }
?>