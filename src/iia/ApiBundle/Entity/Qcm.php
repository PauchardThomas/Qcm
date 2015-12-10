<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qcm
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\QcmRepository")
 */
class Qcm
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_publi", type="date")
     */
    private $datePubli;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="qcm_cat", type="integer")
     */
    private $qcmCat;

    /**
     * @ORM\ManyToMany(targetEntity="User",mappedBy="userQcm")
     * @var \Doctrine\Common\Collections\Collection
     */
    private $qcmUser;
    
    /**
     * @var \iia\ApiBundle\Entity\Question @ORM\ManyToOne(targetEntity="Question",inversedBy="$questionQcm")
     * @ORM\JoinColumn(name="question_id",referencedColumnName="id")
     */
    private $question_id;


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
}

