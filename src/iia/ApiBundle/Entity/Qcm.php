<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;


/**
 * Qcm
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\QcmRepository")
 * @ExclusionPolicy("all")
 */
class Qcm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="User_qcm", mappedBy="$qcmId")
     * @Expose()
     * @Groups({"list"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     * @Expose
     * @Groups({"list"})
     */
    private $libelle;

    /**
     * @var \DateTime
     * @Expose
     * @ORM\Column(name="date_publi", type="date")
     */
    private $datePubli;

    /**
     * @var \DateTime
     * @Expose
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;
    /**
     * 
     * @var string
     * @Expose
     * @ORM\Column(name="nb_points",type="bigint");
     */
    private $nbPoints;
    /**
     *  
     *  @var \iia\ApiBundle\Entity\Category  @ORM\ManyToOne(targetEntity="Category",inversedBy="$categoryQcm")
     *  @ORM\JoinColumn(name="category_id",referencedColumnName="id")
     *  
     * 
     */
    private $qcmCat;
    
    /**
     * @var \iia\ApiBundle\Entity\Qcm
     * @ORM\OneToMany(targetEntity="Question",mappedBy="questionQcm")
     * @Expose
     *
     * 
     */
    private $question_id;


    /**
     * Get id
     *
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
     * @return Qcm
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
     * 
     * @param \string $nbPoints
     * @return \iia\ApiBundle\Entity\Qcm
     */
    public function setNbPoint($nbPoints)
    {
      $this->nbPoints = $nbPoints;
      
      return $this;
    }
    /**
     * get NbPoints
     * @return string
     */
    public function getNbPoint()
    {
      return $this->nbPoints;
    }
    /**
     * Set datePubli
     * 
     * @param \DateTime $datePubli
     *
     * @return Qcm
     */
    public function setDatePubli($datePubli)
    {
        $this->datePubli = $datePubli;

        return $this;
    }

    /**
     * Get datePubli
     * 
     * @return \DateTime
     */
    public function getDatePubli()
    {
        return $this->datePubli;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Qcm
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set qcmCat
     *
     * @param integer $qcmCat
     *
     * @return Qcm
     */
    public function setQcmCat($qcmCat)
    {
        $this->qcmCat = $qcmCat;

        return $this;
    }

    /**
     * Get qcmCat
     *
     * @return integer
     */
    public function getQcmCat()
    {
        return $this->qcmCat;
    }

    /**
     * Set qcmUser
     *
     * @param integer $qcmUser
     *
     * @return Qcm
     */
    public function setQcmUser($qcmUser)
    {
        $this->qcmUser = $qcmUser;

        return $this;
    }

    /**
     * Get qcmUser
     *
     * @return integer
     */
    public function getQcmUser()
    {
        return $this->qcmUser;
    }
    public function __toString()
    {
      return strval($this->id);
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->question_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questionId
     *
     * @param \iia\ApiBundle\Entity\Question $questionId
     *
     * @return Qcm
     */
    public function addQuestionId(\iia\ApiBundle\Entity\Question $questionId)
    {
        $this->question_id[] = $questionId;

        return $this;
    }

    /**
     * Remove questionId
     *
     * @param \iia\ApiBundle\Entity\Question $questionId
     */
    public function removeQuestionId(\iia\ApiBundle\Entity\Question $questionId)
    {
        $this->question_id->removeElement($questionId);
    }

    /**
     * Get questionId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set nbPoints
     *
     * @param integer $nbPoints
     *
     * @return Qcm
     */
    public function setNbPoints($nbPoints)
    {
        $this->nbPoints = $nbPoints;

        return $this;
    }

    /**
     * Get nbPoints
     *
     * @return integer
     */
    public function getNbPoints()
    {
        return $this->nbPoints;
    }
}
