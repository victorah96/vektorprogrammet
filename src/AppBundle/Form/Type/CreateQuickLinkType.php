<?php
/**
 * Created by IntelliJ IDEA.
 * User: victoria
 * Date: 25.10.19
 * Time: 17:49
 */

namespace AppBundle\Form\Type;
use AppBundle\Entity\Repository\SemesterRepository;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use AppBundle\Utils\SemesterUtil;

class CreateQuickLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array(
            'label' => 'Navn på Quicklink:',
            'attr' => array('placeholder' => 'Fyll inn tittel'),
        ))
        ->add('url', TextType::class, array(
            'label' => 'Link:',
            'attr' => array('placeholder' => 'Fyll inn link til quicklink her'),
        ))
            ->add('iconUrl', FileType::class, array(
                'required' => false,
                'error_bubbling' => true,
                'data_class' => null,
                'label' => 'Last opp ny logo',
            ))

        ->add('save', SubmitType::class);
    }


}