<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormAnswer
 *
 * @ORM\Table(name="form_answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormAnswerRepository")
 */
class FormAnswer
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
     * @var \AppBundle\Entity\FormQuestion
     *
     * @ORM\OneToOne(targetEntity="FormQuestion")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $formId;

    /**
     * @var \AppBundle\Entity\StudentRegister
     *
     * @ORM\ManyToOne(targetEntity="StudentRegister")
     * @ORM\JoinColumn(name="students_id", referencedColumnName="id")
     */
    private $studentsId;

    /**
     * @var \AppBundle\Entity\Question
     *
     * @ORM\ManyToMany(targetEntity="Question")
     * @ORM\JoinColumn(name="questions_id", referencedColumnName="id")
     */
    private $questionsId;

    /**
     * @var \AppBundle\Entity\Answer
     *
     * @ORM\ManyToMany(targetEntity="Answer", mappedBy="formId", cascade={"persist","remove"})
     */
    private $answers;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questionsId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set formId
     *
     * @param \AppBundle\Entity\FormQuestion $formId
     *
     * @return FormAnswer
     */
    public function setFormId(\AppBundle\Entity\FormQuestion $formId = null)
    {
        $this->formId = $formId;

        return $this;
    }

    /**
     * Get formId
     *
     * @return \AppBundle\Entity\FormQuestion
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * Set studentsId
     *
     * @param \AppBundle\Entity\StudentRegister $studentsId
     *
     * @return FormAnswer
     */
    public function setStudentsId(\AppBundle\Entity\StudentRegister $studentsId = null)
    {
        $this->studentsId = $studentsId;

        return $this;
    }

    /**
     * Get studentsId
     *
     * @return \AppBundle\Entity\StudentRegister
     */
    public function getStudentsId()
    {
        return $this->studentsId;
    }

    /**
     * Add questionsId
     *
     * @param \AppBundle\Entity\Question $questionsId
     *
     * @return FormAnswer
     */
    public function addQuestionsId(\AppBundle\Entity\Question $questionsId)
    {
        $this->questionsId[] = $questionsId;

        return $this;
    }

    /**
     * Remove questionsId
     *
     * @param \AppBundle\Entity\Question $questionsId
     */
    public function removeQuestionsId(\AppBundle\Entity\Question $questionsId)
    {
        $this->questionsId->removeElement($questionsId);
    }

    /**
     * Get questionsId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionsId()
    {
        return $this->questionsId;
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\Answer $answer
     *
     * @return FormAnswer
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
