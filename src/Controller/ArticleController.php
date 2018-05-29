<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 29/05/2018
 * Time: 11:58
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug){
        /*dump($slug, $this);*/
        $comments = [
            'i love fasting',
            'fasting improve cognitive inteligence',
            'cognitive & emotional inteligence are different'
        ];
        return $this->render("article/show.html.twig", [
            'title' => ucwords(str_replace('-',' ', $slug)),
            'slug' => $slug,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug){
        //TODO DB

        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}