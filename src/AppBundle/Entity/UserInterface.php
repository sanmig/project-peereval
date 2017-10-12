<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;

class UserInterface implements AdvancedUserInterface, \Serializable
{
    protected $username;

    protected $password;

    protected $email;

    protected $role;

    public function setUsername($username)
    {

    }

    public function getUsername()
    {
    }

    public function setPassword($password)
    {
    }

    public function getPassword()
    {
    }

    public function setEmail($email)
    {
    }

    public function getEmail()
    {
    }

    public function setRole($role)
    {
    }

    public function getRole()
    {
    }

    public function getRoles()
    {
    }

    public function getSalt()
    {
        return null;
    }
    
    public function eraseCredentials()
    {
        return null;
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
    }
    
    public function serialize()
    {

    }
    
    public function unserialize($serialized)
    {
    }
}
