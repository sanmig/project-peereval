<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Entity\{Form,Person};
use Doctrine\Common\Persistence\{ObjectManager,ObjectRepository};

class EvaluateControllerTest extends WebTestCase
{
	public function testTokenForm()
	{
		$client = static::createClient();

        $crawler = $client->request('GET', '/{token}');

        $buttonTest = $crawler->selectButton('submit');

        $form = $buttonTest->form();

        $client->submit($form);
	}

	public function testTokenEntity()
	{
		$person = new Person();
		$person->setToken(1000);

		$personRepository = $this->createMock(ObjectRepository::class);

		$personRepository->expects($this->any())
			->method('find')
			->willReturn($person);

		$objectManager = $this->createMock(ObjectManager::class);

		$objectManager->expects($this->any())
			->method('getRepository')
			->willReturn($personRepository);
	}

	public function testUniqueCodeForm()
	{
		$client = static::createClient();

        $crawler = $client->request('GET', '/form/{uniqueCode}');

        $buttonTest = $crawler->selectButton('submit');

        $form = $buttonTest->form();

        $client->submit($form);
	}

	public function testUniqueCodeEntity()
	{	
		$uniqueCode = '03af96096303be9a4d62252286b7a2a0';
		$person = new Person();
		$person->setToken($uniqueCode);

		$personRepository = $this->createMock(ObjectRepository::class);

		$personRepository->expects($this->any())
			->method('find')
			->willReturn($person);

		$objectManager = $this->createMock(ObjectManager::class);

		$objectManager->expects($this->any())
			->method('getRepository')
			->willReturn($personRepository);
	}
}
