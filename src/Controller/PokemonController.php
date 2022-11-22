<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route("/create")]
    public function create(Request $request)
    {
        $pokemon = new Pokemon();
        $form = $this->createForm(PokemonType::class, $pokemon);
        //dump($pokemon);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($pokemon);
        }
        return $this->render("pokemon/create.html.twig", [
            "formulaire" => $form->createView()
        ]);
    }
}