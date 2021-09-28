<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PiscineController extends AbstractController
{
    /**
     * @Route("/piscine", name="piscine")
     */
    public function index(): Response
    {
        return $this->render('piscine/piscine.html.twig');
    }
}
