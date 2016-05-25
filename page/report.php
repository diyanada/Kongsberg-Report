

<!-- content here -->

<div class="menu-bar sticky">

     <div class="content bar-content">

        <div class="bar-logo">
			<a href="<?php echo $int_mg->external_source(""); ?>" title="Home">
            <img src="<?php echo $int_mg->external_source("img/image.php?img=logo_bar&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" /></a>
        </div>

        <div class="mobile-bar-logo hide">
            <a href="<?php echo $int_mg->external_source(""); ?>" title="Home">
            <img src="<?php echo $int_mg->external_source("img/image.php?img=logo_bar_mobile&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" /></a>
        </div>

        <ul>
            <li><a href="<?php echo $int_mg->external_source($_SESSION['uname']); ?>" class="current">Customer Home</a></li>
            <li><a href="<?php echo $int_mg->external_source("contact"); ?>" title="Contact">Contact</a></li>
            <li><a href="<?php echo $int_mg->external_source("logout"); ?>" title="Logout">Logout</a></li>
        </ul>   

    </div>

</div>

<?php 
	require_once 'class/system_strings.php';
	$sys_st = new system_strings();
	
	$conn = sqlsrv_connect( $sys_st->severnam(), $sys_st->connectionInfo());
		if ($conn === false) die ("No database connection!");
		
		$sql = "SELECT REPORT_TYPE.NAME, REPORT.BODY FROM REPORT INNER JOIN .REPORT_TYPE ON REPORT.REPORT_TYPE_ID = REPORT_TYPE.ID
		WHERE REPORT.[ID] ='" . $pram['Report_ID'] . "'";
		  
		$result = sqlsrv_query($conn, $sql);
		if ($result === false) die ("No database connection!(sql)");
		
		$row = sqlsrv_fetch_array($result);
		
		
?>

<div class="content profile-content clearfix">

    <div class="profile-text left">

        <h1><?php echo $row['NAME']; ?></h1>
    </div>

        <a class="button-red right download-button" href="#">
        <img src="<?php echo $int_mg->external_source("img/image.php?img=btn-arrow&ext=.png&dir=DESIGN/report&type=DISNER", ""); ?>" />
        <p>Download report</p></a>

</div>



<div class="band clearfix">

    <div class="content clearfix"> 
    
    <div class="profile-column profile-text "></div>

        <div class="main-content ">

    		<div class="report-tabs">
       
                <input class="tab" value="03/03/15" onClick="lord_report('KNGRP-6', 59, 1)" type="button">
                <input class="tab" value="04/03/15" onClick="lord_report('KNGRP-7', 59, 1)" type="button">
                <input class="tab" value="04/02/15" onClick="lord_report('KNGRP-8', 59, 1)" type="button">
        
                <div class="tab-content" id="KNGPRRE1UD59"> 
        
                    <?php echo $row['BODY']; ?>
        
                </div>

    		</div>

        </div>

    </div>


</div>

        
<div class="band footer-logo">
	<img src="<?php echo $int_mg->external_source("img/image.php?img=logo_footer&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" />

</div>

<div class="footer">
   
	<ul class="social-icons">
        <li><a href="https://www.facebook.com/KongsbergGruppen" target="_blank" alt="Like us on Facebook">
        	<img src="<?php echo $int_mg->external_source("img/image.php?img=fb&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" />
        </a></li>
        <li><a href="https://twitter.com/kongsbergasa" target="_blank" alt="follow us on twitter">
        	<img src="<?php echo $int_mg->external_source("img/image.php?img=twitter&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" />
        </a></li>
        <li><a href="https://www.youtube.com/user/kongsbergmaritime" target="_blank" alt="follow us on youtube">
        	<img src="<?php echo $int_mg->external_source("img/image.php?img=youtube&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" />
        </a></li>
        <li><a href="https://instagram.com/kongsbergasa/" target="_blank" alt="follow us on Instagram">
        	<img src="<?php echo $int_mg->external_source("img/image.php?img=instagram&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" />
        </a></li>
        <li><a href="https://www.linkedin.com/company/kongsberg" target="_blank" alt="follow us on linkedin">
        	<img src="<?php echo $int_mg->external_source("img/image.php?img=linkedin&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" />
        </a></li>
    </ul>

    <p>Copyright &copy; 2015 Kongsberg Gruppen - All rights reserved.</p>

</div>



