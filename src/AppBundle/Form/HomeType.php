<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\{NotBlank, Regex, Length, Type};

class HomeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, array(
                'label' => false,
                'constraints' => array(
                    new NotBlank(),
                    new Type(array(
                    	'type' => 'string'
                    )),
                    new Length(array(
                        'min' => 4,
                        'max' => 4,
                    )),
                    new Regex(array(
                        'pattern' => '/\d/',
                        'match' => true,
                        'message' => "Numbers only"
                    ))
                )
            )
        );
    }
}
