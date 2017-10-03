<?php
namespace AppBundle\Utils;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

class Email
{
    public function send($receiver,$code, $token, $start, $end){
		try{

			$clientId = '822167168756-umjpvtoo246ftn9u6pa7ekic9e54e9hn.apps.googleusercontent.com';

			$clientSecret = '9iEiKWan-0IyBbSxFfgeFxkj';

			$refreshToken = '1/gja63MEtM3WxeInimDWgwKaUi5CN68LyGqJcnZEMVWlMJqR83pkKUED-aNqCVFpZ';

			$email = 'peereval.me@gmail.com';

			$site = 'http://54.252.169.4/';

			$mail = new PHPMailer(true);

			//Enable SMTP debugging
			//0 = off
			//1 = client messages
			//2 = client and server messages
			$mail->SMTPDebug = 2;

			//Tell PHPMailer to use SMTP
			$mail->isSMTP();

			//set hostname of the mail server
			$mail->Host = 'smtp.gmail.com';

			$provider = new Google([
				'clientId' => $clientId,
				'clientSecret' => $clientSecret
			]);

			//set the encryption to use ssl or tls
			$mail->SMTPSecure = 'tls';

			//wheter to use SMTP authentication
			$mail->SMTPAuth = true;

			//set AuthType to use xoauth2
			$mail->AuthType = 'XOAUTH2';

			//set port
			$mail->Port = '587';

			$mail->setOAuth(
				new OAuth([
				'provider' => $provider,
				'clientId' => $clientId,
				'clientSecret' => $clientSecret,
				'refreshToken' => $refreshToken,
				'userName' => $email
				])
			);

			$mail->isHTML(true);

			//set who the message is f
			$mail->setFrom($email, 'Peer Evaluation');
			$mail->addAddress($receiver);

			$body =
			"Hello" . 
			"<br><br>" .

			"You have recently taken part in a groupd project for course test. Please complete the peer evaluation, using the unique code give below." . 
			"<br><br>" .

			"Unique code: " . $code . "<br>" .
			"Click here to start evaluation:" . $site.$token. 
			"<br><br>" .

			"Please keep in mind you have 1 week" ." (" . $start . "-" . $end . ") " . "to complete the evaluation before it is closed (Your unique code will no longer work)."."<br><br><br>".

			"Regards," . "<br>" . "Peereval.me";

			//content
			$mail->Subject = 'evaluation form';
			$mail->Body = $body;
			//$mail->AltBoty = 'test alt body';

			$mail->send();
		} catch (Exception $e){
			echo ' Mailer Error: ' . $mail->ErrorInfo;
		}
	}
}
?>