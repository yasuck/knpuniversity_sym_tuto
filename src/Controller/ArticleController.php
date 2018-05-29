<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 29/05/2018
 * Time: 11:58
 */

namespace App\Controller;


use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Knp\Bundle\MarkdownBundle\Parser\MarkdownParser;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
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
    public function show($slug, MarkdownInterface $markdown)
    {
        /*dump($slug, $this);*/
        $comments = [
            'i love fasting',
            'fasting improve cognitive inteligence',
            'cognitive & emotional inteligence are different'
        ];

        $articleContent = "
           This is a **super fake content**, no matter what, don't try to get into it ... Too late, you're already reading 
           it and it's bad for your [health](https://fr.wikipedia.org/wiki/Health) to keep reading it because it does has no sense and the worse is that it was written
           by someone who want to go to bed :)."
;


        return $this->render("article/show.html.twig", [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'content' => $articleContent,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        //TODO DB
        $logger->info("Article is being hearted!");
        return new JsonResponse(['hearts' => rand(5, 100)]);
    }
}