<?php

namespace GestionBundle\Form\trafico;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ServicioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
                ->add('latitudOrigen')
                ->add('longitudOrigen')
                ->add('latitudDestino')
                ->add('longitudDestino')
                ->add('sentido')
                ->add('tipoServicio')
                ->add('requiereUnidadHabilitada')
                ->add('admiteFletero')
                ->add('cierreAutomatico')
                ->add('cliente')
                ->add('origen')
                ->add('destino')
                ->add('estructura', 
                      EntityType::class,                      
                      ['class' => 'AppBundle\Entity\Estructura',
                       'choices' => $options['usuario']->getEstructuras()])
                ->add('frecuencia')
                ->add('tipoHabilitacion')
                ->add('tiposUnidadPermitidos')
                ->add('tiposMotorPermitidos')
                ->add('tiposSuspensionPermitidos')
                ->add('guardar', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GestionBundle\Entity\trafico\Servicio'
        ));
        $resolver->setRequired('usuario');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestionbundle_trafico_servicio';
    }


}
