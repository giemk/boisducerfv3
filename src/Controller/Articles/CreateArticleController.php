<?php

namespace App\Controller\Articles;

use App\Form\ArticleType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateArticleController extends AbstractController
{
    /**
     * @Route("/article/creer", name="create_article")
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ArticleType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();

            $article->setUser($this->getUser());

            $em->persist($article);

            $em->flush();

            $this->addFlash('success', 'votre article a bien été enregistré.');

            return $this->redirectToRoute('list_article');
        }

        return $this->render('article/create_article.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }
}
