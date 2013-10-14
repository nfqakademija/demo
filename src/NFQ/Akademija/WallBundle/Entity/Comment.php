<?php

namespace NFQ\Akademija\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Comment
 *
 * @ORM\Entity
 * @ORM\Table(name="comments")
 */
class Comment
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="ObjectLikeForComment", mappedBy="comment")
     */
    private $likes;

    /**
     * @ORM\ManyToOne(targetEntity="NFQ\Akademija\WallBundle\Entity\Post")
     * @ORM\JoinColumn(name="posts_id", referencedColumnName="id")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity="NFQ\Akademija\WallBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
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
     * Set userId
     *
     * @param integer $userId
     * @return Comment
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
     * Set comment
     *
     * @param string $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Comment
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
     * @return Comment
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
     * Constructor
     */
    public function __construct()
    {
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $likes
     * @return Comment
     */
    public function addLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $likes)
    {
        $this->likes[] = $likes;
    
        return $this;
    }

    /**
     * Remove likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $likes
     */
    public function removeLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $likes)
    {
        $this->likes->removeElement($likes);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set post
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Post $post
     * @return Comment
     */
    public function setPost(\NFQ\Akademija\WallBundle\Entity\Post $post = null)
    {
        $this->post = $post;
    
        return $this;
    }

    /**
     * Get post
     *
     * @return \NFQ\Akademija\WallBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set user
     *
     * @param \NFQ\Akademija\WallBundle\Entity\User $user
     * @return Comment
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