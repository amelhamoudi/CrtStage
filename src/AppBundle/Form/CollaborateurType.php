<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class CollaborateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    if($options['edit']) {
            $builder
                ->add('imageFile', VichImageType::class,['required'=>false]);
            }
            else {
            $builder
                ->add('imageFile', VichImageType::class);
        	}
        $builder
        ->add('nomCollaborateur')->add('emailCollaborateur')->add('telCollaborateur')->add('specification');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Collaborateur',
            'edit'=>''

        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_collaborateur';
    }


}
