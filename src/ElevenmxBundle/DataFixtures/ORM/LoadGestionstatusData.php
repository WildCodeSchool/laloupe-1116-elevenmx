<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ElevenmxBundle\Entity\Gestionstatus;


class LoadDGestionstatusData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $gestionstatus1 = new Gestionstatus();
        $gestionstatus1->setStatut('Attente d\'information');
        $this->addReference('tag_gestionstatus1', $gestionstatus1);
        $manager->persist($gestionstatus1);
        $manager->flush();


        $gestionstatus2 = new Gestionstatus();
        $gestionstatus2->setStatut('Maquette a faire');
        $manager->persist($gestionstatus2);
        $manager->flush();


        $gestionstatus3 = new Gestionstatus();
        $gestionstatus3->setStatut('Maquette en attente de validation');
        $manager->persist($gestionstatus3);
        $manager->flush();


        $gestionstatus4 = new Gestionstatus();
        $gestionstatus4->setStatut('Maquette a modifier');
        $manager->persist($gestionstatus4);
        $manager->flush();


        $gestionstatus5 = new Gestionstatus();
        $gestionstatus5->setStatut('Maquette validée');
        $manager->persist($gestionstatus5);
        $manager->flush();


        $gestionstatus6 = new Gestionstatus();
        $gestionstatus6->setStatut('Attente d\'information');
        $manager->persist($gestionstatus6);
        $manager->flush();


        $gestionstatus7 = new Gestionstatus();
        $gestionstatus7->setStatut('Projet terminé');
        $manager->persist($gestionstatus7);
        $manager->flush();


    }

    public function getOrder()
    {
        return 4;
    }
}