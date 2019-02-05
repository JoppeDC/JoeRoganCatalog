<?php

namespace App\Provider\Youtube;

use App\Model\PlaylistResponseModel;
use App\Service\Client\YoutubeClient;
use Psr\Log\LoggerInterface;

class VideosProvider
{
    /**
     * @var YoutubeClient
     */
    private $client;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(YoutubeClient $client, LoggerInterface $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    public function getVideosFromPlaylist(string $playlistId)
    {
        $pageToken = '';
        $videos = [];
        $hasMorePages = true;

        while ($hasMorePages) {
            $this->logger->info('Retrieving Page...');

            /** @var PlaylistResponseModel $response */
            $response = $this->client->request('playlistItems', PlaylistResponseModel::class, ['part' => 'snippet,contentDetails', 'playlistId' => $playlistId, 'maxResults' => 50, 'pageToken' => $pageToken]);

            $pageToken = $response->getNextPageToken();
            $videos = \array_merge($videos, $response->getItems());
            $hasMorePages = (null !== $pageToken);
        }

        return $videos;
    }
}
