<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerRepository")
 */
class Answer
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
     * @ORM\OneToOne(targetEntity="Question")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     */
    private $questionId;

    /**
     * @var int
     *
     * @ORM\Column(name="answer", type="integer")
     */
    private $answer;


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
     * Set answer
     *
     * @param integer $answer
     *
     * @return Answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return int
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set formId
     *
     * @param \AppBundle\Entity\FormAnswer $formId
     *
     * @return Answer
     */
    public function setFormId(\AppBundle\Entity\FormAnswer $formId = null)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return \AppBundle\Entity\FormAnswer
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * Set studentId
     *
     * @param \AppBundle\Entity\Student $studentId
     *
     * @return Answer
     */
    public function setStudentId(\AppBundle\Entity\Student $studentId = null)
    {
        $this->studentId = $studentId;

        return $this;
    }

    /**
     * Get studentId
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set questionId
     *
     * @param \AppBundle\Entity\Question $questionId
     *
     * @return Answer
     */
    public function setQuestionId(\AppBundle\Entity\Question $questionId = null)
    {
        $this->questionId = $questionId;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }
}
