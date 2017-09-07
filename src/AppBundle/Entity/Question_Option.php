<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question_Option
 *
 * @ORM\Table(name="question__option")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Question_OptionRepository")
 */
class Question_Option
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
     * @var int
     *
     * @ORM\Column(name="Option_Choice", type="smallint")
     */
    private $optionChoice;


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
     * Set optionChoice
     *
     * @param integer $optionChoice
     *
     * @return Question_Option
     */
    public function setOptionChoice($optionChoice)
    {
        $this->optionChoice = $optionChoice;

        return $this;
    }

    /**
     * Get optionChoice
     *
     * @return int
     */
    public function getOptionChoice()
    {
        return $this->optionChoice;
    }
}

