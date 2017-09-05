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
     * @ORM\Column(name="QuestText", type="text")
     */
    private $questText;

    /**
     * @var string
     *
     * @ORM\Column(name="QuestFormat", type="text")
     */
    private $questFormat;


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
     * Set questText
     *
     * @param string $questText
     *
     * @return Question
     */
    public function setQuestText($questText)
    {
        $this->questText = $questText;

        return $this;
    }

    /**
     * Get questText
     *
     * @return string
     */
    public function getQuestText()
    {
        return $this->questText;
    }

    /**
     * Set questFormat
     *
     * @param string $questFormat
     *
     * @return Question
     */
    public function setQuestFormat($questFormat)
    {
        $this->questFormat = $questFormat;

        return $this;
    }

    /**
     * Get questFormat
     *
     * @return string
     */
    public function getQuestFormat()
    {
        return $this->questFormat;
    }
}

