<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\CategoryRepository")
 */
class Category
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
     * @ORM\ManyToMany(targetEntity="GroupOfUsers",mappedBy="groupCat")
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categoryGroup;

    /**
     * @ORM\ManyToMany(targetEntity="User",mappedBy="userCat")
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categoryUser;
    /**
     * @var \iia\ApiBundle\Entity\Qcm
     * @ORM\OneToMany(targetEntity="Qcm",mappedBy="$qcmCat")
     */
    private $categoryQcm;


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
     * @return Category
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
     * Set categoryGroup
     *
     * @param integer $categoryGroup
     *
     * @return Category
     */
    public function setCategoryGroup($categoryGroup)
    {
        $this->categoryGroup = $categoryGroup;

        return $this;
    }

    /**
     * Get categoryGroup
     *
     * @return integer
     */
    public function getCategoryGroup()
    {
        return $this->categoryGroup;
    }

    /**
     * Set categoryUser
     *
     * @param integer $categoryUser
     *
     * @return Category
     */
    public function setCategoryUser($categoryUser)
    {
        $this->categoryUser = $categoryUser;

        return $this;
    }

    /**
     * Get categoryUser
     *
     * @return integer
     */
    public function getCategoryUser()
    {
        return $this->categoryUser;
    }
}

