<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationForm
 *
 * @ORM\Table(name="evaluation_form", indexes={@ORM\Index(name="evalQuestion", columns={"evalQuestion"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationFormRepository")
 */
class EvaluationForm
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
     * @var \AppBundle\Entity\EvaluationQuestion
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationQuestion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="evalQuestion", referencedColumnName="id")
     * })
     */
    private $evalquestion;

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
     * Set evalquestion
     *
     * @param \AppBundle\Entity\EvaluationQuestion $evalquestion
     *
     * @return EvaluationForm
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
}

