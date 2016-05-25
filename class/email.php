<?php 
class email{

	public function Send_mail($er_file, $userID, $actionID, $to, $subject, $hbody, $nbody = ""){
		require_once dirname(__FILE__) . '/../PHPMailer/PHPMailerAutoload.php';
		
		require_once ('Log_Works.php');
		$log = new Log_Works();
		
		$mail = new PHPMailer;
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'mail.kongsberg-reports.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'info@mail.kongsberg-reports.com';                 // SMTP username
		$mail->Password = 'h4aKiyuxG4y0vOVY';                           // SMTP password
		//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 6061;                                    // TCP port to connect to
		
		$mail->From = 'info@mail.kongsberg-reports.com';
		$mail->FromName = 'Kongsberg-Reports';
		//$mail->addAddress('diyanada', 'Joe User');     // Add a recipient
		$mail->addAddress($to);                // Name is optional
		$mail->addReplyTo('info@mail.kongsberg-reports.com', 'Kongsberg-Reports');
		$mail->addCC('info@mail.kongsberg-reports.com');
		$mail->addBCC('info@mail.kongsberg-reports.com');
		
		    // Optional name
		$mail->isHTML(true);                                    // Set email format to HTML
		
		$mail->Subject = $subject;
		$mail->Body    = $hbody;
		$mail->AltBody = $nbody;
		
		if(!$mail->send()) {
			$log->To_log("", $mail->ErrorInfo, $er_file, $userID, $actionID);
			return 8;
		} else {
			return true;
}
	}
	
	
}
?>