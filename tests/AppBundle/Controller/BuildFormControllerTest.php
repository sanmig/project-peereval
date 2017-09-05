<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BuildFormControllerTest extends WebTestCase
{
    public function testDiy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/diy');
    }

    public function testPre()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pre');
    }

}
