<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RegisterStudent
 *
 * @ORM\Table(name="register_student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegisterStudentRepository")
 */
class RegisterStudent
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
     * @ORM\Column(name="registerAt", type="datetime", nullable=true)
     */
    private $registerAt;

    /**
     * @var \AppBundle\Entity\Student
     *
     * @ORM\OneToMany(targetEntity="Student", mappedBy="formId", cascade={"persist","remove"})
     */
    private $students;

    /**
     * @var \AppBundle\Entity\Form
     *
     * @ORM\OneToOne(targetEntity="Form")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $form;


    public function __construct()
    {
        $this->students = new ArrayCollection;
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
     * Set registerAt
     *
     * @param \DateTime $registerAt
     *
     * @return RegisterStudent
     */
    public function setRegisterAt($registerAt)
    {
        $this->registerAt = $registerAt;

        return $this;
    }

    /**
     * Get registerAt
     *
     * @return \DateTime
     */
    public function getRegisterAt()
    {
        return $this->registerAt;
    }

    /**
     * Add student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return RegisterStudent
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
     * Set form
     *
     * @param \AppBundle\Entity\Form $form
     *
     * @return RegisterStudent
     */
    public function setForm(\AppBundle\Entity\Form $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \AppBundle\Entity\Form
     */
    public function getForm()
    {
        return $this->form;
    }
}
