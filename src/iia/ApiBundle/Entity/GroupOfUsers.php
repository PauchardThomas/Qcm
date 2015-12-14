<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * GroupOfUsers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\GroupOfUsersRepository")
 */
class GroupOfUsers
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
     *  @ORM\ManyToMany(targetEntity="Category",inversedBy="$categoryGroup")
     *  @ORM\JoinTable(name="Access_group_category",joinColumns={@JoinColumn(name="group_id",referencedColumnName="id")},inverseJoinColumns={@JoinColumn(name="category_id",referencedColumnName="id")})
     *  @var \Doctrine\Common\Collections\Collection
     */
    private $groupCat;
    /**
     * @ORM\OneToMany(targetEntity="User",mappedBy="$userGroup")
     * @var \iia\ApiBundle\Entity\GroupOfUsers
     */
    private $groupUser;
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
     * @return GroupOfUsers
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
}

