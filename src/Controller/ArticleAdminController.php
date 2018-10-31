<?php
/**
 * Created by PhpStorm.
 * User: schmidfl
 * Date: 29.10.2018
 * Time: 15:10
 */

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController {

    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $em) {
        // TODO - actually create/write articles

        die('todo');


        $em->persist($article);
        $em->flush();

        return new Response(sprintf(
            'Hiya! New article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }

}