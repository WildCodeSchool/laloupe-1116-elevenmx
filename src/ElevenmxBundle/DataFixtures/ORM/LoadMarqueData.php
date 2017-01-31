<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use ElevenmxBundle\Entity\Marque;

use Symfony\Component\HttpFoundation\File\File;


class LoadMarqueData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $marque1 = new Marque();
        $marque1->setNom('honda');
        $marque1->getImage('image1');

        $file1 = new File('src/ElevenmxBundle/Resources/public/img/honda_logo.jpg');
        $marque1->file1 = $file1;

        $this->addReference('tag_marque1', $marque1);
        $manager->persist($marque1);
        $manager->flush();



        $marque2 = new Marque();
        $marque2->setNom('yamaha');
        $marque2->getImage('image2');

        $file2 = new File('src/ElevenmxBundle/Resources/public/img/yamaha_logo.jpg');
        $marque2->file1 = $file2;

        $manager->persist($marque2);
        $manager->flush();



        $marque3 = new Marque();
        $marque3->setNom('suzuki');
        $marque3->getImage('image3');
        $file3 = new File('src/ElevenmxBundle/Resources/public/img/suzuki_logo.png');
        $marque3->file1 = $file3;
        $manager->persist($marque3);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}