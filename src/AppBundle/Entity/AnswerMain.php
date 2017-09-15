<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnswerMain
 *
 * @ORM\Table(name="answer_main")
 * @ORM\Entity
 */
class AnswerMain
{
    /**
     * @var integer
     *
     * @ORM\Column(name="answer", type="smallint", nullable=false)
     */
    private $answer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set answer
     *
     * @param integer $answer
     *
     * @return AnswerMain
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return integer
     */
    public function getAnswer()
    {
        return $this->answer;
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
