<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfocoproController extends AbstractController
{
    /**
     * @Route("/infocopro", name="infocopro")
     */
    public function index(): Response
    {
        return $this->render('infocopro/infocopro.html.twig');
    }
}
