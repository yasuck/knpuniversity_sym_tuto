<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 29/05/2018
 * Time: 11:58
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
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
        return new Response(sprintf(
            "The news subject is: ".$slug
        ));
    }
}