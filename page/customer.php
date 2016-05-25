<?php 
require_once 'class/client_user.php';
$cuser = new client_user($pram['User_ID'], $pram['Role_ID'], $pram['Username']);

require_once 'class/client_user2.php';
$cuser2 = new client_user2($pram['User_ID'], $pram['Role_ID'], $pram['Username']);
?>
<!-- content here -->

<div class="menu-bar sticky">
  <div class="content bar-content">
    <div class="bar-logo"> <a href="<?php echo $int_mg->external_source(""); ?>" title="Home"> <img src="<?php echo $int_mg->external_source("img/image.php?img=logo_bar&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" /></a> </div>
    <div class="mobile-bar-logo hide"> <a href="<?php echo $int_mg->external_source(""); ?>" title="Home"> <img src="<?php echo $int_mg->external_source("img/image.php?img=logo_bar_mobile&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" /></a> </div>
    <ul>
      <li><a href="<?php echo $int_mg->external_source($pram['Username']); ?>" class="current">Customer Home</a></li>
      <li><a href="<?php echo $int_mg->external_source("contact"); ?>" title="Contact">Contact</a></li>
      <li><a href="<?php echo $int_mg->external_source("logout"); ?>" title="Logout">Logout</a></li>
    </ul>
  </div>
</div>

<div class="customer-header">
    <div class="content">
        <div class="border"></div>

        <div class="header-content">
			 <h1><?php echo $cuser2->com_name(); ?></h1>
        </div>
     </div>
</div>

<div class="menu-bar reports">
    <div class="content bar-content">
        <ul>
        	<li class="title">PROJECTS</li>
           <?php 
				echo $cuser->make_utility();
			?>
        </ul>   
    </div>
</div>
<div class="blocks customerPage">

	<div class="block latestReport">
    	<h1>LATEST<br />REPORT</h1>
        <div class="underline"></div>
        <?php 
				echo $cuser2->lt_report();
			?>
	</div>

	<div class="block yellow-band white systemDetails">
    	<h1>SYSTEM DETAILS</h1>
        <div class="underline"></div>
		<ul>
			<li>Kvitsoy</li>
			<li>Vigdel</li>
			<li>Vagneset</li>
			<li>Duchamer</li>
			<li>Heres</li>

		</ul>
	</div>
    
</div>

<div class="blocks customerPage">

	<div class="block grey-band white customerDetails">
		<h1>CUSTOMERS DETAILS</h1>
        <div class="underline"></div>
		<?php 
				echo $cuser2->cus_det();
			?>
    </div>
    
	<div class="block">
		<?php 
				echo $cuser2->eng_det();
			?>
    
</div>

<div class="band">
    <div class="content customer-text clearfix">
        <h3 class="large">Days since last visit:</h3>
        <p class="large">13 days, 12 hours, 34 Minutes</p>    
		<a class="button-red" href="emailto:greg.edwards@kongsberg.com">Book Now</a>
    </div>  
</div>

<div class="band"> </div>
<div class="band footer-logo"> <img src="<?php echo $int_mg->external_source("img/image.php?img=logo_footer&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" /> </div>
<div class="footer">
  <ul class="social-icons">
    <li><a href="https://www.facebook.com/KongsbergGruppen" target="_blank" alt="Like us on Facebook"> <img src="<?php echo $int_mg->external_source("img/image.php?img=fb&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" /> </a></li>
    <li><a href="https://twitter.com/kongsbergasa" target="_blank" alt="follow us on twitter"> <img src="<?php echo $int_mg->external_source("img/image.php?img=twitter&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" /> </a></li>
    <li><a href="https://www.youtube.com/user/kongsbergmaritime" target="_blank" alt="follow us on youtube"> <img src="<?php echo $int_mg->external_source("img/image.php?img=youtube&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" /> </a></li>
    <li><a href="https://instagram.com/kongsbergasa/" target="_blank" alt="follow us on Instagram"> <img src="<?php echo $int_mg->external_source("img/image.php?img=instagram&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" /> </a></li>
    <li><a href="https://www.linkedin.com/company/kongsberg" target="_blank" alt="follow us on linkedin"> <img src="<?php echo $int_mg->external_source("img/image.php?img=linkedin&ext=.png&dir=DESIGN/footer&type=DISNER", ""); ?>" /> </a></li>
  </ul>
  <p>Copyright &copy; 2015 Kongsberg Gruppen - All rights reserved.</p>
</div>
<!-- JAVASCRIPT -->
<script type="text/javascript">
$(document).ready(function() {

	//MOBILE NAV
	$('.mobile-button').click(function(){
		$('.mobile-ul').removeClass('hide');
		$('.mobile-nav').animate({top:'0%'},350);
	});
        
	$('.close').click(function(){
		$('.mobile-nav').animate({top:'-140%'},350);
		$('.mobile-ul').addClass('hide');
	});
	
	
	//YELLOW BOX SIZE
	var YellowBoxHeight = $('.block.yellow-band').height()
	$('.yellowBlockImage').css('height', YellowBoxHeight);
	
	//GREY BOX SIZE
	var GreyBoxHeight = $('.block.grey-band').parent().height()
	$('.GreyBlockImage').css('height', GreyBoxHeight);
	  
    
});
    
</script>
<!-- END OF SCRIPTS-->
