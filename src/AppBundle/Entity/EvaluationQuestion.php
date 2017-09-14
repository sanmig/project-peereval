<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationQuestion
 *
 * @ORM\Table(name="evaluation_question", indexes={@ORM\Index(name="tutorId", columns={"tutorId"}), @ORM\Index(name="questId", columns={"questId"}), @ORM\Index(name="formId", columns={"formId"})})
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tutorId", referencedColumnName="id")
     * })
     */
    private $tutorid;

    /**
     * @var \AppBundle\Entity\QuestionMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuestionMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questId", referencedColumnName="id")
     * })
     */
    private $questid;

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
     * Set tutorid
     *
     * @param \AppBundle\Entity\UserMain $tutorid
     *
     * @return EvaluationQuestion
     */
    public function setTutorid(\AppBundle\Entity\UserMain $tutorid = null)
    {
        $this->tutorid = $tutorid;

        return $this;
    }

    /**
     * Get tutorid
     *
     * @return \AppBundle\Entity\UserMain
     */
    public function getTutorid()
    {
        return $this->tutorid;
    }

    /**
     * Set questid
     *
     * @param \AppBundle\Entity\QuestionMain $questid
     *
     * @return EvaluationQuestion
     */
    public function setQuestid(\AppBundle\Entity\QuestionMain $questid = null)
    {
        $this->questid = $questid;

        return $this;
    }

    /**
     * Get questid
     *
     * @return \AppBundle\Entity\QuestionMain
     */
    public function getQuestid()
    {
        return $this->questid;
    }

    /**
     * Set formid
     *
     * @param \AppBundle\Entity\EvaluationForm $formid
     *
     * @return EvaluationQuestion
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
}
