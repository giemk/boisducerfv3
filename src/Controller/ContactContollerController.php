<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactContollerController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        return $this->render('contact/contact.html.twig');
    }
}
