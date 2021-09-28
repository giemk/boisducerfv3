<?php

namespace App\Controller\Articles;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowArticleController extends AbstractController
{
    /**
     * @Route("/show/article/{id}", name="show_article")
     */
    public function show(int $id, ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->find($id);



        return $this->render('/article/show_article.html.twig', [
            'articles' => $articles
        ]);
    }
}
