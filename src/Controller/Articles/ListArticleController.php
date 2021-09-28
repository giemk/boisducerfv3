<?php

namespace App\Controller\Articles;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListArticleController extends AbstractController
{
    /**
     * @Route("list/article", name="list_article")
     */
    public function home(ArticleRepository $articleRepository): response
    {
        $articles = $articleRepository->findAll();

        return $this->render('article/article.html.twig', [
            'articles' => $articles
        ]);
    }
}
