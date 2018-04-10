<?php

namespace CLMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisponibiliteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('lundiDebut')->add('lundiFin')->add('mardiDebut')->add('mardiFin')->add('mercrediDebut')->add('mercrediFin')->add('jeudiDebut')->add('jeudiFin')->add('vendrediDebut')->add('vendrediFin')->add('samediDebut')->add('samediFin')->add('dimancheDebut')->add('dimancheFin')->add('intervenant');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CLMBundle\Entity\Disponibilite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clmbundle_disponibilite';
    }


}
