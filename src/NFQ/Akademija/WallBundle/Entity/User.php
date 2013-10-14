<?php

namespace NFQ\Akademija\WallBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=TRUE)
     */
    private $updated;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=TRUE)
     */
    private $created;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="NFQ\Akademija\WallBundle\Entity\Post",
     *          mappedBy="user")
     * @ORM\OrderBy({"id"="ASC"})
     */
    protected $posts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost",
     *          mappedBy="user")
     * @ORM\OrderBy({"id"="ASC"})
     */
    protected $posts_likes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="NFQ\Akademija\WallBundle\Entity\Comment",
     *          mappedBy="user")
     * @ORM\OrderBy({"id"="DESC"})
     */
    protected $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment",
     *          mappedBy="user")
     * @ORM\OrderBy({"id"="ASC"})
     */
    protected $comments_likes;

    /**
     * constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->posts = new ArrayCollection();
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
     * Set created
     *
     * @param datetime $created
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     * @return User
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return datetime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add posts
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Post $posts
     * @return User
     */
    public function addPost(\NFQ\Akademija\WallBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Post $posts
     */
    public function removePost(\NFQ\Akademija\WallBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add comments
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Comment $comments
     * @return User
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

    /**
     * Add comment_likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentLikes
     * @return User
     */
    public function addCommentLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentLikes)
    {
        $this->comment_likes[] = $commentLikes;
    
        return $this;
    }

    /**
     * Remove comment_likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentLikes
     */
    public function removeCommentLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentLikes)
    {
        $this->comment_likes->removeElement($commentLikes);
    }

    /**
     * Get comment_likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentLikes()
    {
        return $this->comment_likes;
    }

    /**
     * Add posts_likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $postsLikes
     * @return User
     */
    public function addPostsLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $postsLikes)
    {
        $this->posts_likes[] = $postsLikes;
    
        return $this;
    }

    /**
     * Remove posts_likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $postsLikes
     */
    public function removePostsLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost $postsLikes)
    {
        $this->posts_likes->removeElement($postsLikes);
    }

    /**
     * Get posts_likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostsLikes()
    {
        return $this->posts_likes;
    }

    /**
     * Add comments_likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentsLikes
     * @return User
     */
    public function addCommentsLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentsLikes)
    {
        $this->comments_likes[] = $commentsLikes;
    
        return $this;
    }

    /**
     * Remove comments_likes
     *
     * @param \NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentsLikes
     */
    public function removeCommentsLike(\NFQ\Akademija\WallBundle\Entity\ObjectLikeForComment $commentsLikes)
    {
        $this->comments_likes->removeElement($commentsLikes);
    }

    /**
     * Get comments_likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentsLikes()
    {
        return $this->comments_likes;
    }
}