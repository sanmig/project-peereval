<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionMain
 *
 * @ORM\Table(name="question_main")
 * @ORM\Entity
 */
class QuestionMain
{
    /**
     * @var string
     *
     * @ORM\Column(name="questionText", type="text", length=65535, nullable=false)
     */
    private $questiontext;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set questiontext
     *
     * @param string $questiontext
     *
     * @return QuestionMain
     */
    public function setQuestiontext($questiontext)
    {
        $this->questiontext = $questiontext;

        return $this;
    }

    /**
     * Get questiontext
     *
     * @return string
     */
    public function getQuestiontext()
    {
        return $this->questiontext;
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
     * tostring
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->questiontext;
    }
}
