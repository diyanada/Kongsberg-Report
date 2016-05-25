<?php 
if(isset($_POST['submit'])) 
{ 
	include_once dirname(__file__) . ('/../login/login.php');
}
?>
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
            <li><a href="getin" title="Login" class="current">Login</a></li>
            <li><a href="contact" title="Contact">Contact</a></li>
        </ul>   

    </div>

</div>


<div class="login-header">

    <div class="content">
       
        <div class="border login-border"></div> 

        <div class="header-content login-content">

            <h1>Login</h1>
            <form method="post" action="" autocomplete="off">
     			<input class='input-box border-top' autocomplete="off" type="text" name="username" id="username" placeholder='Username' value="">
     			<input class='input-box' autocomplete="off" type="password" name="pass" id="pass" placeholder='Password' value="">
    			<input class='login-button button' type="submit" name="submit" value="Sign In">
			</form>

			<!--<p class='register-text'>Not a member yet? <a href="#">Register</a></p>-->
            
        </div>
     </div>

</div>

<p>
<?php if (isset($error))	echo $error ?>
</p>

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