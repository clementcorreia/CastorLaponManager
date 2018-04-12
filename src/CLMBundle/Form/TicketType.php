<?php

namespace CLMBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $repo = $options['repo'];
        $builder->add('titre')
                ->add('projet')
                ->add('contenu')
                ->add('competences')
                ->add('dureeValidite',null, array(
                    'label' => 'Durée validitée (en jours)'
                ))
                ->add('recepteur', EntityType::class, [
                    'label'        => 'Destinataire',
                    'class'        => 'UserBundle:Utilisateur',
                    'choice_label' => 'fullname',
                    'multiple'     => true,
                    'attr'         => ['class' => 'select2'],
                    'required'     => false,
                    'query_builder' => function () use($repo) {
                        return $repo->createQueryBuilder('u')
                            ->where('u.username != :username')
                            ->andWhere('u.enabled = 1')
                            ->andWhere('u.roles LIKE :roles')
                            ->orWhere('u.roles LIKE :roles2')
                            ->setParameters([
                                'username'  =>'admin',
                                'roles' => "%ROLE_INTERVENANT%",
                                'roles2' => "%ROLE_ADMIN%",
                            ]);
                    },
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CLMBundle\Entity\Ticket',
            'repo' => null,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clmbundle_ticket';
    }


}
