<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentEvaluate
 *
 * @ORM\Table(name="student_evaluate", indexes={@ORM\Index(name="forms", columns={"forms"}), @ORM\Index(name="students", columns={"students"})})
 * @ORM\Entity
 */
class StudentEvaluate
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
     * @var \AppBundle\Entity\EvaluationForm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="forms", referencedColumnName="id")
     * })
     */
    private $forms;

    /**
     * @var \AppBundle\Entity\StudentMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StudentMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="students", referencedColumnName="id")
     * })
     */
    private $students;



    /**
     * Set registerat
     *
     * @param \DateTime $registerat
     *
     * @return StudentEvaluate
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
     * Set forms
     *
     * @param \AppBundle\Entity\EvaluationForm $forms
     *
     * @return StudentEvaluate
     */
    public function setForms(\AppBundle\Entity\EvaluationForm $forms = null)
    {
        $this->forms = $forms;

        return $this;
    }

    /**
     * Get forms
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getForms()
    {
        return $this->forms;
    }

    /**
     * Set students
     *
     * @param \AppBundle\Entity\StudentMain $students
     *
     * @return StudentEvaluate
     */
    public function setStudents(\AppBundle\Entity\StudentMain $students = null)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getStudents()
    {
        return $this->students;
    }
}
