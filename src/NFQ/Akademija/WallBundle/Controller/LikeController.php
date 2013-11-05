<?php

namespace NFQ\Akademija\WallBundle\Controller;

use NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{

    public function postLikeAction($post_id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $obj = $em->getRepository('NFQAkademijaWallBundle:ObjectLikeForPost');
        $post = $em->getRepository('NFQAkademijaWallBundle:Post')->find($post_id);
        $like = $obj->findBy(
            array(
                'user' => $user->getId(),
                'post' => $post_id
            )
        );

        if($like) {
            //User already voted
            return new Response(json_encode(array('status' => 'EXISTS')));
        } else {
            $postLike = new ObjectLikeForPost();
            $postLike->setPost($post);
            $postLike->setUser($user);
            $em->persist($postLike);
            $em->flush();
            return new Response(json_encode(array('status' => 'OK')));
        }
    }

}
