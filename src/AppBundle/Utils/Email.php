<?php
namespace AppBundle\Utils;

class Email
{
    public function send($receiver,$code){
		try{

			$clientId = '';

			$clientSecret = '';

			$refreshToken = '';

			$email = '';

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

			//content
			$mail->Subject = $subject;
			$mail->Body = $body;
			//$mail->AltBoty = 'test alt body';

			$mail->send();
		} catch (Exception $e){
			echo ' Mailer Error: ' . $mail->ErrorInfo;
		}
	}
}
?>