<?php

namespace App\Controller\Articles;

use App\Form\ArticleType;
use Doctrine\ORM\EntityManager;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditArticleController extends AbstractController
{
    /**
     * @Route("/edit/article/{id}", name="edit_article")
     */
    public function edit(int $id, Request $request, EntityManagerInterface $em, ArticleRepository $articleRepository): Response
    {


        $article = $articleRepository->find($id);

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Article $article */
            $article = $form->getData();

            $em->flush();

            return $this->redirectToRoute('list_article');
        }
        return $this->render('article/edit_article.html.twig', [

            'form' => $form->createView()
        ]);
    }
}
