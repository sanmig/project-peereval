<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EvaluationAnswer
 *
 * @ORM\Table(name="evaluation_answer", indexes={@ORM\Index(name="form", columns={"form"}), @ORM\Index(name="student", columns={"student"}), @ORM\Index(name="question", columns={"question"}), @ORM\Index(name="answer", columns={"answer"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserMainRepository")
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
     *   @ORM\JoinColumn(name="form", referencedColumnName="id")
     * })
     */
    private $form;

    /**
     * @var \AppBundle\Entity\StudentMain
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\StudentMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student", referencedColumnName="id")
     * })
     */
    private $student;

    /**
     * @var \AppBundle\Entity\QuestionMain
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuestionMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * @var \AppBundle\Entity\AnswerMain
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AnswerMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="answer", referencedColumnName="id")
     * })
     */
    private $answer;

    public function __construct()
    {
        $this->question = new ArrayCollection;
        $this->answer = new ArrayCollection;
    }
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
     * Set form
     *
     * @param \AppBundle\Entity\EvaluationForm $form
     *
     * @return EvaluationAnswer
     */
    public function setForm(\AppBundle\Entity\EvaluationForm $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\StudentMain $student
     *
     * @return EvaluationAnswer
     */
    public function setStudent(\AppBundle\Entity\StudentMain $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set question
     *
     * @param \AppBundle\Entity\QuestionMain $question
     *
     * @return EvaluationAnswer
     */
    public function setQuestion(\AppBundle\Entity\QuestionMain $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \AppBundle\Entity\QuestionMain
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param \AppBundle\Entity\AnswerMain $answer
     *
     * @return EvaluationAnswer
     */
    public function setAnswer(\AppBundle\Entity\AnswerMain $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \AppBundle\Entity\AnswerMain
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}
