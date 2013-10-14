<?php

namespace NFQ\Akademija\WallBundle\Controller;

use NFQ\Akademija\WallBundle\Entity\Post;
use NFQ\Akademija\WallBundle\Form\PostType;
use NFQ\Akademija\WallBundle\Service\PostService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{

    public function indexAction()
    {
        /** @var PostService $postService */
        $postService = $this->get('nfq_akademija_wall.post_service');

        $posts = $postService->getPosts();

        $post_form = $this->createForm(
            new PostType(),
            new Post(),
            array(
                'action' => $this->generateUrl('nfq_akademija_wall_post'),
            )
        );

        return $this->render(
            'NFQAkademijaWallBundle:Wall:index.html.twig',
            array(
                'post_form' => $post_form->createView(),
                'posts' => $posts
            )
        );
    }

    public function postAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new PostType(), new Post());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $post = $form->getData();

            $post = $post->setUser($user);
            $em->persist($post);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('nfq_akademija_wall_homepage'));
    }

    public function listAction($from, $limit = 10)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->getRepository('NFQAkademijaWallBundle:Post')
            ->createQueryBuilder('p')
            ->where('p.user_id = :user')
            ->setParameter('price', $this->user->id)
            ->orderBy('p.id', 'DESC')
            ->from('id', $from)
            ->limit($limit)
            ->getQuery();
        $products = $query->getResult();
    }
}
