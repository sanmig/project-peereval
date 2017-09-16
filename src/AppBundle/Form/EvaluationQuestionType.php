<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\{CollectionType};
use AppBundle\Form\{EvaluationFormType, QuestionMainType, UserMainType};

class EvaluationQuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('users', CollectionType::class, array(
                'entry_type' => UserMainType::class
            ))
            ->add('forms', CollectionType::class, array(
                'entry_type' => EvaluationFormType::class
            ))
        	->add('questions', CollectionType::class, array(
        		'entry_type' => QuestionMainType::class,
        	));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EvaluationQuestion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_evaluationquestion';
    }


}
