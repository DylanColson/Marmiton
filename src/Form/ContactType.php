<?php 

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('surname', TextType::class, [
                    "label" => "Votre nom",
                    "required" => true
                ])
                ->add('name', TextType::class, [
                    "label" => "Votre prénom",
                    "required" => true
                ])
                ->add('mail', EmailType::class, [
                    "label" => "Votre mail",
                    "required" => true
                ])
                ->add('message', TextareaType::class, [
                    "label" => "Votre message",
                    "required" => true
                ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

}

?>