<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EvaluationAnswerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', CollectionType::class, array(
                'entry_type' => QuestionMainType::class)
            )
            ->add('answer', ChoiceType::class, array(
        	'mapped' => false,
        	'choice_label' => false,
        	'choices' => array(
        		'1' => '1',
        		'2' => '2',
        		'3' => '3',
        		'4' => '4',
        		'5' => '5',
        		),
        	'expanded' => true,
        	'multiple' => false,
        	)
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EvaluationAnswer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_evaluationanswer';
    }


}
