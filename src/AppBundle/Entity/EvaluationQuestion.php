<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EvaluationQuestion
 *
 * @ORM\Table(name="evaluation_question", indexes={@ORM\Index(name="users", columns={"users"}), @ORM\Index(name="forms", columns={"forms"}), @ORM\Index(name="questions", columns={"questions"})})
 * @ORM\Entity
 */
class EvaluationQuestion
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registerAt", type="datetime", nullable=true)
     */
    private $registerat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\UserMain
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\UserMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users", referencedColumnName="id")
     * })
     */
    private $users;

    /**
     * @var \AppBundle\Entity\EvaluationForm
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\EvaluationForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forms", referencedColumnName="id")
     * })
     */
    private $forms;

    /**
     * @var \AppBundle\Entity\QuestionMain
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuestionMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questions", referencedColumnName="id")
     * })
     */
    private $questions;



    public function __construct()
    {
        $this->questions = new ArrayCollection;
    }

    /**
     * Set registerat
     *
     * @param \DateTime $registerat
     *
     * @return EvaluationQuestion
     */
    public function setRegisterat($registerat)
    {
        $this->registerat = $registerat;

        return $this;
    }

    /**
     * Get registerat
     *
     * @return \DateTime
     */
    public function getRegisterat()
    {
        return $this->registerat;
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
     * Set users
     *
     * @param \AppBundle\Entity\UserMain $users
     *
     * @return EvaluationQuestion
     */
    public function setUsers(\AppBundle\Entity\UserMain $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \AppBundle\Entity\UserMain
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set forms
     *
     * @param \AppBundle\Entity\EvaluationForm $forms
     *
     * @return EvaluationQuestion
     */
    public function setForms(\AppBundle\Entity\EvaluationForm $forms = null)
    {
        $this->forms = $forms;

        return $this;
    }

    /**
     * Get forms
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getForms()
    {
        return $this->forms;
    }

    /**
     * Add questions
     *
     * @param \AppBundle\Entity\QuestionMain $questions
     *
     * @return EvaluationQuestion
     */
    public function addQuestions(\AppBundle\Entity\QuestionMain $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \AppBundle\Entity\QuestionMain $questions
     *
     * @return EvaluationQuestion
     */
    public function removeQuestions(\AppBundle\Entity\QuestionMain $questions)
    {
        if ($this->questions->contains($questions)){
            $this->questions->removeElement($questions);
        }
        return $this;
    }

    /**
     * Get questions
     *
     * @return \AppBundle\Entity\QuestionMain
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
