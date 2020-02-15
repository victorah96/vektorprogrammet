<?php

namespace AppBundle\Form\Type;


use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CubeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('length', IntegerType::class, array(
                'label' => 'Skriv inn lengden',
                'required' => true,
            ));
    }

}
