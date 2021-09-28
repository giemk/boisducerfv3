<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TennisController extends AbstractController
{
    /**
     * @Route("/tennis", name="tennis")
     */
    public function index(): Response
    {
        return $this->render('tennis/tennis.html.twig');
    }
}
