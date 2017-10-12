<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{CollectionType, TextType}
;
use Symfony\Component\Validator\Constraints\{NotBlank, Regex, Length};
use AppBundle\Form\QuestionType;

class FormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
            	'constraints' => array(
            		new NotBlank(),
            		new Length(array(
            			'min' => 6,
            			'max' => 20,
            			)),
            		new Regex(array(
            			'pattern' => '[A-Za-z0-9]',
            			'match' => false,
            			'message' => 'Invalid Characters',
            			))
            		)
            	)
        	)
            ->add('questions', CollectionType::class, array(
                'entry_type' => QuestionType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Form'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_form';
    }


}
