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
     * @var \AppBundle\Entity\Form
     *
     * @ORM\ManyToOne(targetEntity="Form", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     * })
     */
    private $formId;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\ManyToOne(targetEntity="Student", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="student", referencedColumnName="id")
     */
    private $student;

    /**
     * @var \AppBundle\Entity\Answer
     *
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="formId", cascade={"persist","remove"})
     */
    private $answers;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     */
    private $status = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="attemptAt", type="datetime", nullable=false)
     */
    private $attemptAt;


    
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
     * Set status
     *
     * @param integer $status
     *
     * @return EvaluationForm
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
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
        return $this->attempAt;
    }

    /**
     * Set formId
     *
     * @param \AppBundle\Entity\Form $formId
     *
     * @return EvaluationForm
     */
    public function setFormId(\AppBundle\Entity\Form $formId = null)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return \AppBundle\Entity\Form
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return EvaluationForm
     */
    public function setStudent(\AppBundle\Entity\Student $student = null)
    {
        if ($this->student->contains($student)) {
            return;
        }
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
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
