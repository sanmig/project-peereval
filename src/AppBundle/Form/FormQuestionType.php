<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Form\QuestionType;

class FormQuestionType extends AbstractType
{

	/**
     * {@inheritdoc}
     */
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('questions', CollectionType::class, array(
        		'entry_type' => QuestionType::class,
                'allow_add' => true,
                'by_reference' => false,
        	));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FormQuestion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formquestion';
    }


}
