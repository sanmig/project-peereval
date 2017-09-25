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
     * @ORM\ManyToOne(targetEntity="EvaluationForm", inversedBy="students", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;

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
     * @ORM\Column(name="registerAt", type="datetimetz", nullable=true)
     */
    private $registerAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiryAt", type="datetimetz", nullable=true)
     */
    private $expiryAt;


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
     * @param \AppBundle\Entity\EvaluationForm $formId
     *
     * @return Student
     */
    public function setFormId(\AppBundle\Entity\EvaluationForm $formId = null)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getFormId()
    {
        return $this->formId;
    }
}
