<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationAnswer
 *
 * @ORM\Table(name="evaluation_answer", indexes={@ORM\Index(name="forms", columns={"forms"}), @ORM\Index(name="students", columns={"students"}), @ORM\Index(name="questions", columns={"questions"}), @ORM\Index(name="answers", columns={"answers"})})
 * @ORM\Entity
 */
class EvaluationAnswer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="formCode", type="string", length=255, nullable=true)
     */
    private $formcode;

    /**
     * @var string
     *
     * @ORM\Column(name="feedback", type="text", length=65535, nullable=true)
     */
    private $feedback;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="attemptAt", type="datetime", nullable=true)
     */
    private $attemptat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\EvaluationForm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forms", referencedColumnName="id")
     * })
     */
    private $forms;

    /**
     * @var \AppBundle\Entity\StudentMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StudentMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="students", referencedColumnName="id")
     * })
     */
    private $students;

    /**
     * @var \AppBundle\Entity\QuestionMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuestionMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questions", referencedColumnName="id")
     * })
     */
    private $questions;

    /**
     * @var \AppBundle\Entity\AnswerMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AnswerMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="answers", referencedColumnName="id")
     * })
     */
    private $answers;



    /**
     * Set status
     *
     * @param integer $status
     *
     * @return EvaluationAnswer
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set formcode
     *
     * @param string $formcode
     *
     * @return EvaluationAnswer
     */
    public function setFormcode($formcode)
    {
        $this->formcode = $formcode;

        return $this;
    }

    /**
     * Get formcode
     *
     * @return string
     */
    public function getFormcode()
    {
        return $this->formcode;
    }

    /**
     * Set feedback
     *
     * @param string $feedback
     *
     * @return EvaluationAnswer
     */
    public function setFeedback($feedback)
    {
        $this->feedback = $feedback;

        return $this;
    }

    /**
     * Get feedback
     *
     * @return string
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * Set attemptat
     *
     * @param \DateTime $attemptat
     *
     * @return EvaluationAnswer
     */
    public function setAttemptat($attemptat)
    {
        $this->attemptat = $attemptat;

        return $this;
    }

    /**
     * Get attemptat
     *
     * @return \DateTime
     */
    public function getAttemptat()
    {
        return $this->attemptat;
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
     * Set forms
     *
     * @param \AppBundle\Entity\EvaluationForm $forms
     *
     * @return EvaluationAnswer
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
     * Set students
     *
     * @param \AppBundle\Entity\StudentMain $students
     *
     * @return EvaluationAnswer
     */
    public function setStudents(\AppBundle\Entity\StudentMain $students = null)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set questions
     *
     * @param \AppBundle\Entity\QuestionMain $questions
     *
     * @return EvaluationAnswer
     */
    public function setQuestions(\AppBundle\Entity\QuestionMain $questions = null)
    {
        $this->questions = $questions;

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

    /**
     * Set answers
     *
     * @param \AppBundle\Entity\AnswerMain $answers
     *
     * @return EvaluationAnswer
     */
    public function setAnswers(\AppBundle\Entity\AnswerMain $answers = null)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return \AppBundle\Entity\AnswerMain
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
