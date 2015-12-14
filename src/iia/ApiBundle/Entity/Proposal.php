<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proposal
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\ProposalRepository")
 */
class Proposal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isAnswer", type="boolean")
     */
    private $isAnswer;

    /**
     * 
     * @var \iia\ApiBundle\Entity\Proposal
     * @ORM\ManyToOne(targetEntity="Question",inversedBy="$questionProp")
     * @ORM\JoinColumn(name="question_id",referencedColumnName="id")
     */
    private $propQuestion;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Proposal
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set isAnswer
     *
     * @param boolean $isAnswer
     *
     * @return Proposal
     */
    public function setIsAnswer($isAnswer)
    {
        $this->isAnswer = $isAnswer;

        return $this;
    }

    /**
     * Get isAnswer
     *
     * @return boolean
     */
    public function getIsAnswer()
    {
        return $this->isAnswer;
    }

    /**
     * Set propQuestion
     *
     * @param integer $propQuestion
     *
     * @return Proposal
     */
    public function setPropQuestion($propQuestion)
    {
        $this->propQuestion = $propQuestion;

        return $this;
    }

    /**
     * Get propQuestion
     *
     * @return integer
     */
    public function getPropQuestion()
    {
        return $this->propQuestion;
    }
}

