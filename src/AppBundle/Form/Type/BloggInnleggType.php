<?php


namespace AppBundle\Form\Type;


use Doctrine\DBAL\Types\StringType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BloggInnleggType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('overskrift', TextType::class, array(
                'label' => 'Skriv overskrift',
                'required' => true,
            ))
            ->add('innlegg', TextType::class, array(
                'label' => 'Skriv innlegg',
                'required' => true,
            ));


    }
}