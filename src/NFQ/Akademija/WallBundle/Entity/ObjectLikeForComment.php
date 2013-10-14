<?php
namespace NFQ\Akademija\WallBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ObjectLike subclass
 *
 * @ORM\Entity
 */
class ObjectLikeForComment extends ObjectLike
{
    /**
     * @var \NFQ\Akademija\WallBundle\Entity\Comment
     *
     * @ORM\ManyToOne(targetEntity="NFQ\Akademija\WallBundle\Entity\Comment", inversedBy="likes")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="object_id")
     * })
     */
    protected $comment;

    /**
     * Set comment
     *
     * @param \NFQ\Akademija\WallBundle\Entity\Comment $comment
     * @return ObjectLikeForComment
     */
    public function setComment(\NFQ\Akademija\WallBundle\Entity\Comment $comment = null)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return \NFQ\Akademija\WallBundle\Entity\Comment 
     */
    public function getComment()
    {
        return $this->comment;
    }
}