

<div class="MapHeader">
	<div class="CloseBtn system-button">Hide Map</div>
    <div class="MapHeaderContent">
		<div class="logo">
			<img src="<?php echo $int_mg->external_source("img/image.php?img=logo&ext=.png&dir=DESIGN/logos&type=DISNER", ""); ?>" />
		</div>
    
		<div class="border"></div>
    
		<div class="header-content">
			<h1>Get In Touch</h1>
			<a class='button revealMap'>Reveal Map</a>
		</div>
	</div>
	
    <div class="mapHolder">
    	<div class="cover"></div>
        <div id="map"></div>
	</div>
</div>


<div class="menu-bar">

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
            <li><a href="<?php echo $int_mg->external_source("/getin"); ?>" title="Login" class="current">Login</a></li>
            <li><a href="<?php echo $int_mg->external_source("/contact"); ?>" title="Contact">Contact</a></li>
        </ul>   

    </div>

</div>

<div class="band">

    <div class="content">
    	
        <div class="contactLeft">            
             
           <div class="formHolder">
           <form id="contact" name="contact" action="#" method="post">
 				<input type="text" id="name" name="name" placeholder="Name" />
                <input type="email" id="email" name="email" placeholder="email">
  				<textarea id="msg" name="msg" placeholder="message"></textarea>
                <button id="send">Send</button>
            </form>
            </div>
             
        </div>
        
        <div class="contactRight">
            <h1>More Information</h1>
            <p>If you are having trouble viewing your content, or would like to suggest new features & functionality. Please use the contact form to the left. Alternatively you can contact Kongsberg Norcontrol by post at the following address. Please make all posted mail out to ‘Kongsberg-Reports’.</p>
            <h2>Address:</h2>
            <p>12 High Street, Winterbourne, Bristol, BS36 1JN</p>	
            <h2>Phone:</h2>
            <p>+44 1454 774466</p>
            <h2>Business Hours:</h2>
            <p>8am-6:30pm M-F, 9am-2pm S-S</p>
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

<!-- JAVASCRIPT -->
<script type="text/javascript">
$(document).ready(function() {
		var stickyNavTop = $('.menu-bar').offset().top;
		var stickyNav = function(){
		var scrollTop = $(window).scrollTop();
      
		if (scrollTop > stickyNavTop) { 
			$('.menu-bar').addClass('sticky');
			$('body').css('padding-top', '66px')
		} else {
			$('.menu-bar').removeClass('sticky'); 
			$('body').css('padding-top', '0px')
			}
		};
 
	stickyNav();
 
	$(window).scroll(function() {
		stickyNav();
	});

	//MOBILE NAV
	$('.mobile-button').click(function(){
		$('.mobile-ul').removeClass('hide');
		$('.mobile-nav').animate({top:'0%'},350);
	});
        
	$('.close').click(function(){
		$('.mobile-nav').animate({top:'-140%'},350);
		$('.mobile-ul').addClass('hide');
	});
	
	$('.revealMap').click(function(){
		$('.MapHeaderContent').fadeOut();
		$('.mapHolder .cover').fadeOut();
		$('.MapHeader .CloseBtn').fadeIn();
	});

	$('.MapHeader .CloseBtn').click(function(){
		$('.MapHeaderContent').fadeIn();
		$('.mapHolder .cover').fadeIn();
		$('.MapHeader .CloseBtn').fadeOut();
	});	
	
	 
});

    
</script>    

<script type="text/javascript">

	var map;
	function initMap() {
	  
	  var kongbergLocation = {lat: 51.523796, lng: -2.508935};
	  
	  map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 51.523796, lng: -2.508935},
		zoom: 16, 
		scrollwheel: false
	  });
	  
	  var marker = new google.maps.Marker({
    	position: kongbergLocation,
    	map: map,
    	title: 'Hello World!'
  		});
	}

</script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUn5JMeWtGXfF4P4nOV-ziZj1bap5YzzA&callback=initMap">
</script>


<script type="text/javascript">
	function validateEmail(email) { 
		var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return reg.test(email);
	}

	$(document).ready(function() {
		$("#contact").submit(function() { return false; });

		$("#send").on("click", function(){
			var nameval  = $("#name").val();
			var emailval  = $("#email").val();
			var msgval    = $("#msg").val();
			var namelen   = nameval.length;
			var msglen    = msgval.length;
			var mailvalid = validateEmail(emailval);
			
			if(mailvalid == false) {
				$("#email").addClass("error");
			}
			else if(mailvalid == true){
				$("#email").removeClass("error");
			}
			
			if(namelen < 4) {
				$("#name").addClass("error");
			}
			else if(namelen >= 4){
				$("#name").removeClass("error");
			}
			
			if(msglen < 4) {
				$("#msg").addClass("error");
			}
			else if(msglen >= 4){
				$("#msg").removeClass("error");
			}
			
			if(mailvalid == true && msglen >= 4) {
				// if both validate we attempt to send the e-mail
				// first we hide the submit btn so the user doesnt click twice
				$("#send").replaceWith('<div class="sendingMessage">Your Message is sending...</div>');
				
				$.ajax({
					type: 'POST',
					url: 'sendmessage.php',
					data: $("#contact").serialize(),
					success: function(data) {
						if(data == "true") {
							$("#contact").fadeOut("fast", function(){
								$(this).before('<div class="EmailSentMessage">Thanks for getting Touch. We will get back to you as soon as possible.</div>');
								setTimeout("$.fancybox.close()", 1000);
							});
						}
					}
				});
			}
		});
	});
</script>

<!-- END OF SCRIPTS-->

