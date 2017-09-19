<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \AppBundle\Entity\Student
     *
     * @ORM\OneToMany(targetEntity="Student", mappedBy="formId", cascade={"persist","remove"})
     */
    private $students;

    /**
     * @var \AppBundle\Entity\FormQuestion
     *
     * @ORM\OneToOne(targetEntity="FormQuestion")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $form;


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
     * Set students
     *
     * @param \stdClass $students
     *
     * @return RegisterStudent
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    /**
     * Get students
     *
     * @return \stdClass
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set form
     *
     * @param \stdClass $form
     *
     * @return RegisterStudent
     */
    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return \stdClass
     */
    public function getForm()
    {
        return $this->form;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->students = new \Doctrine\Common\Collections\ArrayCollection();
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
}
