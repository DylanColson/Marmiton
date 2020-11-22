<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Recette;
use Attribute;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                "label"=> "Nom de la recette",
                "required"=> false,
                "attr" => [
                    "placeholder" => "Veuillez saisir le nom de la recette"
                ]
            ])
            ->add('resumer', TextType::class, [
                "label"=> "Resumer de la recette",
                "required"=> false,
                "attr" => [
                    "placeholder" => "Veuillez saisir un resumer de la recette"
                ]
            ])
            ->add('preparation',  TextType::class, [
                "label"=> "Préparation de la recette",
                "required"=> false,
                "attr" => [
                    "row"=> 8,
                    "placeholder" => "Veuillez saisir la preparation de la recette"
                ]
            ])
            ->add('temps', TextType::class, [
                "label"=> "Temps de la recette",
                "required"=> false,
                "attr" => [
                    "placholder"=>"Veuillez saisir le nombre de personne"
                ]
            ])
            ->add('personne', TextType::class, [
                "label"=> "Nombre de personne",
                "required"=> false,
                "attr" => [
                    "placeholder" => "Pour...."
                ]
            ])
            ->add('categorie', EntityType::class ,[
                "label"=>"Choix de catégorie",
                'class' => Categorie::class,
                'choice_label' => "nom",
            ])
            ->add('imageFile', FileType::class, [
                "label" => "Image de la recette",
                "required" => false
            ])
            //->add('createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
