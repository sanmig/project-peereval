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
     * @var \DateTime
     *
     * @ORM\Column(name="expiryAt", type="datetimetz", nullable=true)
     */
    private $expiryAt;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="RegisterStudent", inversedBy="students")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;


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
     * @return int
     */
    public function getWeltecId()
    {
        return $this->weltecId;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Student
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
     * @return Student
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
     * Set expiryAt
     *
     * @param \DateTime $expiryAt
     *
     * @return Student
     */
    public function setExpiryAt($expiryAt)
    {
        $this->expiryAt = $expiryAt;

        return $this;
    }

    /**
     * Get expiryAt
     *
     * @return \DateTime
     */
    public function getExpiryAt()
    {
        return $this->expiryAt;
    }

    /**
     * Set formId
     *
     * @param \AppBundle\Entity\RegisterStudent $formId
     *
     * @return Student
     */
    public function setFormId(\AppBundle\Entity\RegisterStudent $formId = null)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return \AppBundle\Entity\RegisterStudent
     */
    public function getFormId()
    {
        return $this->formId;
    }
}
