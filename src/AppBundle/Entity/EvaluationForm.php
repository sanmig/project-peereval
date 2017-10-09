<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EvaluationForm
 *
 * @ORM\Table(name="evaluation_form")
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
     * @var \DateTime
     *
     * @ORM\Column(name="attemptAt", type="datetime")
     */
    private $attemptAt;

    /**
     * @var \AppBundle\Entity\Answer
     *
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="formId", cascade={"persist","remove"})
     */
    private $answers;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new ArrayCollection();
        $this->setAttemptAt(new \DateTime());
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
     * Set attemptAt
     *
     * @param \DateTime $attemptAt
     *
     * @return EvaluationForm
     */
    public function setAttemptAt($attemptAt)
    {
        $this->attemptAt = $attemptAt;

        return $this;
    }

    /**
     * Get attemptAt
     *
     * @return \DateTime
     */
    public function getAttemptAt()
    {
        return $this->attemptAt;
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\Answer $answer
     *
     * @return EvaluationForm
     */
    public function addAnswer(\AppBundle\Entity\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \AppBundle\Entity\Answer $answer
     */
    public function removeAnswer(\AppBundle\Entity\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
