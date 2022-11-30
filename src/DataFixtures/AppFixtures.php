<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        /* $user = new User($this->passwordHasher);
        $user->setEmail("chris.chevalier@ecole-hexagone.com")->setPassword("123")->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);

        $user = new User($this->passwordHasher);
        $user->setEmail("chevalier@chris-freelance.com")->setPassword("123");
        $manager->persist($user); */

        $pohm = new Pokemon();
        
        $pohm->setNumber(955)->setName("Pohm")->setImage("https://www.pokepedia.fr/images/thumb/b/bf/Pohm-EV.png/1200px-Pohm-EV.png")->setArea("Zone Sud n° 1");
        $manager->persist($pohm);

        $manager->flush();
    }
}
