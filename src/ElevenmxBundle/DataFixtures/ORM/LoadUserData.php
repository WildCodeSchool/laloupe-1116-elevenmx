<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ElevenmxBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

//    ****************************   datafixtures create fake-users
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('user');
        $user->setPlainPassword('test');
        $user->setNom('Descavernes');
        $user->setPrenom('Java');
        $user->setCategorie('client');
        $user->setTelephone('0987654321');
        $user->setEntreprise('Caverneux');
        $user->setEmail('javadescavernes38@gmail.com');
        $user->setRoles(array('ROLE_USER'));
        $user->setEnabled(1);

        $manager->persist($user);
        $manager->flush();


        $graphiste = new User();
        $graphiste->setUsername('Graphiste');
        $graphiste->setPlainPassword('Graphiste');
        $graphiste->setNom('Graphiste');
        $graphiste->setPrenom('Graphiste');
        $graphiste->setCategorie('graphiste');
        $graphiste->setTelephone('0987654321');
        $graphiste->setEntreprise('Graphisteux');
        $graphiste->setEmail('Graphiste38@gmail.com');
        $graphiste->setRoles(array('ROLE_GRAPH'));
        $graphiste->setEnabled(1);

        $manager->persist($graphiste);
        $manager->flush();


        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPlainPassword('admin');
        $admin->setNom('admin');
        $admin->setPrenom('admin');
        $admin->setCategorie('admin');
        $admin->setTelephone('0987654321');
        $admin->setEntreprise('admineux');
        $admin->setEmail('admin@gmail.com');
        $admin->setRoles(array('ROLE_ADMIN'));
        $admin->setEnabled(1);

        $manager->persist($admin);
        $manager->flush();
        
    }

    public function getOrder()
    {
        return 1;
    }
}