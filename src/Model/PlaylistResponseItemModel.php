<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class PlaylistResponseItemModel
{
    /**
     * @var YoutubeVideoResponseModel
     *
     * @Serializer\Type("App\Model\YoutubeVideoResponseModel")
     * @Serializer\SerializedName("snippet")
     */
    private $snippet;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("id")
     */
    private $youtubeId;

    public function getSnippet(): ?YoutubeVideoResponseModel
    {
        return $this->snippet;
    }

    public function setSnippet(?YoutubeVideoResponseModel $snippet): void
    {
        $this->snippet = $snippet;
    }

    public function getYoutubeId(): ?string
    {
        return $this->youtubeId;
    }

    public function setYoutubeId(?string $youtubeId): void
    {
        $this->youtubeId = $youtubeId;
    }
}
