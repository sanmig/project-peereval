<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $buttonTest = $crawler->selectButton('submit');

        $form = $buttonTest->form();

        $data = array(
        	'username' => 'peereval',
        	'password' => 'peereval123'
        );

        $client->submit($form,$data);

        $crawler = $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
    }
}
