<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EvaluationForm
 *
 * @ORM\Table(name="evaluation_form")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationFormRepository")
 */
class EvaluationForm
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
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @var \AppBundle\Entity\Question
     *
     * @ORM\OneToMany(targetEntity="Question", mappedBy="formId", cascade={"persist","remove"})
     */
    private $questions;

    /**
     * @var string
     *
     * @ORM\Column(name="formName", type="string", length=255)
     */
    private $formName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addedAt", type="datetimetz", nullable=true)
     */
    private $addedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiryAt", type="datetimetz", nullable=true)
     */
    private $expiryAt;


    public function __construct()
    {
        $this->questions = new ArrayCollection;
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
     * Set formName
     *
     * @param string $formName
     *
     * @return EvaluationForm
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;

        return $this;
    }

    /**
     * Get formName
     *
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }

    /**
     * Set addedAt
     *
     * @param \DateTime $addedAt
     *
     * @return EvaluationForm
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * Get addedAt
     *
     * @return \DateTime
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * Set expiryAt
     *
     * @param \DateTime $expiryAt
     *
     * @return EvaluationForm
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
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return EvaluationForm
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return EvaluationForm
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
