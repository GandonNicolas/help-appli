<?php

namespace App\Controller;
use App\Entity\Article;
use App\Entity\Keyword;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ArticleRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'articles' => $articleRepository->findAll()
        ]);
    }

    /**
     * @Route("/create/keyword", name="create_keyword")
     */
    public function createKeyword(EntityManagerInterface $entityManager): Response
    {
        $keyword = new Keyword();
        $keyword->setLabel('Ecole central');
        $entityManager->persist($keyword);
        $entityManager->flush();
        

        $keywordRepository = $this->getDoctrine()->getRepository(Keyword::class);
        $keywords = $keywordRepository->findAll();
        dump($keywords);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/get/{id}", name="get_article", requirements={"id"="\d+"})
     */
    public function getArticle (Article $article): Response {
        
        return $this->render('home/get_article.html.twig', [
            'article' => $article
        ]);
    }
    /**
     * @Route("/{id}", name="article_delete", methods={"POST"})
     */
    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }
}
