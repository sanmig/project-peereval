<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\{AnswerMainType, QuestionMainType};
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EvaluationAnswerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question', CollectionType::class, array(
                'entry_type' => QuestionMainType::class,
                'entry_options' => array(
                    'attr' => ['readonly' => true],)
            ))
            ->add('answer', CollectionType::class, array(
                'entry_type' => AnswerMainType::class,
                'required' => true,
            ));
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
