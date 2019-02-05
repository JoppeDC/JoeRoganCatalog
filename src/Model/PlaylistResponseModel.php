<?php

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class PlaylistResponseModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("nextPageToken")
     */
    private $nextPageToken;

    /**
     * @var PlaylistResponseItemModel[]
     *
     * @Serializer\Type("array<App\Model\PlaylistResponseItemModel>")
     * @Serializer\SerializedName("items")
     */
    private $items;

    public function getNextPageToken(): ?string
    {
        return $this->nextPageToken;
    }

    public function setNextPageToken(?string $nextPageToken): void
    {
        $this->nextPageToken = $nextPageToken;
    }

    public function getItems(): ?array
    {
        return $this->items;
    }

    public function setItems(?array $items): void
    {
        $this->items = $items;
    }
}
