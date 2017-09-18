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

    /**
     * @var \AppBundle\Entity\Form
     *
     * @ORM\OneToOne(targetEntity="Form")
     * @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     */
    private $form;


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
     * Get questions
     *
     * @return \AppBundle\Entity\Question
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return FormQuestion
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions[] = $question;
        $question->setFormId($this->getForm());

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Set form
     *
     * @param \AppBundle\Entity\Form $form
     *
     * @return FormQuestion
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