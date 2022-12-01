<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route("/user/update/{id}")]
    public function update(Request $request, ManagerRegistry $doctrine, User $user)
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        if ($this->getUser() === $user) {
            $user->setPassword("");
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $doctrine->getManager()->flush();
            }

            return $this->render("/user/update.html.twig", [
                "form" => $form->createView()
            ]);
        } else {
            return $this->redirectToRoute("login");
        }
    }
}
