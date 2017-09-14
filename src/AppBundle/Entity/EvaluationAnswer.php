<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationAnswer
 *
 * @ORM\Table(name="evaluation_answer", indexes={@ORM\Index(name="formId", columns={"formId"}), @ORM\Index(name="studentId", columns={"studentId"}), @ORM\Index(name="questionId", columns={"questionId"})})
 * @ORM\Entity
 */
class EvaluationAnswer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="answer", type="smallint", nullable=false)
     */
    private $answer;

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
     *   @ORM\JoinColumn(name="formId", referencedColumnName="id")
     * })
     */
    private $formid;

    /**
     * @var \AppBundle\Entity\StudentMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StudentMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="studentId", referencedColumnName="id")
     * })
     */
    private $studentid;

    /**
     * @var \AppBundle\Entity\QuestionMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuestionMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questionId", referencedColumnName="id")
     * })
     */
    private $questionid;



    /**
     * Set answer
     *
     * @param integer $answer
     *
     * @return EvaluationAnswer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return integer
     */
    public function getAnswer()
    {
        return $this->answer;
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
     * Set formid
     *
     * @param \AppBundle\Entity\EvaluationForm $formid
     *
     * @return EvaluationAnswer
     */
    public function setFormid(\AppBundle\Entity\EvaluationForm $formid = null)
    {
        $this->formid = $formid;

        return $this;
    }

    /**
     * Get formid
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getFormid()
    {
        return $this->formid;
    }

    /**
     * Set studentid
     *
     * @param \AppBundle\Entity\StudentMain $studentid
     *
     * @return EvaluationAnswer
     */
    public function setStudentid(\AppBundle\Entity\StudentMain $studentid = null)
    {
        $this->studentid = $studentid;

        return $this;
    }

    /**
     * Get studentid
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * Set questionid
     *
     * @param \AppBundle\Entity\QuestionMain $questionid
     *
     * @return EvaluationAnswer
     */
    public function setQuestionid(\AppBundle\Entity\QuestionMain $questionid = null)
    {
        $this->questionid = $questionid;

        return $this;
    }

    /**
     * Get questionid
     *
     * @return \AppBundle\Entity\QuestionMain
     */
    public function getQuestionid()
    {
        return $this->questionid;
    }
}
