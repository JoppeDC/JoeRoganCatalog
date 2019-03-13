<?php

declare(strict_types=1);

namespace App\Tests\Provider\Youtube;

use App\Provider\Youtube\VideosProvider;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class VideosProviderTest extends KernelTestCase
{
	/**
	 * @var VideosProvider
	 */
	private $provider;

	protected function setUp()
	{
		self::bootKernel();
		$this->provider = self::$container->get(VideosProvider::class);
	}
	public function testProvider(): void
	{
		$videos = $this->provider->getVideosFromPlaylist('UUzQUP1qoWDoEbmsQxvdjxgQ');

		$this->assertGreaterThan('0', \count($videos), 'Could not retrieve videos from playlist.');
	}
}
