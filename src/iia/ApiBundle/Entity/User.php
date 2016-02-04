<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use FOS\UserBundle\Entity\User AS BaseUser ;
/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="User_qcm", mappedBy="$userId")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="loginn", type="string", length=255)
     */
    protected $loginn;

    /**
     * @var string
     *
     * @ORM\Column(name="passwordd", type="string", length=255)
     */
    protected $passwordd;

    /**
     * @var string
     *
     * @ORM\Column(name="namee", type="string", length=255)
     */
    protected $namee;

    /**
     * @var string
     *
     * @ORM\Column(name="firstnamee", type="string", length=255)
     */
    protected $firstnamee;

    /**
     * @var string
     *
     * @ORM\Column(name="maill", type="string", length=255)
     */
    protected $maill;

    /**
     * @ORM\ManyToOne(targetEntity="GroupOfUsers",inversedBy="$groupUser")
     * @ORM\JoinColumn(name="group_id",referencedColumnName="id")
     * @var \iia\ApiBundle\Entity\GroupOfUsers
     */
    protected $userGroup;

    /**
     * @ORM\ManyToMany(targetEntity="Category",inversedBy="$categoryUser")
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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
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
