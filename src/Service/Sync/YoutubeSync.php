<?php

namespace App\Service\Sync;

use App\Entity\YoutubeVideo;
use App\Model\PlaylistResponseItemModel;
use App\Provider\Youtube\VideosProvider;
use App\Repository\YoutubeVideoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class YoutubeSync
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var YoutubeVideoRepository
     */
    private $videoRepository;

    /**
     * @var VideosProvider
     */
    private $provider;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(YoutubeVideoRepository $videoRepository, VideosProvider $provider, EntityManagerInterface $em, LoggerInterface $logger)
    {
        $this->videoRepository = $videoRepository;
        $this->provider = $provider;
        $this->em = $em;
        $this->logger = $logger;
    }

    public function syncPlaylist(string $playlistId)
    {
        foreach ($this->provider->getVideosFromPlaylist($playlistId) as $item) {
            $this->processVideo($item);
        }

        $this->em->flush();
    }

    public function processVideo(PlaylistResponseItemModel $item)
    {
        $video = $this->videoRepository->findOneBy(['youtubeId' => $item->getYoutubeId()]);

        if (!$video instanceof YoutubeVideo) {
            $video = new YoutubeVideo();
            $video->setYoutubeId($item->getYoutubeId());
        }

        $video->setTitle($item->getSnippet()->getTitle());
        $video->setDescription($item->getSnippet()->getDescription());
        $video->setVideoId($item->getSnippet()->getResourceId()->getVideoId());

        $this->logger->info('Synced video {name}.', ['name' => $video->getTitle()]);
        $this->em->persist($video);
    }
}
