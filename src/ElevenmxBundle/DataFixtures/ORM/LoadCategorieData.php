<?php

namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ElevenmxBundle\Entity\Categorie;


class LoadCategorieData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categorie1 = new Categorie();
        $categorie1->setCategorie('Client');

        $manager->persist($categorie1);

        $categorie2 = new Categorie();
        $categorie2->setCategorie('Graphiste');

        $manager->persist($categorie2);

        $categorie3 = new Categorie();
        $categorie3->setCategorie('Admin');

        $manager->persist($categorie3);



        $manager->flush();

        $this->addReference('Client', $categorie1);
        $this->addReference('Graphiste', $categorie2);
        $this->addReference('Admin', $categorie3);
    }

    public function getOrder()
    {
        return 1;
    }
}