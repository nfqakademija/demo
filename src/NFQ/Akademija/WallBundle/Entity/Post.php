<?php

namespace NFQ\Akademija\WallBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Post
 *
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post
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
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost", mappedBy="post")
     */
    private $likes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="NFQ\Akademija\WallBundle\Entity\Comment", mappedBy="post")
     */
    private $comments;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime", nullable=TRUE)
     */
    private $updated;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime", nullable=TRUE)
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     */
    private $user;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
    }

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
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Post
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
     * @return Post
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
     * Get User
     *
     * @return \NFQ\Akademija\WallBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $likes
     * @return Post
     */
    public function addLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $likes)
    {
        $this->likes[] = $likes;
    
        return $this;
    }

    /**
     * Remove likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $likes
     */
    public function removeLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $likes)
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
     * Set user
     *
     * @param \NFQ\Akademija\WallBundle\Entity\User $user
     * @return Post
     */
    public function setUser(\NFQ\Akademija\WallBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }


    /**
     * Add comments
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Comment $comments
     * @return Post
     */
    public function addComment(\NFQ\Akademija\WallBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;
    
        return $this;
    }

    /**
     * Remove comments
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Comment $comments
     */
    public function removeComment(\NFQ\Akademija\WallBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}