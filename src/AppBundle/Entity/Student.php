<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\StudentRepository")
 */
class Student
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
     * @var string
     *
     * @ORM\Column(name="Student_FN", type="string", length=20)
     */
    private $studentFN;

    /**
     * @var string
     *
     * @ORM\Column(name="Student_LN", type="string", length=255)
     */
    private $studentLN;

    /**
     * @var string
     *
     * @ORM\Column(name="School_ID", type="string", length=255, unique=true)
     */
    private $schoolID;


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
     * Set studentFN
     *
     * @param string $studentFN
     *
     * @return Student
     */
    public function setStudentFN($studentFN)
    {
        $this->studentFN = $studentFN;

        return $this;
    }

    /**
     * Get studentFN
     *
     * @return string
     */
    public function getStudentFN()
    {
        return $this->studentFN;
    }

    /**
     * Set studentLN
     *
     * @param string $studentLN
     *
     * @return Student
     */
    public function setStudentLN($studentLN)
    {
        $this->studentLN = $studentLN;

        return $this;
    }

    /**
     * Get studentLN
     *
     * @return string
     */
    public function getStudentLN()
    {
        return $this->studentLN;
    }

    /**
     * Set schoolID
     *
     * @param string $schoolID
     *
     * @return Student
     */
    public function setSchoolID($schoolID)
    {
        $this->schoolID = $schoolID;

        return $this;
    }

    /**
     * Get schoolID
     *
     * @return string
     */
    public function getSchoolID()
    {
        return $this->schoolID;
    }
}

