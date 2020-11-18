<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username')
        ->add('apellido')
        ->add('nombre')
                ->add('plainPassword', 
                      RepeatedType::class,
                      ['type' => PasswordType::class,
                       'required' => true,
                        'first_options'  => ['label' => 'Password'],
                        'second_options' => ['label' => 'Reingresar Password']
                        ])
                ->add('roles', ChoiceType::class, array(
                    'choices' => 
                    array
                    (
                        'Responsable de Trafico' => 'ROLE_RESPONSABLE_TRAFICO',
                        'Responsable de Diagramacion' => 'ROLE_RESPONSABLE_DIAGRAMACION',
                        'Operador' => 'ROLE_OPERADOR',
                        'Administrador' => 'ROLE_SUPER_ADMIN',
                    ) 
                    ,
                    'required' => true,
                    )
                )
                ->add('registrar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuario';
    }


}
