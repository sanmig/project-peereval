<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FormAnswer
 *
 * @ORM\Table(name="form_answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormAnswerRepository")
 */
class FormAnswer
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
     * @ORM\ManyToOne(targetEntity="EvaluationForm", cascade={"persist"})
     * @ORM\JoinColumn(name="form", referencedColumnName="id")
     */
    private $form;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set form
     *
     * @param \AppBundle\Entity\EvaluationForm $form
     *
     * @return FormAnswer
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
     * Set student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return FormAnswer
     */
    public function setStudent(\AppBundle\Entity\Student $student = null)
    {
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
     * @return FormAnswer
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
