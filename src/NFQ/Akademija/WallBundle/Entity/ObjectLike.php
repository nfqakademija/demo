<?php

namespace NFQ\Akademija\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ObjectLike
 *
 * @ORM\Entity
 * @ORM\Table(name="objectlikes")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="entity", type="string")
 * @ORM\DiscriminatorMap({
 *      "comments" = "NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment",
 *      "posts" = "NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost"
 * })
 */
abstract class ObjectLike
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
     * @var integer
     *
     * @ORM\Column(name="object_id", type="integer")
     */
    private $objectId;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=TRUE)
     */
    private $updated;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=TRUE)
     */
    private $created;


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
     * Set objectId
     *
     * @param integer $objectId
     * @return ObjectLike
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    
        return $this;
    }

    /**
     * Get objectId
     *
     * @return integer 
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set entity
     *
     * @param string $entity
     * @return ObjectLike
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    
        return $this;
    }

    /**
     * Get entity
     *
     * @return string 
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return ObjectLike
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ObjectLike
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user
     *
     * @param \NFQ\Akademija\WallBundle\Entity\User $user
     * @return ObjectLike
     */
    public function setUser(\NFQ\Akademija\WallBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \NFQ\Akademija\WallBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}