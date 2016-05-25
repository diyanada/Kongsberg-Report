<?php 

class client_user{

	private $user_id = "";
	private $role_id = "";
	private $username = "";
	private $language = "";
	private $project_id = "";
	public $project_user = array();
	
	function porject_arr($user_id){
		$pro_arry = array();
		
		require_once 'system_strings.php';
		$sys_st = new system_strings();
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn == true){
			$sql = "SELECT [PROJECT_ID] FROM [PROJECT_MAPPING] WHERE [USER_ID] = " . $user_id;
			$result = sqlsrv_query($conn, $sql);
			if ($result == true) {
			$i = "1";
				while($row = sqlsrv_fetch_array($result))
				{
					array_push($pro_arry, $row['PROJECT_ID']);
				}	
				sqlsrv_free_stmt( $result);	
			}		
			sqlsrv_close( $conn );
		}
		
		
		return $pro_arry;
	}
	
	function client_user($user_id, $role_id, $username){
		$this->user_id = $user_id;
		$this->role_id = $role_id;
		$this->username = $username;
		
		
		
		if(isset($_SESSION['language'])) 	$langi = $_SESSION['language'];
		else if(isset($_COOKIE['KONGSBERG-REPORTS-LAN'])) 	$langi = $_COOKIE['KONGSBERG-REPORTS-LAN'];
		else $langi = "EN";
		
		$this->language = $langi;
	}
	
	function make_utility(){
	
	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	require_once 'interface_magic.php';
	$int_mg = new interface_magic();
		
		
		$sql = "SELECT [NAME] , [PROJECT_ID] FROM [KNG_PRO_PRO_MAP] WHERE [USER_ID] =" . $this->user_id;
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL;
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
		$return_val = "";
		
		while($row = sqlsrv_fetch_array($result))
  		{
  			$return_val .= " <li><a href='" .$int_mg->external_source($this->username . "/" . $row['PROJECT_ID']). "'>".$row['NAME']."</a></li>";
  		}
		
			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
	}
	
	function make_header($project_id = NULL, $pro_arry = array()){
	
	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	require_once 'interface_magic.php';
	$int_mg = new interface_magic();
	
	require_once 'DB.php';
	$db=new database_retrive();
	
	
	if ($project_id == NULL){
		if (isset($pro_arry[0]))	$project_id = $pro_arry[0];
		else 	die	($int_mg->owsh_echo("KONGER19", $this->language));
	}
	
	
	if (!in_array($project_id, $pro_arry)) die ($int_mg->owsh_echo("KONGER20", $this->language));
	
	$this->project_id = $project_id;
		
		
		$sql = "SELECT [NAME] 
		,CONVERT(VARCHAR(10),[START_DATE],103) AS[START_DATE]
		,CONVERT(VARCHAR(10),[END_DATE],103) AS [END_DATE] 
		FROM [PROJECT] WHERE [ID] =" . $project_id;
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) return NULL;
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) return NULL;
		
			
		$row = sqlsrv_fetch_array($result);
	
		
  		$return_val = "<h1>".$row['NAME']."</h1>";
		$return_val .= "<h3>".$row['START_DATE']. " - " .$row['END_DATE']."</h3>";
  			
		sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );
		
		return $return_val;
	}
	
	function make_header2($project_id = NULL, $pro_arry = array()){
	
	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	require_once 'interface_magic.php';
	$int_mg = new interface_magic();
	
	require_once 'DB.php';
	$db=new database_retrive();
	
	
	if ($project_id == NULL){
		if (isset($pro_arry[0]))	$project_id = $pro_arry[0];
		else 	die	($int_mg->owsh_echo("KONGER19", $this->language));
	}
	
	
	if (!in_array($project_id, $pro_arry)) die ($int_mg->owsh_echo("KONGER20", $this->language));
	
	$this->project_id = $project_id;
		
		$sql = "SELECT [BANNER] as VALUE FROM [PROJECT] WHERE [ID] = ".$project_id ."";
			
			
			$path = "img/image.php?type=BANNER&img=" . $db->set_value($sql);
			$img = $int_mg->external_source($path, "");
			
			$sql = "SELECT [BIV] as VALUE FROM [PROJECT] WHERE [ID] = ".$project_id ."";
			if ($db->set_value($sql) == 1){
			$banner = '<video width="auto" height="400px" style="padding-top: 10px;padding-bottom: 10px;" controls>
			<source src="' . $img . '" type="video/mp4">Your browser does not support the video tag.</video>';
			}
			else $banner = "<img width='auto' height='400px' src='" . $img . "' style='padding-top: 10px;padding-bottom: 10px;margin-left: auto;margin-right: auto;display: block;'/>";
		
		$return_val = $banner;
  			
		
		
		return $return_val;
	}
	
	function porject_user_arr(){
		$pro_arry = array();
		
		require_once 'system_strings.php';
		$sys_st = new system_strings();
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn == true){
			$sql = "SELECT [USER_ID] FROM [PROJECT_MAPPING] WHERE [ROLE_ID] = 2 AND [PROJECT_ID] = " . $this->project_id;
			$result = sqlsrv_query($conn, $sql);
			if ($result == true) {
				while($row = sqlsrv_fetch_array($result))
				{
					array_push($pro_arry, $row['USER_ID']);
				}	
				sqlsrv_free_stmt( $result);	
			}		
			sqlsrv_close( $conn );
		}
		
		
		$this->project_user = $pro_arry;
	}
	
	function make_downs(){
	
	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	$sql = "SELECT [BODY] FROM [REPORT] INNER JOIN [REPORT_MAPPING] ON [REPORT].ID = [REPORT_MAPPING].REPORT_ID WHERE [REPORT_MAPPING].PROJECT_ID = 
	" . $this->project_id;
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
	if ($conn === false) return NULL;
	  
	$result = sqlsrv_query($conn, $sql);
	if ($result === false) return NULL;	
	
	$htmls = "<html>";
			
	while ($row = sqlsrv_fetch_array($result))
	{
		$htmls .= $row['BODY'];
	}
	
	libxml_use_internal_errors(true);
	
	$dom = new DOMDocument;
	$dom->loadHTML($htmls);
	
	$returns = '';
	$temp = true;
	
	foreach ($dom->getElementsByTagName('a') as $node) {
	
	if ($node->getAttribute( 'id' ) == "KNGDOWNLOADS")	{	
		$returns .= '<li><a href="' . $node->getAttribute( 'href' ) . '"> ' . $node->nodeValue . ' </a></li>';
		$temp = false;
		}
	}
	
	if($temp) $returns = '<li><a> No Reports </a></li>';
		
		
		
		return $returns;
	}
	
	function make_engineers($Project_ID, $User_ID){
	
	require_once 'system_strings.php';
	$sys_st = new system_strings();
	
	require_once 'interface_magic.php';
	$int_mg = new interface_magic();
	
	require_once 'DB.php';
	$db=new database_retrive();
	
	$return_val = "";
	$i = 0;
	
	$pro_ar = $this->porject_arr($User_ID);
	$bans = $this->make_header2($Project_ID, $pro_ar);
	
		foreach ($this->project_user as $value) {
		$i ++;
		
		$sql = "SELECT [FIRST_NAME] ,[LAST_NAME] ,[EMAIL] ,[TELEPHONE_LAND] ,[TELEPHONE_MOBILE] ,[FAX] ,[IMAGE] ,[ROLE_NAME] FROM [KNG_ROLE_USERS] WHERE [ID] =" . $value;
			
			$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
			if ($conn === false) return NULL;
			  
			$result = sqlsrv_query($conn, $sql);
			if ($result === false) return NULL;	
					
			while ($row = sqlsrv_fetch_array($result))
			{
			
				$path = "img/image.php?type=PROPIC&img=" . $row['IMAGE'];
			
				$img = $int_mg->external_source($path, "");
				
				$sql2 = "	SELECT [REPORT_ID],[NAME]	
							FROM REPORT_TYPE INNER JOIN REPORT_MAPPING ON REPORT_TYPE.ID = REPORT_MAPPING.REPORT_TYPE_ID
							WHERE [PROJECT_ID] = ".$this->project_id." AND [USER_ID] = ".$value
							."ORDER BY REPORT_MAPPING.[ORDER]";
				$result2 = sqlsrv_query($conn, $sql2);
				if ($result2 === false) return NULL;
				$return_btn = "";
					while ($row2 = sqlsrv_fetch_array($result2))
					{
						$return_btn .= " <input class='tab' type='button' value = '".$row2['NAME']."'
						onclick=\"lord_report('" . $row2['REPORT_ID'] . "', ". $value . ", " . $this->project_id . ")\">";
					}
				
				$return_val .= '
				<div class="band clearfix">
					<div class="content clearfix">
						<div class="profile-column profile-text ">
	
							<img src="' . $img . '">
				
							<h1>' . $row['FIRST_NAME'] . " " . $row['LAST_NAME'] .'</h1>
							<h4 class="red">Engineer</h4>
				
							<ul>
								<ul>
										<li><span class="red">e:</span> ' . $row['EMAIL'] . '</li>
										<li><span class="red">t:</span>' . $row['TELEPHONE_LAND'] . '</li>
										<li>' . $row['TELEPHONE_MOBILE'] . '</li>
									</ul> 
							</ul>
				
						</div>
						
						<div class="main-content ">
							' . $bans . '
					
								<div class="report-tabs">
					   
										' . $return_btn . '
										
										<div class="tab-content" id="KNGPRRE' . $this->project_id . 'UD' . $value . '"></div>
								
								
									</div>
								
								</div>
							</div>
					
					</div>
				</div>	
					';
			
				//$return_val .= "<div class='report-tabs'><div class='tab-content' id='KNGPRRE".$this->project_id."UD".$value."'> </div></div>";
		}
		
		}
		return $return_val;
	}
}
?>