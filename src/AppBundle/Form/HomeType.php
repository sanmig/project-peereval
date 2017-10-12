<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\{NotBlank, Regex, Length};

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
                    new Length(array(
                        'min' => 6)),
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
