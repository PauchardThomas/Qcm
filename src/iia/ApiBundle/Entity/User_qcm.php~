<?php

namespace iia\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User_qcm
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="iia\ApiBundle\Entity\User_qcmRepository")
 */
class User_qcm
{

    /**
     * @ORM\id
     * @ORM\ManyToOne(targetEntity="User", inversedBy="id")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ORM\id
     * @ORM\ManyToOne(targetEntity="Qcm", inversedBy="id")
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */
    private $qcmId;

    /**
     * @var integer
     *
     * @ORM\Column(name="result", type="integer")
     */
    private $result;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return User_qcm
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set qcmId
     *
     * @param integer $qcmId
     *
     * @return User_qcm
     */
    public function setQcmId($qcmId)
    {
        $this->qcmId = $qcmId;

        return $this;
    }

    /**
     * Get qcmId
     *
     * @return integer
     */
    public function getQcmId()
    {
        return $this->qcmId;
    }

    /**
     * Set result
     *
     * @param integer $result
     *
     * @return User_qcm
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return integer
     */
    public function getResult()
    {
        return $this->result;
    }
}
