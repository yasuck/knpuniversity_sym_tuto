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
    public function new(EntityManagerInterface $em){
        $article = new Article();
        $article->setTitle("Why steroids test like bacon")
            ->setSlug("why-asteroids-taste-like-bacon".rand(1, 100))
            ->setContent(<<<EOF
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham hock nisi landjaeger cow,
lorem proident [beef ribs](https://baconipsum.com/) aute enim veniam ut cillum pork chuck picanha. Dolore reprehenderit
labore minim pork belly spare ribs cupim short loin in. Elit exercitation eiusmod dolore cow
turkey shank eu **turkey** belly meatball non cupim.
Laboris beef ribs fatback fugiat eiusmod jowl kielbasa alcatra dolore velit ea ball tip. Pariatur
laboris sunt venison, et laborum dolore minim non meatball. Shankle eu flank aliqua shoulder,
capicola biltong frankfurter boudin cupim officia. Exercitation fugiat consectetur ham. Adipisicing
picanha shank et filet mignon pork belly ut ullamco. Irure velit turducken ground round doner incididunt
occaecat lorem meatball prosciutto quis strip steak.
Meatball adipisicing ribeye bacon strip steak eu. Consectetur ham hock pork hamburger enim strip steak
mollit quis officia meatloaf tri-tip swine. Cow ut reprehenderit, buffalo incididunt in filet mignon
strip steak pork belly aliquip capicola officia. Labore deserunt esse chicken lorem shoulder tail consectetur
cow est ribeye adipisicing. Pig hamburger pork belly enim. Do porchetta minim capicola irure pancetta chuck
EOF
            );

        if(rand(1, 10) > 2){
            $article->setPublishedAt(new \DateTime(sprintf('-% days', rand(1, 100))));
        }

        //Two separate steps to be more flexible: imagine u would like to create 10 articles, u only need 1 flush! OPTIMISATION MAN ;)
        $em->persist($article);//I would like to save the article
        $em->flush();//Make the insert querry
        return new Response(
            sprintf(
                "Hey! New article id:#%d slug: %s ",
                $article->getId(),
                $article->getSlug()
            )
        );
    }
}