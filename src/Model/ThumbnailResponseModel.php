<?php

declare(strict_types=1);

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class ThumbnailResponseModel
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("url")
     */
    private $url;

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }
}
