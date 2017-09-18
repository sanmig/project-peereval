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
     * @ORM\Column(name="answer", type="integer")
     */
    private $answer;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="FormAnswer", inversedBy="questions", cascade={"persist"})
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
}