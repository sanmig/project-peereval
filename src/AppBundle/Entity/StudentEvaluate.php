<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentEvaluate
 *
 * @ORM\Table(name="student_evaluate", indexes={@ORM\Index(name="student", columns={"student"}), @ORM\Index(name="form", columns={"form"})})
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
     * @var \AppBundle\Entity\StudentMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\StudentMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="student", referencedColumnName="id")
     * })
     */
    private $student;

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
     * Set student
     *
     * @param \AppBundle\Entity\StudentMain $student
     *
     * @return StudentEvaluate
     */
    public function setStudent(\AppBundle\Entity\StudentMain $student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set form
     *
     * @param \AppBundle\Entity\EvaluationForm $form
     *
     * @return StudentEvaluate
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
}
