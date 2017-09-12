<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationReview
 *
 * @ORM\Table(name="evaluation_review", indexes={@ORM\Index(name="evalForm", columns={"evalForm"}), @ORM\Index(name="evalQuestion", columns={"evalQuestion"}), @ORM\Index(name="evalAnswer", columns={"evalAnswer"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationReviewRepository")
 */
class EvaluationReview
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
     * @var \AppBundle\Entity\EvaluationForm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evalForm", referencedColumnName="id")
     * })
     */
    private $evalform;

    /**
     * @var \AppBundle\Entity\EvaluationQuestion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationQuestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evalQuestion", referencedColumnName="id")
     * })
     */
    private $evalquestion;

    /**
     * @var \AppBundle\Entity\EvaluationAnswer
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationAnswer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evalAnswer", referencedColumnName="id")
     * })
     */
    private $evalanswer;

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
     * Set evalform
     *
     * @param \AppBundle\Entity\EvaluationForm $evalform
     *
     * @return EvaluationReview
     */
    public function setEvalform(\AppBundle\Entity\EvaluationForm $evalform = null)
    {
        $this->evalform = $evalform;

        return $this;
    }

    /**
     * Get evalform
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getEvalform()
    {
        return $this->evalform;
    }

    /**
     * Set evalquestion
     *
     * @param \AppBundle\Entity\EvaluationQuestion $evalquestion
     *
     * @return EvaluationReview
     */
    public function setEvalquestion(\AppBundle\Entity\EvaluationQuestion $evalquestion = null)
    {
        $this->evalquestion = $evalquestion;

        return $this;
    }

    /**
     * Get evalquestion
     *
     * @return \AppBundle\Entity\EvaluationQuestion
     */
    public function getEvalquestion()
    {
        return $this->evalquestion;
    }

    /**
     * Set evalanswer
     *
     * @param \AppBundle\Entity\EvaluationAnswer $evalanswer
     *
     * @return EvaluationReview
     */
    public function setEvalanswer(\AppBundle\Entity\EvaluationAnswer $evalanswer = null)
    {
        $this->evalanswer = $evalanswer;

        return $this;
    }

    /**
     * Get evalanswer
     *
     * @return \AppBundle\Entity\EvaluationAnswer
     */
    public function getEvalanswer()
    {
        return $this->evalanswer;
    }
}

