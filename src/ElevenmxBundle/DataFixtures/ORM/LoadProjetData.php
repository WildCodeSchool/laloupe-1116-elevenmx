<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ElevenmxBundle\Entity\Projet;


class LoadProjetData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $projet1 = new Projet();
        $projet1->setTitreProjet('$projet1');
        $projet1->setProduit('Moto');
        $projet1->setMarque1('Honda');
        $projet1->setNomGraphiste('graphiste');
        $projet1->setStatus('Attente d\'information');
        $projet1->setUser();

        $manager->persist($projet1);
        $manager->flush();


        $projet2 = new Projet();
        $projet2->setTitreProjet('$projet2');
        $projet2->setProduit('Casque');
        $projet2->setMarque1('Yamaha');
        $projet2->setNomGraphiste('graphiste2');
        $projet2->setStatus('Attente d\'information');
        $projet2->setUser();

        $manager->persist($projet2);
        $manager->flush();


        $projet3 = new Projet();
        $projet3->setTitreProjet('$projet3');
        $projet3->setProduit('Combi');
        $projet3->setMarque1('BMW');
        $projet3->setNomGraphiste('graphiste');
        $projet3->setStatus('Attente d\'information');
        $projet3->setUser();

        $manager->persist($projet3);
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}