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
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return new Response("First page");
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug){
        $comments = [
            'i love fasting',
            'fasting improve cognitive inteligence',
            'cognitive & emotional inteligence are different'
        ];
        return $this->render("article/show.html.twig", [
            'title' => ucwords(str_replace('-',' ', $slug)),
            'comments' => $comments
        ]);
    }
}