<?php

namespace ElevenmxBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjetControllerTest extends WebTestCase
{

    /**
     * @return mixed
     */

    /*//debut dojo test
    public static function testlogin()
    {
        //debut dojo test
        $fixtures = array(
            'ElevenmxBundle\DataFixtures\ORM\LoadUserData',
            'ElevenmxBundle\DataFixtures\ORM\LoadProjetData'
        );
        $this->fixtures = $this->loadFixtures($fixtures, null, 'doctrine', true)->getReferenceRepository();

        $this->assertTrue($crawler->filter('form input[name="_username"]')->count() == 1);
        $this->assertTrue($crawler->filter('form input[name="_password"]')->count() == 1);

        $form = $crawler->selectButton('Se Connecter')->form();
        $form['_username'] = 'user';
        $form['_password'] = 'test';
        $crawler = $user->submit($form);



        // Il faut suivre la redirection
        $this->assertEquals(302, $user->getResponse()->getStatusCode());
        $crawler = $user->followRedirect();
        $this->assertEquals('Application\Src\ElevenmxBundle\Controller\Projetcontroler::indexAction', $user->getRequest()->attributes->get('_controller'));

        $user = static::createUser(array(),array(
            'PHP_AUTH_USER' => 'user',
            'PHP_AUTH_PW' => 'test'
        ));


        $this->assertEquals(true,true);
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
    }

    */
}
