<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\ManyToOne(targetEntity="FormQuestion", inversedBy="questions", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="question_text", type="text")
     */
    private $questionText;


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
     * Set formId
     *
     * @param integer $formId
     *
     * @return Question
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return int
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * Set questionText
     *
     * @param string $questionText
     *
     * @return Question
     */
    public function setQuestionText($questionText)
    {
        $this->questionText = $questionText;

        return $this;
    }

    /**
     * Get questionText
     *
     * @return string
     */
    public function getQuestionText()
    {
        return $this->questionText;
    }

    /**
     * Set answerId
     *
     * @param \AppBundle\Entity\Answer $answerId
     *
     * @return Question
     */
    public function setAnswerId(\AppBundle\Entity\Answer $answerId = null)
    {
        $this->answerId = $answerId;

        return $this;
    }

    /**
     * Get answerId
     *
     * @return \AppBundle\Entity\Answer
     */
    public function getAnswerId()
    {
        return $this->answerId;
    }

    /**
     * Set answer
     *
     * @param \AppBundle\Entity\Answer $answer
     *
     * @return Question
     */
    public function setAnswer(\AppBundle\Entity\Answer $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \AppBundle\Entity\Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}
