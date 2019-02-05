<?php

namespace App\Service\Config;

class YoutubeConfig
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $baseUri;

    public function __construct(string $apiKey, string $baseUri)
    {
        $this->apiKey = $apiKey;
        $this->baseUri = $baseUri;
    }

    public function getApiKey(): ?string
    {
        return $this->apiKey;
    }

    public function setApiKey(?string $apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    public function setBaseUri(?string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }
}
