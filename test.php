<?php
namespace AppBundle\Security;

use AppBundle\Utils\Email;

$email = new Email();
$receiver = 'trolldotaplayer@gmail.com';
$code = 'TEST';
$email->send($receiver,$code);
?>