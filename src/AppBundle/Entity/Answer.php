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
     * @ORM\Column(name="answer", type="smallint")
     */
    private $answer;

    /**
     * @var \AppBundle\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Person", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $personId;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="EvaluationForm", inversedBy="answers", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;

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
     * @return integer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set personId
     *
     * @param \AppBundle\Entity\Person $personId
     *
     * @return Answer
     */
    public function setPersonId(\AppBundle\Entity\Person $personId = null)
    {
        $this->personId = $personId;

        return $this;
    }

    /**
     * Get personId
     *
     * @return \AppBundle\Entity\Person
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Set formId
     *
     * @param \AppBundle\Entity\EvaluationForm $formId
     *
     * @return Answer
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