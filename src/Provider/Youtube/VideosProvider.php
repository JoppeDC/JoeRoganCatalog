<?php

namespace App\Provider\Youtube;

use App\Exception\PlaylistRequestException;
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

            try {
                /** @var PlaylistResponseModel $response */
                $response = $this->client->request('playlistItems', PlaylistResponseModel::class, ['part' => 'snippet,contentDetails', 'playlistId' => $playlistId, 'maxResults' => 50, 'pageToken' => $pageToken]);
            } catch (PlaylistRequestException $e) {
                return [];
            }

            $pageToken = $response->getNextPageToken();
            $videos = \array_merge($videos, $response->getItems());
            $hasMorePages = (null !== $pageToken);
        }

        return $videos;
    }
}
