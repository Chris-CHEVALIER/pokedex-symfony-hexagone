<?php
# App/Controller/SecurityController.php
namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route("/login", name: "login")]
    public function login(AuthenticationUtils $utils, Request $request)
    {
        $defaultData = array('email' => $utils->getLastUsername());
        $form = $this->createForm(LoginType::class, $defaultData);
        if (!is_null($utils->getLastAuthenticationError(false))) {
            $form->addError(new \Symfony\Component\Form\FormError(
                $utils->getLastAuthenticationError()->getMessageKey()
            ));
        }
        $form->handleRequest($request);
        return $this->render('login.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route("/logout", name: "logout")]
    public function logout()
    {
    }
}
