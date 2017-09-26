<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\{StudentType,AnswerType};

class FormAnswerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('students', CollectionType::class, array(
        	'entry_type' => StudentType::class,
        	'allow_add' => true,
        	'allow_delete' => true,
        	'by_reference' => false,
        ))
        ->add('answers', CollectionType::class, array(
        	'entry_type' => AnswerType::class,
        	'allow_add' => true,
        	'allow_delete' => true,
        	'by_reference' => false,
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FormAnswer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formanswer';
    }


}
