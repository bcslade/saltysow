<?php
	// Change the Email Addresses below to email-id where you want to recieve your emails.
	// Reply Email Address where you want to set reply to email ID
	$reply_name = 'Auto Responde';
	$replyto = 'reply@domain.com';	
	$uploadpath = dirname(__FILE__).'/uploads/';
	
	// do not change this
	$subject = stripslashes($_POST['subject']);
	
	// Appears as subject options in form.
	switch ( $subject ) {
		case 'Guest Feedback Austin': 
								$toemail = 'austin@saltysow.com'; 
								break;
		case 'Guest Feedback Phoenix': 
								$toemail = 'cactus@saltysow.com'; 
								break;							
		case 'Media Inquiry': 
								$toemail = 'ErinF@guyandlarryrestaurants.com';
								break;
		case 'General Question':
								$toemail = 'info@saltysow.com';
								break;
		default:
				$toemail = 'info@saltysow.com'; // Change this to your default email ID
	}
	
	// no : Disable the Auto-Responder
	// yes : Enable Auto-Responder.
	$autorespond = 'yes'; 
	
	// no : Disable the Use Smtp   
	// yes : Enable Use Smtp.
	$usesmtp = 'no'; 
	
	/** 
	 * SMTP CONFIGURATION
	 * Change the below settings if you choose the SMTP as yes or choose only
	 * if your server requires and authentication for sending an email
	 * SMTP Port Ex: 45
	 * SMTP Server Ex: smtp.yourdomain.com
	 * SMTP username Ex: yourname@yourdomain
	 * SMTP password Ex: password
	 */
	$smtphost = 'ssl://smtp.yourdomain.com';  
	$smtpport = 465; 
	$smtpusername = 'youremail@domain.com';
	$smtppassword = 'password';
?>