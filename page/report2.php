<?php 
require_once 'class/client_user.php';
$cuser = new client_user($pram['User_ID'], $pram['Role_ID'], $pram['Username']);
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
<div class="content profile-content clearfix">
  <div class="profile-text left">
    <?php 
			 $pro_ar = $cuser->porject_arr($pram['User_ID']);
			 echo $cuser->make_header($pram['Project_ID'] , $pro_ar);
		?>
  </div>
  <div class="right">
    <nav id="primary_nav_wrap">
      <ul>
        <li class="current-menu-item"> <a href="#" class="button-red right download-button"> <img src="
		  <?php echo $int_mg->external_source("img/image.php?img=btn-arrow&ext=.png&dir=DESIGN/report&type=DISNER", ""); ?>" />
          <p>Download report</p>
          </a>
          <ul>
          	<?php 
				echo $cuser->make_downs();
			?>
          </ul>
        </li>
      </ul>
    </nav>
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
<!------------------------------------------------------------------------------------------------------>
<?php 
		$cuser->porject_user_arr();
		echo $cuser->make_engineers($pram['Project_ID'], $pram['User_ID']);
	?>
<!------------------------------------------------------------------------------------------------------>
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
