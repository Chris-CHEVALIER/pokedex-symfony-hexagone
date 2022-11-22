<?php

namespace App\Form;

use App\Entity\Pokemon;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("number", NumberType::class, [
                "label" => "Numéro", 'attr' => array(
                'placeholder' => 'Le numéro du Pokémon'
            )])
            ->add("name", TextType::class, ["label" => "Nom"])
            ->add("area", TextType::class, ["label" => "Zone"]);
            /* ->add("shout", FileType::class, ["label" => "Cri", "attr" => [
                "required" => false
                ]])
            ->add("image", FileType::class, ["label" => "Image", "attr" => [
                "required" => false
            ]]); */
            //->add("type1", TextType::class, ["label" => "Image"])
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Pokemon::class
        ]);
    }
}