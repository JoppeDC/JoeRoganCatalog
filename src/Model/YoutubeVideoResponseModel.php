<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class YoutubeVideoResponseModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("title")
     */
    private $title;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("description")
     */
    private $description;

    /**
     * @var ThumbnailsResponseModel
     *
     * @Serializer\Type("App\Model\ThumbnailsResponseModel")
     * @Serializer\SerializedName("thumbnails")
     */
    private $thumbnails;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getThumbnails(): ?ThumbnailsResponseModel
    {
        return $this->thumbnails;
    }

    public function setThumbnails(?ThumbnailsResponseModel $thumbnails): void
    {
        $this->thumbnails = $thumbnails;
    }
}
