<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationAnswer
 *
 * @ORM\Table(name="evaluation_answer", indexes={@ORM\Index(name="weltecId", columns={"weltecId"}), @ORM\Index(name="evalId", columns={"evalId"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationAnswerRepository")
 */
class EvaluationAnswer
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
     * @ORM\Column(name="answer", type="smallint", nullable=false)
     */
    private $answer;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Student")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="weltecId", referencedColumnName="id")
     * })
     */
    private $weltecid;

    /**
     * @var \AppBundle\Entity\EvaluationForm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evalId", referencedColumnName="id")
     * })
     */
    private $evalid;

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
     * @return int
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set weltecid
     *
     * @param \AppBundle\Entity\Student $weltecid
     *
     * @return EvaluationAnswer
     */
    public function setWeltecid(\AppBundle\Entity\Student $weltecid = null)
    {
        $this->weltecid = $weltecid;

        return $this;
    }

    /**
     * Get weltecid
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getWeltecid()
    {
        return $this->weltecid;
    }

    /**
     * Set evalid
     *
     * @param \AppBundle\Entity\EvaluationForm $evalid
     *
     * @return EvaluationAnswer
     */
    public function setEvalid(\AppBundle\Entity\EvaluationForm $evalid = null)
    {
        $this->evalid = $evalid;

        return $this;
    }

    /**
     * Get evalid
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getEvalid()
    {
        return $this->evalid;
    }
}

