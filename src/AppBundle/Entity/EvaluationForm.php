<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * EvaluationForm
 *
 * @ORM\Table(name="evaluation_form")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EvaluationFormRepository")
 */
class EvaluationForm
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
     * @ORM\Column(name="attemptAt", type="datetime")
     */
    private $attemptAt;

    /**
     * @var \AppBundle\Entity\Team
     *
     * @ORM\ManyToOne(targetEntity="Team", cascade={"persist"})
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $teamId;

    /**
     * @var \AppBundle\Entity\Person
     *
     * @ORM\ManyToOne(targetEntity="Person", cascade={"persist"})
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $personId;

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
        $this->answers = new ArrayCollection();
        $this->setAttemptAt(new \DateTime());
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
     * Set attemptAt
     *
     * @param \DateTime $attemptAt
     *
     * @return EvaluationForm
     */
    public function setAttemptAt($attemptAt)
    {
        $this->attemptAt = $attemptAt;

        return $this;
    }

    /**
     * Get attemptAt
     *
     * @return \DateTime
     */
    public function getAttemptAt()
    {
        return $this->attemptAt;
    }

    /**
     * Set teamId
     *
     * @param \AppBundle\Entity\Team $teamId
     *
     * @return EvaluationForm
     */
    public function setTeamId(\AppBundle\Entity\Team $teamId = null)
    {
        $this->teamId = $teamId;

        return $this;
    }

    /**
     * Get teamId
     *
     * @return \AppBundle\Entity\Team
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * Set personId
     *
     * @param \AppBundle\Entity\Person $personId
     *
     * @return EvaluationForm
     */
    public function setPersonId(\AppBundle\Entity\Person $personId = null)
    {
        $this->personId = $personId;

        return $this;
    }

    /**
     * Get personId
     *
     * @return \AppBundle\Entity\Person
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\Answer $answer
     *
     * @return EvaluationForm
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