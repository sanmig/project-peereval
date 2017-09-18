<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormAnswer
 *
 * @ORM\Table(name="form_answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormAnswerRepository")
 */
class FormAnswer
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
     * @var \DateTime
     *
     * @ORM\Column(name="attemptAt", type="datetime", nullable=true)
     */
    private $attemptAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=64)
     */
    private $code;


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
     * Set attemptAt
     *
     * @param \DateTime $attemptAt
     *
     * @return FormAnswer
     */
    public function setAttemptAt($attemptAt)
    {
        $this->attemptAt = $attemptAt;

        return $this;
    }

    /**
     * Get attemptAt
     *
     * @return \DateTime
     */
    public function getAttemptAt()
    {
        return $this->attemptAt;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return FormAnswer
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return FormAnswer
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
