<?php

namespace NFQ\Akademija\WallBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

class PostService
{

    /** @var  EntityManager */
    protected $entityManager;

    protected $posts = null;

    public function __construct(ObjectManager $em)
    {
        $this->entityManager = $em;
    }

    public function getPosts()
    {
        if(!$this->posts) {
            $this->posts = $this->entityManager->getRepository('NFQAkademijaWallBundle:Post')
                ->findBy(array(), array('id' => 'DESC'), 10);
        }

        return $this->posts;
    }
} 