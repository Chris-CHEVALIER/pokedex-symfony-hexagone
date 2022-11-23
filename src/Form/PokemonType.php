<?php

namespace App\Form;

use App\Entity\Pokemon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("number", NumberType::class, ["label" => "Numéro"])
            ->add("name", TextType::class, ["label" => "Nom"])
            ->add("area", TextType::class, ["label" => "Zone"])
            ->add("image", UrlType::class, ["label" => "Image", "attr" => [
                "required" => false
            ]]);
            //->add("type1", TextType::class, ["label" => "Type 1"])
            //->add("type2", TextType::class, ["label" => "Type 2"])
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Pokemon::class
        ]);
    }
}