<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationQuestion
 *
 * @ORM\Table(name="evaluation_question", indexes={@ORM\Index(name="user", columns={"user"}), @ORM\Index(name="form", columns={"form"}), @ORM\Index(name="question", columns={"question"})})
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
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

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
     * @var \AppBundle\Entity\QuestionMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuestionMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question", referencedColumnName="id")
     * })
     */
    private $question;


    public function __construct()
    {
        $this->question = new ArrayCollection;
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
     * Set user
     *
     * @param \AppBundle\Entity\UserMain $user
     *
     * @return EvaluationQuestion
     */
    public function setUser(\AppBundle\Entity\UserMain $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\UserMain
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set form
     *
     * @param \AppBundle\Entity\EvaluationForm $form
     *
     * @return EvaluationQuestion
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
     * Set question
     *
     * @param \AppBundle\Entity\QuestionMain $question
     *
     * @return EvaluationQuestion
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
}
