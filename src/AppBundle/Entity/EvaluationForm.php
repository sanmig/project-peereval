<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EvaluationForm
 *
 * @ORM\Table(name="evaluation_form", indexes={@ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class EvaluationForm
{
    /**
     * @var string
     *
     * @ORM\Column(name="courseName", type="string", length=255, nullable=false)
     */
    private $coursename;

    /**
     * @var string
     *
     * @ORM\Column(name="courseCode", type="string", length=20, nullable=false)
     */
    private $coursecode;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiryAt", type="datetime", nullable=true)
     */
    private $expiryat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\UserMain
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserMain")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Set coursename
     *
     * @param string $coursename
     *
     * @return EvaluationForm
     */
    public function setCoursename($coursename)
    {
        $this->coursename = $coursename;

        return $this;
    }

    /**
     * Get coursename
     *
     * @return string
     */
    public function getCoursename()
    {
        return $this->coursename;
    }

    /**
     * Set coursecode
     *
     * @param string $coursecode
     *
     * @return EvaluationForm
     */
    public function setCoursecode($coursecode)
    {
        $this->coursecode = $coursecode;

        return $this;
    }

    /**
     * Get coursecode
     *
     * @return string
     */
    public function getCoursecode()
    {
        return $this->coursecode;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return EvaluationForm
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     *
     * @return EvaluationForm
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set expiryat
     *
     * @param \DateTime $expiryat
     *
     * @return EvaluationForm
     */
    public function setExpiryat($expiryat)
    {
        $this->expiryat = $expiryat;

        return $this;
    }

    /**
     * Get expiryat
     *
     * @return \DateTime
     */
    public function getExpiryat()
    {
        return $this->expiryat;
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
     * Set user
     *
     * @param \AppBundle\Entity\UserMain $user
     *
     * @return EvaluationForm
     */
    public function setUser(\AppBundle\Entity\UserMain $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\UserMain
     */
    public function getUser()
    {
        return $this->user;
    }
}
