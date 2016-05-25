
<div id="body">
<?php 
if(!isset($pram['ID'])) die("No Project id set");

require_once dirname(__file__) . '/../../../class/report.php';
$report = new reprt_view();

$sql= "SELECT REPORT_TYPE.NAME, REPORT.BODY , ([FIRST_NAME] + ' ' + [LAST_NAME]) as NAME
,'<div align=\"center\" id=\"resoult'+CONVERT(varchar(50), REPORT.ID)+'\">
<input type=\"button\" onclick=\"remove_report('''+CONVERT(varchar(50), REPORT.ID)+''')\" value=\"Remove\" /></div>' as 'Remove Report'
FROM REPORT_MAPPING INNER JOIN
REPORT ON REPORT_MAPPING.REPORT_ID = REPORT.ID INNER JOIN
REPORT_TYPE ON REPORT_MAPPING.REPORT_TYPE_ID = REPORT_TYPE.ID INNER JOIN
SYSTEMUSER_DETAILS ON REPORT_MAPPING.USER_ID = SYSTEMUSER_DETAILS.ID
WHERE REPORT_MAPPING.PROJECT_ID = '" . $pram['ID'] . "'";	

echo $report->result_table($sql);

 ?>
 
 <input type="hidden" name="__action_ts" id="__action_ts" value="YMIF97L6A1K1HQZQ" />
 <input type="hidden" name="__action_token" id="__action_token" value="<?php echo $token->get_token_admin(); ?>" />
 <input type="hidden" name="projet_id" id="projet_id" value="<?php echo $pram['ID']; ?>" />
 
 <div align="center" id="resoult"></div>
</div>