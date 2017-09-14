<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentEvaluate
 *
 * @ORM\Table(name="student_evaluate", indexes={@ORM\Index(name="studentId", columns={"studentId"}), @ORM\Index(name="formId", columns={"formId"})})
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
     *   @ORM\JoinColumn(name="studentId", referencedColumnName="id")
     * })
     */
    private $studentid;

    /**
     * @var \AppBundle\Entity\EvaluationForm
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\EvaluationForm")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="formId", referencedColumnName="id")
     * })
     */
    private $formid;



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
     * Set studentid
     *
     * @param \AppBundle\Entity\StudentMain $studentid
     *
     * @return StudentEvaluate
     */
    public function setStudentid(\AppBundle\Entity\StudentMain $studentid = null)
    {
        $this->studentid = $studentid;

        return $this;
    }

    /**
     * Get studentid
     *
     * @return \AppBundle\Entity\StudentMain
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * Set formid
     *
     * @param \AppBundle\Entity\EvaluationForm $formid
     *
     * @return StudentEvaluate
     */
    public function setFormid(\AppBundle\Entity\EvaluationForm $formid = null)
    {
        $this->formid = $formid;

        return $this;
    }

    /**
     * Get formid
     *
     * @return \AppBundle\Entity\EvaluationForm
     */
    public function getFormid()
    {
        return $this->formid;
    }
}
