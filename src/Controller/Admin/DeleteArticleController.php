<?php

namespace App\Controller\Admin;

use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DeleteArticleController extends AbstractController
{
    /**
     * @Route("/delete/article/{id}", name="delete_article")
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(int $id, Request $request, EntityManagerInterface $em, ArticleRepository $articleRepository): RedirectResponse
    {
        $article = $articleRepository->find($id);

        $em->remove($article);

        $em->flush();

        return $this->redirectToRoute('list_article');
    }
}
