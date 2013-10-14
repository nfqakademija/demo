<?php

namespace NFQ\Akademija\WallBundle\Controller;

use NFQ\Akademija\WallBundle\Entity\Comment;
use NFQ\Akademija\WallBundle\Entity\ObjectLikeForPost;
use NFQ\Akademija\WallBundle\Entity\Post;
use NFQ\Akademija\WallBundle\Form\CommentType;
use NFQ\Akademija\WallBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{

    public function formAction($post_id)
    {
        $comment_form = $this->createForm(
            new CommentType(),
            new Comment(),
            array(
                'action' => $this->generateUrl('nfq_akademija_comment_post', array('post_id' => $post_id)),
            )
        );

        return $this->render(
            'NFQAkademijaWallBundle:Comment:form.html.twig',
            array(
                'comment_form' => $comment_form->createView()
            )
        );
    }

    public function postAction(Request $request, $post_id)
    {
        $em = $this->getDoctrine()->getManager();

        $post = $em->getRepository('NFQAkademijaWallBundle:Post')->find($post_id);

        if(!$post) {
            return new Response('ERROR');
        }

        $user = $this->container->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new CommentType(), new Comment());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $comment = $form->getData();
            $comment->setUser($user);
            $comment->setPost($post);
            $em->persist($comment);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('nfq_akademija_wall_homepage'));
    }
}
