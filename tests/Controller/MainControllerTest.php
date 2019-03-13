<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MainControllerTest extends WebTestCase
{
	public function testIndex()
	{
		$client = static::createClient();

		$client->request('GET', '/');

		$this->assertEquals(200, $client->getResponse()->getStatusCode());
	}

	public function testRandom()
	{
		$client = static::createClient();

		$client->request('GET', '/random');

		$this->assertEquals(200, $client->getResponse()->getStatusCode());
	}
}
