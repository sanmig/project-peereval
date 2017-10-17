<?php
namespace AppBundle\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
use AppBundle\Entity\{Person, User};

class Email
{
    public function send($persons, $start, $end, $user)
    {
	    	//authentication details of systems email account
    		$clientId = '822167168756-umjpvtoo246ftn9u6pa7ekic9e54e9hn.apps.googleusercontent.com';
		$clientSecret = '9iEiKWan-0IyBbSxFfgeFxkj';
		$refreshToken = '1/gja63MEtM3WxeInimDWgwKaUi5CN68LyGqJcnZEMVWlMJqR83pkKUED-aNqCVFpZ';
	    
		$email = 'peereval.me@gmail.com'; //system's email
		$site = 'http://54.252.169.4/'; //site url

    		$mail = new PHPMailer(true); //create new intance of PHPMailer
		
	    	//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
	    
		$mail->isSMTP(); //Tell PHPMailer to use SMTP
	    
		$mail->Host = 'smtp.gmail.com'; //Set the hostname of the mail server
	    
		$mail->SMTPSecure = 'tls'; //Set the encryption system to use tls
	    
		$mail->SMTPAuth = true; //Whether to use SMTP authentication
	    
		$mail->AuthType = 'XOAUTH2'; //Set AuthType to use Google's XOAUTH2
	    
		$mail->Port = '587'; //set port number 587 - SMTP port
	    
		$mail->iSHTML(true);

		$provider = new Google([
			'clientId' => $clientId,
			'clientSecret' => $clientSecret
		]);
		
	    	//Pass the OAuth provider instance to PHPMailer
		$mail->setOAuth(
			new OAuth([
			'provider' => $provider,
			'clientId' => $clientId,
			'clientSecret' => $clientSecret,
			'refreshToken' => $refreshToken,
			'userName' => $email
			])
		);

		$errors = array(); //create array of errors
	    	
	    	//loop persons array 
		foreach($persons as $person){
			
			$mail->setFrom($email, 'Peer Evaluation'); //Set who the message is to be sent from
			
			$mail->addAddress($person->getEmail(), $person->getName()); //Set who the message is to be sent to
			
			$mail->Subject = 'evaluation form'; //Set the subject line
			
			//body text
			$body =
			"Hello, " . $person->getName() .
			"<br><br><br>" .
			"You have recently taken part in a group collaboration and have been instructed to complete a peer evaluation form by " . $user->getFirstName() . " "  . $user->getLastName() .
			". <br>" .
			"Use the unique code supplied below to start your evaluation." .
			"<br>" .
			"(note: you will not be able to edit results once submitted)" .
			"<br><br>" .
			"Unique Code: " . $person->getUniqueCode() .
			"<br>" . 
			"Click here to start evaluation:" . $site.$person->getToken(). 
			"<br><br>" .
			"The evaluation results may apply to the marking criteria. " .
			"Please answer all questions honestly and correctly." .
			"<br>" .
			"Keep in mind you have 1 week" ." (" . $start . "-" . $end . ") " . "to complete the evaluation before it is closed."."<br><br>".
			"If you have any questions or concerns contact me here: " . $user->getEmail() . "<br><br><br>" .
			"Regards," . "<br>" . $user->getFirstName() . " "  . $user->getLastName()."";

    			$mail->Body = $body; //set body text
	
	//send email if false store the error email to errors array
    	if (!$mail->send()){
    		$errors[] = "message sent fail to" . $person->getEmail() . $mail->ErrorInfo;
    	}
	
	//clear addresses
    	$mail->clearAddresses();
		}

    	if (empty($errors)){
    		echo "All emails sent!";
    	}
    	else {
    		echo $errors;
    	}
	}
}
?>
