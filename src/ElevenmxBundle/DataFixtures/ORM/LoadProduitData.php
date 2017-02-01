<?php
/*

namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ElevenmxBundle\Entity\Produit;


class LoadProduitData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produit1 = new Produit();
        $produit1->setNom('gant');
        $produit1->setGoogleform('google form inexistant');
        $this->addReference('tag_produit1', $produit1);
        $manager->persist($produit1);
        $manager->flush();


        $produit2 = new Produit();
        $produit2->setNom('casque');
        $produit2->setGoogleform('google form inexistant');

        $manager->persist($produit2);
        $manager->flush();


        $produit3 = new Produit();
        $produit3->setNom('combinaison');
        $produit3->setGoogleform('google form inexistant');

        $manager->persist($produit3);
        $manager->flush();



    }

    public function getOrder()
    {
        return 2;
    }
}*/
