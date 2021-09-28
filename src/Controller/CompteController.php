<?php

namespace App\Controller;

use App\Form\InfoCompteFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class CompteController extends AbstractController
{
    /**
     * @Route("compte", name="info")
     */
    public function index(Request $request, EntityManagerInterface $em, UserRepository $user, UserPasswordHasherInterface $passwordEncoder): Response
    {
        // dd($request);
        $user = $this->getUser();
        $form = $this->createForm(InfoCompteFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setPassword(
                $passwordEncoder->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // $em->persist($user);
            // $em->flush();
            $this->addFlash('success', 'Vos infos ont bien été modifiées');
            return $this->redirectToRoute('accueil');
        }
        return $this->render('compte/modifInfo.html.twig', ['form' => $form->createView()]);
    }
    // /**
    //  * @Route("/register/{id}", name="info", methods={"DELETE"})
    //  */
    // public function deleteUser(Request $request, User $user, Session $session): Response
    // {
    //     $session = new Session();
    //     $session->invalidate();
    //     if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($user);
    //         $entityManager->flush();

    //         $this->addFlash('sup', 'Votre compte a bien été supprimée');
    //     }


    //     return $this->redirectToRoute('accueil');
    // }
}
