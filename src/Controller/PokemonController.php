<?php

namespace App\Controller;

use App\Entity\Pokemon;
use App\Form\PokemonType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route("/", name: "index")]
    public function index(ManagerRegistry $doctrine)
    {
        $pokemonRepository = $doctrine->getRepository(Pokemon::class);
        $pokemons = $pokemonRepository->findAll();
        return $this->render("pokemon/index.html.twig", [
            "pokemons" => $pokemons
        ]);
    }

    #[Route("/create", name: "create")]
    public function create(Request $request, ManagerRegistry $doctrine)
    {
        //$this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $pokemon = new Pokemon();
        $form = $this->createForm(PokemonType::class, $pokemon);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //dump($pokemon);
            $em = $doctrine->getManager(); // Récupération de l'EM
            $em->persist($pokemon); // Ajouter à l'EM 
            $em->flush(); // Synchronisation avec la BDD 
        }
        return $this->render("pokemon/form.html.twig", [
            "form" => $form->createView()
        ]);
    }

    #[Route("/update/{id}")]
    public function update(Request $request, ManagerRegistry $doctrine, Pokemon $pokemon)
    {
        dump($pokemon);
        $form = $this->createForm(PokemonType::class, $pokemon);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager(); // Récupération de l'EM
            $em->flush(); // Synchronisation avec la BDD 
        } 
        return $this->render("pokemon/form.html.twig", [
            "form" => $form->createView()
        ]);
    }

    #[Route("/delete/{id}")]
    public function delete(ManagerRegistry $doctrine, Pokemon $pokemon)
    {
        $em = $doctrine->getManager(); // Récupération de l'EM
        $em->remove($pokemon); // Suppression de l'objet dans l'EM
        $em->flush(); // Synchronisation avec la BDD    
        return $this->redirectToRoute("create");
    }

    #[Route("/read/{id}")]
    public function read(ManagerRegistry $doctrine, int $id)
    {
        $pokemonRepository = $doctrine->getRepository(Pokemon::class);
        $pokemon = $pokemonRepository->find($id);
        return $this->render("pokemon/read.html.twig", [
            "pokemon" => $pokemon
        ]);
    }
}