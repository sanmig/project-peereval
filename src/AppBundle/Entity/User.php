<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=20, unique=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=30)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=30)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var bool
     *
     * @ORM\Column(name="isVerified", type="boolean")
     */
    private $isVerified = false;

    /**
     * @var string
     *
     * @ORM\Column(name="verifyCode", type="string", length=255, nullable=true)
     */
    private $verifyCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerAt", type="datetime", nullable=true)
     */
    private $registerAt;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\OneToMany(targetEntity="FormQuestion", mappedBy="userId", cascade={"persist"})
     */
    private $forms;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get roles
     *
     * @return string
     */
    public function getRoles()
    {
        return [$this->getRole()];
    }

    /**
     * Set isVerified
     *
     * @param boolean $isVerified
     *
     * @return User
     */
    public function setIsVerified($isVerified)
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * Get isVerified
     *
     * @return bool
     */
    public function getIsVerified()
    {
        return $this->isVerified;
    }

    /**
     * Set verifyCode
     *
     * @param string $verifyCode
     *
     * @return User
     */
    public function setVerifyCode($verifyCode)
    {
        $this->verifyCode = $verifyCode;

        return $this;
    }

    /**
     * Get verifyCode
     *
     * @return string
     */
    public function getVerifyCode()
    {
        return $this->verifyCode;
    }

    /**
     * Set registerAt
     *
     * @param \DateTime $registerAt
     *
     * @return User
     */
    public function setRegisterAt($registerAt)
    {
        $this->registerAt = $registerAt;

        return $this;
    }

    /**
     * Get registerAt
     *
     * @return \DateTime
     */
    public function getRegisterAt()
    {
        return $this->registerAt;
    }

    public function getSalt()
    {
        return null;
    }
    
    public function eraseCredentials()
    {
        return null;
    }
    
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }
    
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->forms = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add form
     *
     * @param \AppBundle\Entity\FormQuestion $form
     *
     * @return User
     */
    public function addForm(\AppBundle\Entity\FormQuestion $form)
    {
        $this->forms[] = $form;

        return $this;
    }

    /**
     * Remove form
     *
     * @param \AppBundle\Entity\FormQuestion $form
     */
    public function removeForm(\AppBundle\Entity\FormQuestion $form)
    {
        $this->forms->removeElement($form);
    }

    /**
     * Get forms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getForms()
    {
        return $this->forms;
    }
}