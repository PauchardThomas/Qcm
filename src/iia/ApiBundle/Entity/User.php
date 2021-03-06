<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use FOS\UserBundle\Entity\User AS BaseUser ;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;
/**
 * User
 * @ExclusionPolicy("all")
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="User_qcm", mappedBy="userId")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="GroupOfUsers",inversedBy="groupUser")
     * @ORM\JoinColumn(name="group_id",referencedColumnName="id")
     * @var \iia\ApiBundle\Entity\GroupOfUsers
     */
    protected $userGroup;

    /**
     * @ORM\ManyToMany(targetEntity="Category",inversedBy="categoryUser")
     * @ORM\JoinTable(name="Access_user_category",joinColumns={@JoinColumn(name="user_id",referencedColumnName="id")},inverseJoinColumns={@JoinColumn(name="category_id",referencedColumnName="id")})
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $userCat;




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
     * Set userGroup
     *
     * @param integer $userGroup
     *
     * @return User
     */
    public function setUserGroup($userGroup)
    {
        $this->userGroup = $userGroup;

        return $this;
    }

    /**
     * Get userGroup
     *
     * @return integer
     */
    public function getUserGroup()
    {
        return $this->userGroup;
    }

    /**
     * Set userCat
     *
     * @param integer $userCat
     *
     * @return User
     */
    public function setUserCat($userCat)
    {
        $this->userCat = $userCat;

        return $this;
    }

    /**
     * Get userCat
     *
     * @return integer
     */
    public function getUserCat()
    {
        return $this->userCat;
    }

    /**
     * Set userQcm
     *
     * @param integer $userQcm
     *
     * @return User
     */
    public function setUserQcm($userQcm)
    {
        $this->userQcm = $userQcm;

        return $this;
    }

    /**
     * Get userQcm
     *
     * @return integer
     */
    public function getUserQcm()
    {
        return $this->userQcm;
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
        $this->userCat = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userCat
     *
     * @param \iia\ApiBundle\Entity\Category $userCat
     *
     * @return User
     */
    public function addUserCat(\iia\ApiBundle\Entity\Category $userCat)
    {
        $this->userCat[] = $userCat;

        return $this;
    }

    /**
     * Remove userCat
     *
     * @param \iia\ApiBundle\Entity\Category $userCat
     */
    public function removeUserCat(\iia\ApiBundle\Entity\Category $userCat)
    {
        $this->userCat->removeElement($userCat);
    }
}
