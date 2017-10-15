<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegisterControllerTest extends WebTestCase
{
	public function testRegisterForm()
	{
		$client = static::createClient();

        $crawler = $client->request('GET', '/admin/register');

        $buttonTest = $crawler->selectButton('submit');

        $form = $buttonTest->form();

        $client->submit($form);
	}
}
