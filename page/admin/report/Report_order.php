<head>
<script src="http://code.jquery.com/jquery-2.1.1-rc2.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script>
$(function(){
	$('.ulmove').sortable({connectWith:"ul"});

	$('.save').click(function(){
		var data= $('.ulmove').sortable('serialize');
		
		send_datass(data);
	});
});
</script>
</head>
<div id="body">
<?php 
if(!isset($pram['ID'])) die("No Project id set");

require_once dirname(__file__) . '/../../../class/report.php';
$report = new reprt_view();

require_once dirname(__file__) . '/../../../class/system_strings.php';
$sys_st = new system_strings();

		
		
		$sql = "SELECT  PROJECT.NAME AS PRONAME ,
				(SYSTEMUSER_DETAILS.FIRST_NAME + ' ' + SYSTEMUSER_DETAILS.LAST_NAME) AS engineer ,
				REPORT_MAPPING.USER_ID
				FROM REPORT_MAPPING 
				INNER JOIN PROJECT 
				ON REPORT_MAPPING.PROJECT_ID = PROJECT.ID 
				INNER JOIN SYSTEMUSER_DETAILS 
				ON REPORT_MAPPING.[USER_ID] = SYSTEMUSER_DETAILS.ID 
				WHERE PROJECT.ID = '" . $pram['ID'] . "' 
				GROUP BY REPORT_MAPPING.USER_ID,
				PROJECT.NAME ,
				(SYSTEMUSER_DETAILS.FIRST_NAME + ' ' + SYSTEMUSER_DETAILS.LAST_NAME)";
		
		$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) die("No Project id set1");
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) die("No Project id set1");
		
		while($row = sqlsrv_fetch_array($result))
  		{
			echo "<h4>Project : " . $row['PRONAME']  . "</h4> </ br>";
			echo "<h4>Engineer : " . $row['engineer']  . "</h4> </ br></ br>";
			
			
		$sql2= "SELECT REPORT_MAPPING.ID, REPORT_MAPPING.REPORT_ID, REPORT_TYPE.NAME , REPORT_MAPPING.[ORDER]
				FROM REPORT_MAPPING INNER JOIN
				REPORT ON dbo.REPORT_MAPPING.REPORT_ID =  REPORT.ID INNER JOIN
				REPORT_TYPE ON REPORT.REPORT_TYPE_ID = REPORT_TYPE.ID
				WHERE REPORT_MAPPING.PROJECT_ID = '" . $pram['ID'] . "' AND REPORT_MAPPING.[USER_ID] = '" . $row['USER_ID'] . "'
				ORDER BY REPORT_MAPPING.[ORDER]";	
		//echo $sql2;
		$result2 = sqlsrv_query($conn, $sql2);
		if ($result === false) die("No Project id set1");
		
		echo "<li class = 'lidrag'><table id='report_table' align='center'><tr>";
		echo "<th style='width: 30%'>REPORT ID </th>";
		echo "<th style='width: 60%'> NAME </th>";
		echo "<th style='width: 10%'> ORDER </th>";
		echo "<tr></table></li><ul class = 'ulmove '>";
		
			while($row = sqlsrv_fetch_array($result2))
			{
				echo "<li id = '" . "item_" . str_replace('-','',$row['ID']) . "' class = 'lidrag move'><table id='report_table' align='center'><tr>";
				echo "<td style='width: 30%'>".$row['REPORT_ID']."</td>";
				echo "<td style='width: 60%'>".$row['NAME']."</td>";
				echo "<td style='width: 10%'>".$row['ORDER']."</td>";
				echo "<tr></table></li>";
			}
			sqlsrv_free_stmt( $result2);
		echo "</ul><div align='center' id='resoult'><button id= 'button' class='save'>save</button></div>";
  		}


sqlsrv_free_stmt( $result);
		sqlsrv_close( $conn );

 ?>
 
 <input type="hidden" name="__action_ts" id="__action_ts" value="YMIF97L6A1KRRRR" />
 <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
 <input type="hidden" name="projet_id" id="projet_id" value="<?php echo $pram['ID']; ?>" />
 
 <div align="center" id="resoult"></div>
</div>