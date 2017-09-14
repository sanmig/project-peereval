<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StudentMain
 *
 * @ORM\Table(name="student_main", uniqueConstraints={@ORM\UniqueConstraint(name="weltecId", columns={"weltecId"})})
 * @ORM\Entity
 */
class StudentMain
{
    /**
     * @var integer
     *
     * @ORM\Column(name="weltecId", type="bigint", nullable=false)
     */
    private $weltecid;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=20, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=20, nullable=false)
     */
    private $lastname;

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
     * Set weltecid
     *
     * @param integer $weltecid
     *
     * @return StudentMain
     */
    public function setWeltecid($weltecid)
    {
        $this->weltecid = $weltecid;

        return $this;
    }

    /**
     * Get weltecid
     *
     * @return integer
     */
    public function getWeltecid()
    {
        return $this->weltecid;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return StudentMain
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return StudentMain
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set expiryat
     *
     * @param \DateTime $expiryat
     *
     * @return StudentMain
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
}
