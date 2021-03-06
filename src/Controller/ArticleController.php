<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 29/05/2018
 * Time: 11:58
 */

namespace App\Controller;


use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Services\MarkdownHelper;
use App\Services\SlackClient;
use Doctrine\ORM\EntityManagerInterface;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleController extends AbstractController
{

    private $isDebug;

    public function __construct(bool $isDebug)
    {
        $this->isDebug = $isDebug;
    }

    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage(ArticleRepository $repository)
    {

        //$articles = $repository->findAll();
//        $articles = $repository->findBy([], ['publishedAt' => 'DESC']);
        $articles = $repository->findAllPublishedOrderedByNewest();
        //dump($repository);die;
        return $this->render('article/homepage.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     * @param SlackClient $slack
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($slug, SlackClient $slack, EntityManagerInterface $em)
    {
        //$slack->sendMessage('khan', 'hola mund!');
        /*dump($slug, $this);*/

        $repository = $em->getRepository(Article::class);
        /** @var Article $article */
        $article = $repository->findOneBy(['slug' => $slug]);
        if (!$article) {
            throw $this->createNotFoundException(sprintf('No article for slug "%s"', $slug));//Message shown to the dev
        }

        $comments = [
            'i love fasting',
            'fasting improve cognitive inteligence',
            'cognitive & emotional inteligence are different'
        ];

        //dump($cache);die;

        return $this->render("article/show.html.twig", [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart(Article $article, LoggerInterface $logger, EntityManagerInterface $em)
    {
        $logger->info("Article is being hearted!");
        //$article->setHeartCount($article->getHeartCount()+1);
        $article->incrementHeartCount();
        //$em->persist($article); Not needed it is saved automatically in this case
        $em->flush();

        return new JsonResponse([
            'hearts' => $article->getHeartCount()
        ]);
    }
}