<?php

namespace NFQ\Akademija\WallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content')
            ->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'NFQ\Akademija\WallBundle\Entity\Post'
            )
        );
    }

    public function getName()
    {
        return 'nfq_akademija_wallbundle_posttype';
    }
}
