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
     * @ORM\OneToOne(targetEntity="EvaluationForm")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\OneToMany(targetEntity="Student", mappedBy="formId", cascade={"persist","remove"})
     */
    private $students;

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
        $this->students = new ArrayCollection();
        $this->answers = new ArrayCollection();
    }

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
     * Set formId
     *
     * @param \AppBundle\Entity\EvaluationForm $formId
     *
     * @return FormAnswer
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

    /**
     * Add student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return FormAnswer
     */
    public function addStudent(\AppBundle\Entity\Student $student)
    {
        $this->students[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \AppBundle\Entity\Student $student
     */
    public function removeStudent(\AppBundle\Entity\Student $student)
    {
        $this->students->removeElement($student);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudents()
    {
        return $this->students;
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
