<?php
/**
 * Created by PhpStorm.
 * User: schmidfl
 * Date: 26.10.2018
 * Time: 10:36
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController {

    /**
     * @Route("/")
     */
    public function homepage() {
        return new Response("OMG! My first page already! Wooo!");
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug) {
        return new Response("Future page to show the article: " . $slug);
    }
}