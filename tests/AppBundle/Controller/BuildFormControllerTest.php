<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BuildFormControllerTest extends WebTestCase
{
    public function testDiyPage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/dashboard/build-form/diy-form');

        $buttonTest = $crawler->selectButton('submit');

        $form = $buttonTest->form();

        $client->submit($form);
    }

    public function testDiyQuestionsAdd()
    {
    	$client = static::createClient();

        $crawler = $client->request('GET', '/dashboard/build-form/diy-form');

        $form = $crawler->filter('button')->form();

        $values = $form->getPhpValues();

        $values['form']['questions'][0]['question'] = 'test 1';
		$values['form']['questions'][1]['question'] = 'test 2';

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        $this->assertEquals(2, $crawler->filter('ul.tags > li')->count());
    }

    public function testDiyQuestionsRemove()
    {
    	$client = static::createClient();

        $crawler = $client->request('GET', '/dashboard/build-form/diy-form');

        $form = $crawler->filter('button')->form();

        $values = $form->getPhpValues();

        unset($values['form']['questions'][0]);

        $crawler = $client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());

        $this->assertEquals(0, $crawler->filter('ul.tags > li')->count());
    }

    public function testPre()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/pre');
    }

    public function testFormBuild()
    {
    	$client = static::createClient();

        $crawler = $client->request('GET', '/dashboard/build-form/form/{id}');
    }

}
