<?php

namespace App\Service\Client;

use App\Exception\PlaylistRequestException;
use App\Service\Config\YoutubeConfig;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;

class YoutubeClient
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var YoutubeConfig
     */
    private $config;

    public function __construct(SerializerInterface $serializer, LoggerInterface $logger, YoutubeConfig $config)
    {
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->config = $config;
        $this->client = new Client(['base_uri' => $this->config->getBaseUri()]);
    }

    public function request(string $action, string $responseClass, array $params = [])
    {
        $params = array_merge([
            'key' => $this->config->getApiKey(),
        ], $params);

        try {
            $response = $this->client->request('GET', $action, ['query' => $params]);
        } catch (RequestException $e) {
            $this->logger->error('There was a problem getting the Youtube API Response.');
            throw new PlaylistRequestException('Unable to fetch videos from playlist');
        }

        $responseBody = (string) $response->getBody();

        return $this->serializer->deserialize($responseBody, $responseClass, 'json');
    }
}
