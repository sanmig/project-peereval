<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FormQuestion
 *
 * @ORM\Table(name="form_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormQuestionRepository")
 */
class FormQuestion
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
     * @var \AppBundle\Entity\Question
     *
     * @ORM\OneToMany(targetEntity="Question", mappedBy="formId", cascade={"persist","remove"})
     */
    private $questions;


    public function __construct()
    {
        $this->questions = new ArrayCollection;
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
     * Set questions
     *
     * @param \AppBundle\Entity\Question $questions
     *
     * @return FormQuestion
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add questions
     *
     * @param \AppBundle\Entity\Question $questions
     *
     * @return FormQuestion
     */
    public function addQuestions($questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    public function removeQuestions($questions)
    {
        return $this->questions->removeElement($question);
    }
}

