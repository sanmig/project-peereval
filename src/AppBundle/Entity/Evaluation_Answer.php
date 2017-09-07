<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation_Form_Answer
 *
 * @ORM\Table(name="evaluation__form__answer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Evaluation_Form_AnswerRepository")
 */
class Evaluation_Form_Answer
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
     * @ORM\Column(name="Evaluation_Answer_No", type="smallint")
     */
    private $evaluationAnswerNo;


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
     * Set evaluationAnswerNo
     *
     * @param integer $evaluationAnswerNo
     *
     * @return Evaluation_Form_Answer
     */
    public function setEvaluationAnswerNo($evaluationAnswerNo)
    {
        $this->evaluationAnswerNo = $evaluationAnswerNo;

        return $this;
    }

    /**
     * Get evaluationAnswerNo
     *
     * @return int
     */
    public function getEvaluationAnswerNo()
    {
        return $this->evaluationAnswerNo;
    }
}

