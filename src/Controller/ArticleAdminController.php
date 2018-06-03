<?php
/**
 * Created by PhpStorm.
 * User: Yasu
 * Date: 02/06/2018
 * Time: 17:21
 */

namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{

    /**
     * @Route("/admin/article/new/")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function new(EntityManagerInterface $em)
    {
        die('todo');
        return new Response(
            sprintf(
                "Hey! New article id:#%d slug: %s ",
                $article->getId(),
                $article->getSlug()
            )
        );
    }
}