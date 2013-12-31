<?php
require("phpmailer/class.phpmailer.php");

// Do not edit this if you are not familiar with php
$post = (!empty($_POST)) ? true : false;
include 'contactsetting.php';

if( $post ) {

	function ValidateEmail( $email )
	{
		$regex = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
		$eregi = preg_replace($regex,'', trim($email));
		
		return empty( $eregi ) ? true : false;
	}

	//$subject = stripslashes($_POST['subject']);
	$subject = stripslashes( $_POST['subject'] );
	$name = stripslashes( $_POST['name'] );
	$cname = stripslashes( $_POST['name'] );
	$email = trim( $_POST['email'] );
	$message = stripslashes( $_POST['message'] );
	$phone = stripslashes( $_POST['phone'] );
	$answer = trim( $_POST['answer'] );
	
	// Change Number 4 to your desired captcha answer
	$verificationanswer = "4";
	
	// Mail Headers
	$to = $toemail.','.$replyto;
	$error = '';
	$headers = "";
	$headers .= "Reply-to:$email\n";
	$headers .= "From: $email\n";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers = "Content-Type: text/html; charset=iso-8859-1\n".$headers;
	
	// Checks name field else returns error message
	if( !$name ) 
		$error .= 'Enter your name.<br />';
	
	// Checks email field else returns error message
	if( !$email ) 
		$error .= 'Enter an e-mail address.<br />';
	
	// Validate email address
	if( $email && !ValidateEmail( $email ) ) 
		$error .= 'Enter a valid e-mail address.<br />';

	// Checks Subject Field else returns error message
	if ( !$subject ) 
		$error .= 'Select your subject.<br />';
		
	// Verifies captcha else returns error message
	if ( $answer <> $verificationanswer ) 
		$error .= 'Please enter the Correct verification number.<br />';
		
	// Checks message character length
	if ( ! $message || strlen( $message ) < 5 )
		$error .= "Please enter your message. It should have at least 5 characters.<br />";
	
	// If has no errors executes mail function
	if ( ! $error ) {
			$messages = "From: $email <br>";
			$messages .= "Name: $name <br>";
			$messages .= "Email: $email <br>";
			$messages .= "Message: $message <br>";
			$to = $toemail;
			
		//Executes if smtp set to yes in contactsetting.php file
		if( $usesmtp==="yes" ) {
			$mail = new PHPMailer(); 
			$mail -> IsSMTP();
			$mail -> SMTPAuth = 'yes'; 
			$mail -> Host = $smtphost; 
			$mail -> Port = $smtpport; 
			$mail -> Username = $smtpusername; 
			$mail -> Password = $smtppassword; 
			$mail -> AddReplyTo( $email, $name );        
			$mail -> SetFrom( $email, $name );                
			$mail -> AddAddress( $to, $name );        
			$mail -> Subject = $subject;        
			$mail -> MsgHTML( nl2br( $messages ) );
			$mail = $mail -> Send();
		} else {
			$mail = @mail ($to, $subject, $messages, "from: $email <$email>\nReply-To: $email \nContent-type: text/html" );
		}
		
		//Executes if mail sent
		if ( $mail ) {
			echo 'OK';
			
			//Executes if autorespond equals to yes
			if( $autorespond == "yes") {
				include_once("autoresponde.php");
			}
		}

	} else {
		echo '<div class="error">'.$error.'</div>';
	}
}
?>