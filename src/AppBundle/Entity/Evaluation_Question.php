<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation_Question
 *
 * @ORM\Table(name="evaluation__question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Evaluation_QuestionRepository")
 */
class Evaluation_Question
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
     * @ORM\Column(name="Evaluation_Question_Type", type="string", length=255)
     */
    private $evaluationQuestionType;


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
     * Set evaluationQuestionType
     *
     * @param string $evaluationQuestionType
     *
     * @return Evaluation_Question
     */
    public function setEvaluationQuestionType($evaluationQuestionType)
    {
        $this->evaluationQuestionType = $evaluationQuestionType;

        return $this;
    }

    /**
     * Get evaluationQuestionType
     *
     * @return string
     */
    public function getEvaluationQuestionType()
    {
        return $this->evaluationQuestionType;
    }
}

