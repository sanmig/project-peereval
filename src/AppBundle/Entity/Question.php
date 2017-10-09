<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="question", type="text")
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="TemplateForm", inversedBy="questions", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="template_form_id", referencedColumnName="id")
     */
    private $templateFormId;


    

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
     * Set question
     *
     * @param string $question
     *
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set templateFormId
     *
     * @param \AppBundle\Entity\TemplateForm $templateFormId
     *
     * @return Question
     */
    public function setTemplateFormId(\AppBundle\Entity\TemplateForm $templateFormId = null)
    {
        $this->templateFormId = $templateFormId;

        return $this;
    }

    /**
     * Get templateFormId
     *
     * @return \AppBundle\Entity\TemplateForm
     */
    public function getTemplateFormId()
    {
        return $this->templateFormId;
    }
}
