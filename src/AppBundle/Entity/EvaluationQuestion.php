<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationQuestion
 *
 * @ORM\Table(name="evaluation_question", indexes={@ORM\Index(name="tutorId", columns={"tutorId"}), @ORM\Index(name="questId", columns={"questId"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationQuestionRepository")
 */
class EvaluationQuestion
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
     * Get id
     *
     * @return int
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
}

