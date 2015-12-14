<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\QuestionRepository")
 */
class Question
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
     * @var integer
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;

    /**
     * @var string
     *
     * @ORM\Column(name="media_link", type="string", length=255)
     */
    private $mediaLink;

    /**
     * @var \iia\ApiBundle\Entity\Qcm @ORM\ManyToOne(targetEntity="Qcm",inversedBy="$question_id")
     * @ORM\JoinColumn(name="qcm_id",referencedColumnName="id")
     */
    private $questionQcm;
    
    /**
     * 
     * @var \iia\ApiBundle\Entity\Proposal
     * @orm\OneToMany(targetEntity="Proposal",mappedBy="$propQuestion")
     */
    private $questionProp;

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
     * @return Question
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
     * Set points
     *
     * @param integer $points
     *
     * @return Question
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set mediaLink
     *
     * @param string $mediaLink
     *
     * @return Question
     */
    public function setMediaLink($mediaLink)
    {
        $this->mediaLink = $mediaLink;

        return $this;
    }

    /**
     * Get mediaLink
     *
     * @return string
     */
    public function getMediaLink()
    {
        return $this->mediaLink;
    }

    /**
     * Set questionQcm
     *
     * @param integer $questionQcm
     *
     * @return Question
     */
    public function setQuestionQcm($questionQcm)
    {
        $this->questionQcm = $questionQcm;

        return $this;
    }

    /**
     * Get questionQcm
     *
     * @return integer
     */
    public function getQuestionQcm()
    {
        return $this->questionQcm;
    }
}

