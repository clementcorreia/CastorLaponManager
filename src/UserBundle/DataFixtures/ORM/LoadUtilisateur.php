<?php

namespace UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use UserBundle\Entity\Utilisateur;

/**
 * Generated by Webonaute\DoctrineFixtureGenerator.
 *
 */
class LoadUtilisateur extends AbstractFixture implements OrderedFixtureInterface
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Set loading order.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }


    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $manager->getClassMetadata(Utilisateur::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $encoder = $this->container->get('security.password_encoder');

        $item1 = new Utilisateur();
        $this->addReference('_reference_CEMUserBundleEntityUser1', $item1);
        $item1->setNom("Correia");
        $item1->setPrenom("Clément");
        $item1->setUsername("clement.correia");
        $item1->setUsernameCanonical("clement.correia");
        $item1->setEmail("clement.correia@epsi.fr");
        $item1->setEmailCanonical("clement.correia@epsi.fr");
        $item1->setEnabled(true);
        $item1->setPassword($encoder->encodePassword($item1, 'clement'));
        $item1->addRole('ROLE_ADMIN');

        $item2 = new Utilisateur();
        $this->addReference('_reference_CEMUserBundleEntityUser2', $item2);
        $item2->setNom("Pasquier");
        $item2->setPrenom("Léonard");
        $item2->setUsername("leonard.pasquier");
        $item2->setUsernameCanonical("leonard.pasquier");
        $item2->setEmail("leonard.pasquier@epsi.fr");
        $item2->setEmailCanonical("leonard.pasquier@epsi.fr");
        $item2->setEnabled(true);
        $item2->setPassword($encoder->encodePassword($item2, 'leonard'));
        $item2->addRole('ROLE_INTERVENANT');

        $item3 = new Utilisateur();
        $this->addReference('_reference_CEMUserBundleEntityUser3', $item3);
        $item3->setNom("Severin");
        $item3->setPrenom("Hugo");
        $item3->setUsername("hugo.severin");
        $item3->setUsernameCanonical("hugo.severin");
        $item3->setEmail("hugo.severin@epsi.fr");
        $item3->setEmailCanonical("hugo.severin@epsi.fr");
        $item3->setEnabled(true);
        $item3->setPassword($encoder->encodePassword($item3, 'hugo'));
        $item3->addRole('ROLE_INTERVENANT');

        $item4 = new Utilisateur();
        $this->addReference('_reference_CEMUserBundleEntityUser4', $item4);
        $item4->setNom("Maury");
        $item4->setPrenom("Thomas");
        $item4->setUsername("thomas.maury");
        $item4->setUsernameCanonical("thomas.maury");
        $item4->setEmail("thomas.maury@epsi.fr");
        $item4->setEmailCanonical("thomas.maury@epsi.fr");
        $item4->setEnabled(true);
        $item4->setPassword($encoder->encodePassword($item4, 'thomas'));
        $item4->addRole('ROLE_APPRENANT');

        $item5 = new Utilisateur();
        $this->addReference('_reference_CEMUserBundleEntityUser5', $item5);
        $item5->setNom("Guilhaumon");
        $item5->setPrenom("Arnaud");
        $item5->setUsername("arnaud.guilhaumon");
        $item5->setUsernameCanonical("arnaud.guilhaumon");
        $item5->setEmail("arnaud.guilhaumon@epsi.fr");
        $item5->setEmailCanonical("arnaud.guilhaumon@epsi.fr");
        $item5->setEnabled(true);
        $item5->setPassword($encoder->encodePassword($item5, 'arnaud'));
        $item5->addRole('ROLE_APPRENANT');

        $manager->persist($item1);
        $manager->persist($item2);
        $manager->persist($item3);
        $manager->persist($item4);
        $manager->persist($item5);

        $manager->flush();
    }

}
