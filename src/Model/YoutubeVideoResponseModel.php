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
     * @var YoutubeVideoResourceId
     *
     * @Serializer\Type("App\Model\YoutubeVideoResourceId")
     * @Serializer\SerializedName("resourceId")
     */
    private $resourceId;

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

    public function getResourceId(): ?YoutubeVideoResourceId
    {
        return $this->resourceId;
    }

    public function setResourceId(?YoutubeVideoResourceId $resourceId): void
    {
        $this->resourceId = $resourceId;
    }
}
