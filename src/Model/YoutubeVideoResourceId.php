<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class YoutubeVideoResourceId
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("videoId")
     */
    private $videoId;

    public function getVideoId(): ?string
    {
        return $this->videoId;
    }

    public function setVideoId(?string $videoId): void
    {
        $this->videoId = $videoId;
    }
}
