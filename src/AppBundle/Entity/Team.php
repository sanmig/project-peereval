<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Form
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 */
class Team
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="addedAt", type="datetime")
     */
    private $addedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiryAt", type="datetime")
     */
    private $expiryAt;

    /**
     * @var \AppBundle\Entity\Person
     *
     * @ORM\OneToMany(targetEntity="Person", mappedBy="teamId", cascade={"persist","remove"})
     */
    private $people;

    /**
     * @var \AppBundle\Entity\Form
     *
     * @ORM\ManyToOne(targetEntity="Form", cascade={"persist"})
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;



    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->people = new ArrayCollection();
        $this->setAddedAt(new \DateTime());
        $this->setExpiryAt(new \DateTime());
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
     * Set name
     *
     * @param string $name
     *
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set addedAt
     *
     * @param \DateTime $addedAt
     *
     * @return Team
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * Get addedAt
     *
     * @return \DateTime
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * Set expiryAt
     *
     * @param \DateTime $expiryAt
     *
     * @return Team
     */
    public function setExpiryAt($expiryAt)
    {
        $expiryAt->add(new \DateInterval('P1W'));
        $this->expiryAt = $expiryAt;

        return $this;
    }

    /**
     * Get expiryAt
     *
     * @return \DateTime
     */
    public function getExpiryAt()
    {
        return $this->expiryAt;
    }

    /**
     * Add person
     *
     * @param \AppBundle\Entity\Person $person
     *
     * @return Team
     */
    public function addPerson(\AppBundle\Entity\Person $person)
    {
        $this->people[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \AppBundle\Entity\Person $person
     */
    public function removePerson(\AppBundle\Entity\Person $person)
    {
        $this->people->removeElement($person);
    }

    /**
     * Get people
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeople()
    {
        return $this->people;
    }

    /**
     * Set formId
     *
     * @param \AppBundle\Entity\Form $formId
     *
     * @return Team
     */
    public function setFormId(\AppBundle\Entity\Form $formId = null)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return \AppBundle\Entity\Form
     */
    public function getFormId()
    {
        return $this->formId;
    }
}