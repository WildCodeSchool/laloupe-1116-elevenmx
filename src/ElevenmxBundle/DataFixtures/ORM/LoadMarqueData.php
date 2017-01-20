<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ElevenmxBundle\Entity\Marque;


class LoadMarqueData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $marque1 = new Marque();
        $marque1->setNom('honda');

        $manager->persist($marque1);
        $manager->flush();


        $marque2 = new Marque();
        $marque2->setNom('yamaha');

        $manager->persist($marque2);
        $manager->flush();


        $marque3 = new Marque();
        $marque3->setNom('susuki');

        $manager->persist($marque3);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}