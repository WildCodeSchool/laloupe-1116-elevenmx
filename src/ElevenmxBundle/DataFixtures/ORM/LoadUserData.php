<?php


namespace ElevenmxBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ElevenmxBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('user');
        $user->setPassword('test');
        $user->setNom('Descavernes');
        $user->setPrenom('Java');
        $user->setTelephone('0987654321');
        $user->setEntreprise('Caverneux');
        $user->setEmail('javadescavernes38@gmail.com');
        $user->setRoles(array('ROLE_USER'));


        $user2 = new User();
        $user2->setUsername('user2');
        $user2->setPassword('test2');
        $user2->setNom('Descavernes2');
        $user2->setPrenom('Java2');
        $user2->setTelephone('0123456789');
        $user2->setEntreprise('Caverneux2');
        $user2->setEmail('javadescavernes2@gmail.com');
        $user2->setRoles(array('ROLE_USER'));



        $graphiste = new User();
        $graphiste->setUsername('Graphiste');
        $graphiste->setPassword('Graphiste');
        $graphiste->setNom('Graphiste');
        $graphiste->setPrenom('Graphiste');
        $graphiste->setTelephone('0987654321');
        $graphiste->setEntreprise('Graphisteux');
        $graphiste->setEmail('Graphiste38@gmail.com');
        $graphiste->setRoles(array('ROLE_GRAPH'));


        $graphiste2 = new User();
        $graphiste2->setUsername('Graphiste2');
        $graphiste2->setPassword('Graphiste2');
        $graphiste2->setNom('Graphiste2');
        $graphiste2->setPrenom('Graphiste2');
        $graphiste2->setTelephone('0123456789');
        $graphiste2->setEntreprise('Graphisteux');
        $graphiste2->setEmail('Graphiste2@gmail.com');
        $graphiste2->setRoles(array('ROLE_GRAPH'));


        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword('admin');
        $admin->setNom('admin');
        $admin->setPrenom('admin');
        $admin->setTelephone('0987654321');
        $admin->setEntreprise('admineux');
        $admin->setEmail('admin@gmail.com');
        $admin->setRoles(array('ROLE_ADMIN'));


        $admin2 = new User();
        $admin2->setUsername('$admin2');
        $admin2->setPassword('$admin2');
        $admin2->setNom('$admin2');
        $admin2->setPrenom('$admin2');
        $admin2->setTelephone('0123456789');
        $admin2->setEntreprise('$admineux2');
        $admin2->setEmail('$admin2@gmail.com');
        $admin2->setRoles(array('ROLE_ADMIN'));

        $manager->persist($user,$user2,$graphiste,$graphiste2,$admin,$admin2);
        $manager->flush();
    }
}