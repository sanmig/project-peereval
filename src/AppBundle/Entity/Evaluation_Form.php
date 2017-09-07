<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation_Form
 *
 * @ORM\Table(name="evaluation__form")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Evaluation_FormRepository")
 */
class Evaluation_Form
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

