<?php
namespace NFQ\Akademija\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjectLike subclass
 *
 * @ORM\Entity
 */
class ObjectLikeForPost extends ObjectLike
{
    /**
     * @var \NFQ\Akademija\WallBundle\Entity\Post
     *
     * @ORM\ManyToOne(targetEntity="NFQ\Akademija\WallBundle\Entity\Post", inversedBy="likes")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="object_id")
     * })
     */
    protected $post;

    /**
     * Set post
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Post $post
     * @return ObjectLikeForPost
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
}