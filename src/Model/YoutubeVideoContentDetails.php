<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class YoutubeVideoContentDetails
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("videoId")
     */
    private $videoId;

    /**
     * @var \DateTime
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("videoPublishedAt")
     */
    private $publishedAt;

    public function getVideoId(): ?string
    {
        return $this->videoId;
    }

    public function setVideoId(?string $videoId): void
    {
        $this->videoId = $videoId;
    }

    public function getPublishedAt(): ?string
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?string $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }
}
