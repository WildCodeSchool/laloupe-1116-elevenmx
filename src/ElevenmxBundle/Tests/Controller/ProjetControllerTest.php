<?php

namespace ElevenmxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjetControllerTest extends WebTestCase
{

    /**
     * @return mixed
     */

    //debut dojo test
    public function testlogin()
    {
        //debut dojo test
        $fixtures = array(
            'ElevenmxBundle\DataFixtures\ORM\LoadUserData',
            'ElevenmxBundle\DataFixtures\ORM\LoadProduitData',
            'ElevenmxBundle\DataFixtures\ORM\LoadMarqueData',
            'ElevenmxBundle\DataFixtures\ORM\LoadGestionstatusData',
            'ElevenmxBundle\DataFixtures\ORM\LoadProjetData',
        );

        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        //$this->assertTrue($crawler->filter('html:contains("Hello Fabien")')->count() > 0);
        $this->assertTrue($crawler->filter('form input[name="_username"]')->count() == 1);
        $this->assertTrue($crawler->filter('form input[name="_password"]')->count() == 1);

        // Sélection basée sur la valeur, l'id ou le nom des boutons
//        $form = $crawler->selectButton('Se connecter')->form();
        $form['_username'] = 'ludo';
        $form['_password'] = 'ludo';

        // Sélection basée sur la valeur, l'id ou le nom des boutons
        $form = $crawler->selectButton('Se connecter')->form();

        $crawler = $client->submit($form);

        // Il faut suivre la redirection
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $crawler = $client->followRedirect();
        $this->assertEquals('ElevenmxBundle\Controller\DefaultController::indexAction', $client->getRequest()->attributes->get('_controller'));



//        $client = static::createClient();
//        $crawler = $client->request('GET', '/Projet/new');


    }


    //fin dojo test*/
    
/*
    public function testCompleteScenario()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/projet/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /projet/");
        $crawler = $client->click($crawler->selectLink('Create a new entry')->link());

        // Fill in the form and submit it
        $form = $crawler->selectButton('Create')->form(array(
            'elevenmxbundle_projet[field_name]'  => 'Test',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check data in the show view
        $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');

        // Edit the entity
        $crawler = $client->click($crawler->selectLink('Edit')->link());

        $form = $crawler->selectButton('Update')->form(array(
            'elevenmxbundle_projet[field_name]'  => 'Foo',
            // ... other fields to fill
        ));

        $client->submit($form);
        $crawler = $client->followRedirect();

        // Check the element contains an attribute with value equals "Foo"
        $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');

        // Delete the entity
        $client->submit($crawler->selectButton('Delete')->form());
        $crawler = $client->followRedirect();

        // Check the entity has been delete on the list
        $this->assertNotRegExp('/Foo/', $client->getResponse()->getContent());
    }*/


}
