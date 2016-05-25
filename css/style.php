<?php 
header('Content-Type: text/css');

require_once '../class/interface_magic.php';
$int_mg = new interface_magic();
?>


.header {
	background: url('<?php echo $int_mg->external_source(
															"img/image.php?img=header_img&ext=.jpg&dir=DESIGN&type=DISNER"
															, ""); ?>') no-repeat center center fixed ;
                                                            
	-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.image {
	background: url('<?php echo $int_mg->external_source(
															"img/image.php?img=block_image_deliver&ext=.jpg&dir=DESIGN&type=DISNER"
															, ""); ?>') no-repeat;
	width:50%;
	text-transform:uppercase;
	background-size:120% auto;
	overflow:hidden;
}

.image-2 {
	background: url('<?php echo $int_mg->external_source(
															"img/image.php?img=block_image_2&ext=.jpg&dir=DESIGN&type=DISNER"
															, ""); ?>') no-repeat;
	width:50%;
	text-transform:uppercase;
	background-size:120% auto;
	overflow: hidden;
}
.systems {
	background: url('<?php echo $int_mg->external_source(
															"img/image.php?img=systems&ext=.jpg&dir=DESIGN&type=DISNER"
															, ""); ?>') center no-repeat;
	background-size:100%;
	width: 100%;
	text-transform: uppercase;
	padding: 100px 0 100px 0;
}
.login-header, .customer-header {
	
	background: url('<?php echo $int_mg->external_source(
															"img/image.php?img=login_header&ext=.jpg&dir=DESIGN&type=DISNER"
															, ""); ?>') no-repeat center center fixed ;
	  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	
}