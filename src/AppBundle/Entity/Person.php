<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
 */
class Person
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="uniqueCode", type="string", length=255, nullable=false)
     */
    private $uniqueCode;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerAt", type="datetime")
     */
    private $registerAt;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="people", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $teamId;


    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->registerAt = new \DateTime();
        $this->setUniqueCode($this->generateUniqueCode());
        $this->setToken($this->generateToken());
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Person
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
     * Set uniqueCode
     *
     * @param string $uniqueCode
     *
     * @return Person
     */
    public function setUniqueCode($uniqueCode)
    {
        $this->uniqueCode = $uniqueCode;

        return $this;
    }

    /**
     * Get uniqueCode
     *
     * @return string
     */
    public function getUniqueCode()
    {
        return $this->uniqueCode;
    }

    /**
     * Generate uniqueCode
     *
     * @return string
     */
    public function generateUniqueCode()
    {
        return mt_rand(10000,99999);
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Person
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Generate token
     *
     * @return string
     */
    public function generateToken()
    {
        return md5(uniqid(rand(),true));
    }

    /**
     * Set registerAt
     *
     * @param \DateTime $registerAt
     *
     * @return Person
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

    /**
     * Set teamId
     *
     * @param \AppBundle\Entity\Team $teamId
     *
     * @return Person
     */
    public function setTeamId(\AppBundle\Entity\Team $teamId = null)
    {
        $this->teamId = $teamId;

        return $this;
    }

    /**
     * Get teamId
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeamId()
    {
        return $this->teamId;
    }
}
