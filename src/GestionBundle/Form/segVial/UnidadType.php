<?php

namespace GestionBundle\Form\segVial;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class UnidadType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];

        $builder->add('interno')
                ->add('tipoUnidad')
                ->add('propietario')                
                ->add('dominioAnterior')
                ->add('dominioNuevo')
                ->add('guardar', SubmitType::class);
                
        if (($user->getPerfil()) && ($user->getPerfil()->getPerfil() == 'PERFIL_SEGVIAL'))
        {
            $builder->add('chasisModelo', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('chasisMarca', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('fechaInscripcion', 
                           DateType::class, 
                           ['widget' => 'single_text',
                            'constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('anioModelo', 
                            IntegerType::class, 
                            ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])                  
                    ->add('chasisNumero', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('radicacion', 
                          EntityType::class, 
                          [
                            'class' => 'GestionBundle:ventas\Provincia',
                            'constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('capacidadTanque', 
                            IntegerType::class, 
                            ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('cantidadTanques', 
                            IntegerType::class, 
                            ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])

                    ->add('tipoMotor',
                          EntityType::class, 
                          [
                            'class' => 'GestionBundle:segVial\opciones\TipoMotor',
                            'constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('motorMarca', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('motorNumero', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('consumo')

                    ->add('calidadUnidad')
                    ->add('carroceriaMarca', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('carroceriaModelo', 
                          TextType::class, 
                          ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('capacidadReal', 
                            IntegerType::class, 
                            ['constraints' => [new NotBlank(['message'=>'El campo no puede permanecer en blanco'])]])
                    ->add('capacidadCNRT', 
                            IntegerType::class)


                    
                    ->add('audioVideo')
                    ->add('banio')
                    ->add('bar')
                    ->add('color')
                    ->add('ploteo')
                    ->add('carteleraElectronica')
                    ->add('habilitaciones')
                    ->add('pcABordo');
        }

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\segVial\Unidad'
        ))
        ->setRequired('user');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_segvial_unidad';
    }


}
