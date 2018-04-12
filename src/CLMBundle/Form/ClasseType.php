<?php

namespace CLMBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $repo = $options['repo'];
        $builder->add('nom')
                ->add('campus')
                ->add('apprenants', EntityType::class, [
                    'label'        => 'Apprenants',
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
                            ->setParameters([
                                'username'  =>'admin',
                                'roles' => "%ROLE_APPRENANT%",
                            ]);
                    },
                ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CLMBundle\Entity\Classe',
            'repo' => null,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clmbundle_classe';
    }


}
