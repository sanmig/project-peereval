<?php
namespace AppBundle\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
use AppBundle\Entity\{Person, User};

class Email
{
    public function send(Person $persons, $start, $end, User $user)
    {
    	$clientId = '822167168756-umjpvtoo246ftn9u6pa7ekic9e54e9hn.apps.googleusercontent.com';
		$clientSecret = '9iEiKWan-0IyBbSxFfgeFxkj';
		$refreshToken = '1/gja63MEtM3WxeInimDWgwKaUi5CN68LyGqJcnZEMVWlMJqR83pkKUED-aNqCVFpZ';
		$email = 'peereval.me@gmail.com';
		$site = 'http://54.252.169.4/';

    	$mail = new PHPMailer(true);

		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->AuthType = 'XOAUTH2';
		$mail->Port = '587';
		$mail->iSHTML(true);

		$provider = new Google([
			'clientId' => $clientId,
			'clientSecret' => $clientSecret
		]);

		$mail->setOAuth(
			new OAuth([
			'provider' => $provider,
			'clientId' => $clientId,
			'clientSecret' => $clientSecret,
			'refreshToken' => $refreshToken,
			'userName' => $email
			])
		);

		$errors = array();
		foreach($persons as $person){
			$mail->setFrom($email, 'Peer Evaluation');
			$mail->addAddress($person->getEmail(), $person->getName());
			$mail->Subject = 'evaluation form';
			$body =
			"Hello" . $person->getName() .
			"<br><br>" .
			"You have recently taken part in a groupd project for course test. Please complete the peer evaluation, using the unique code give below." . 
			"<br><br>" .
			"Unique code: " . $person->getUniqueCode() . "<br>" .
			"Click here to start evaluation:" . $site.$person->getToken(). 
			"<br><br>" .
			"Please keep in mind you have 1 week" ." (" . $start . "-" . $end . ") " . "to complete the evaluation before it is closed (Your unique code will no longer work)."."<br><br><br>".
			"Regards," . "<br>" . "Peereval.me";

    	$mail->Body = $body;

    	if (!$mail->send()){
    		$errors[] = "message sent fail to" . $person->getEmail() . $mail->ErrorInfo;
    	}

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