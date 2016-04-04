<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\CategoryRepository")
 * @ExclusionPolicy("all")
 */
class Category
{
    /**
     * @Expose
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;

    /**
     * @Expose
     * @var string
     * 
     * @ORM\Column(name="libelle", type="string", length=255)
     * 
     */
    private $libelle;

    /**
     * 
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
     * @var \iia\ApiBundle\Entity\Category
     * @ORM\OneToMany(targetEntity="Qcm",mappedBy="qcmCat")
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryGroup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categoryUser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categoryQcm = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add categoryGroup
     *
     * @param \iia\ApiBundle\Entity\GroupOfUsers $categoryGroup
     *
     * @return Category
     */
    public function addCategoryGroup(\iia\ApiBundle\Entity\GroupOfUsers $categoryGroup)
    {
        $this->categoryGroup[] = $categoryGroup;

        return $this;
    }

    /**
     * Remove categoryGroup
     *
     * @param \iia\ApiBundle\Entity\GroupOfUsers $categoryGroup
     */
    public function removeCategoryGroup(\iia\ApiBundle\Entity\GroupOfUsers $categoryGroup)
    {
        $this->categoryGroup->removeElement($categoryGroup);
    }

    /**
     * Add categoryUser
     *
     * @param \iia\ApiBundle\Entity\User $categoryUser
     *
     * @return Category
     */
    public function addCategoryUser(\iia\ApiBundle\Entity\User $categoryUser)
    {
        $this->categoryUser[] = $categoryUser;

        return $this;
    }

    /**
     * Remove categoryUser
     *
     * @param \iia\ApiBundle\Entity\User $categoryUser
     */
    public function removeCategoryUser(\iia\ApiBundle\Entity\User $categoryUser)
    {
        $this->categoryUser->removeElement($categoryUser);
    }

    /**
     * Add categoryQcm
     *
     * @param \iia\ApiBundle\Entity\Qcm $categoryQcm
     *
     * @return Category
     */
    public function addCategoryQcm(\iia\ApiBundle\Entity\Qcm $categoryQcm)
    {
        $this->categoryQcm[] = $categoryQcm;

        return $this;
    }

    /**
     * Remove categoryQcm
     *
     * @param \iia\ApiBundle\Entity\Qcm $categoryQcm
     */
    public function removeCategoryQcm(\iia\ApiBundle\Entity\Qcm $categoryQcm)
    {
        $this->categoryQcm->removeElement($categoryQcm);
    }

    /**
     * Get categoryQcm
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoryQcm()
    {
        return $this->categoryQcm;
    }
    public function __toString()
    {
      return strval($this->id);
    }
}
