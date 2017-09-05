<?php
namespace AppBundle\Security;

class Encrypt
{
    public function hashPass($pass){
		return password_hash(str_replace("+","",hash('sha512',$pass,true)),PASSWORD_BCRYPT);
	}

	public function comparePass($pass,$hashPass){
		return password_verify(str_replace("+","",hash('sha512',$pass,true)),$hashPass);
	}
}
?>