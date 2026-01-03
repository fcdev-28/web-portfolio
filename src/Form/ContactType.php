<?php

namespace App\Form;

use App\Entity\ContactMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'contact.name.label', 
                'placeholder' => 'contact.name.placeholder',
                'required' => true
            ])
            ->add('email', EmailType::class, [
                'label' => 'contact.email.label',
                'placeholder' => 'contact.email.placeholder',
                'required' => true
            ])
            ->add('subject', TextType::class, [
                'label' => 'contact.subject.label',
                'placeholder' => 'contact.subject.placeholder',
                'required' => true
            ])
            ->add('message', TextareaType::class, [
                'label' => 'contact.message.label',
                'placeholder' => 'contact.message.placeholder',
                'required' => true
            ])
            ->add('created', HiddenType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactMessage::class,
        ]);
    }
}
