<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ElevenmxBundle\Entity\Projet;
use ElevenmxBundle\Entity\User;
class LoadProjetData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $projet1 = new Projet();
        $projet1->setTitreProjet('$projet1');
        $projet1->setClient('user');
        $projet1->setProduit('Moto');
        $projet1->setMarque('Honda');
        $projet1->setNomGraphiste('graphiste');
        $projet1->setStatus('Attende d\'information');
        $projet1->setUser();

        $manager->persist($projet1);
        $manager->flush();


        $projet2 = new Projet();
        $projet2->setTitreProjet('$projet2');
        $projet2->setClient('user2');
        $projet2->setProduit('Casque');
        $projet2->setMarque('Yamaha');
        $projet2->setNomGraphiste('graphiste2');
        $projet2->setStatus('Attende d\'information');
        $projet2->setUser();

        $manager->persist($projet2);
        $manager->flush();


        $projet3 = new Projet();
        $projet3->setTitreProjet('$projet3');
        $projet3->setClient('user3');
        $projet3->setProduit('Combi');
        $projet3->setMarque('BMW');
        $projet3->setNomGraphiste('graphiste');
        $projet3->setStatus('Attende d\'information');
        $projet3->setUser();

        $manager->persist($projet3);
        $manager->flush();
    }
}