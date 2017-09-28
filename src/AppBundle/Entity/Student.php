<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
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
     * @var int
     *
     * @ORM\Column(name="weltecId", type="integer")
     */
    private $weltecId;

    /**
     * @var string
     *
     * @ORM\Column(name="fullName", type="string", length=255)
     */
    private $fullName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerAt", type="datetime", nullable=true)
     */
    private $registerAt;


    public function __construct()
    {
        $this->setregisterAt(new \DateTime());
    }

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
     * Set weltecId
     *
     * @param integer $weltecId
     *
     * @return Student
     */
    public function setWeltecId($weltecId)
    {
        $this->weltecId = $weltecId;

        return $this;
    }

    /**
     * Get weltecId
     *
     * @return integer
     */
    public function getWeltecId()
    {
        return $this->weltecId;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     *
     * @return Student
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set registerAt
     *
     * @param \DateTime $registerAt
     *
     * @return Student
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
}
