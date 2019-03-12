<?php

declare(strict_types=1);

namespace App\Model;

use JMS\Serializer\Annotation as Serializer;

class ThumbnailsResponseModel
{
    /**
     * @var ThumbnailResponseModel
     *
     * @Serializer\Type("App\Model\ThumbnailResponseModel")
     * @Serializer\SerializedName("maxres")
     */
    private $maxres;

    /**
     * @var ThumbnailResponseModel
     *
     * @Serializer\Type("App\Model\ThumbnailResponseModel")
     * @Serializer\SerializedName("default")
     */
    private $default;

    /**
     * @var ThumbnailResponseModel
     *
     * @Serializer\Type("App\Model\ThumbnailResponseModel")
     * @Serializer\SerializedName("medium")
     */
    private $medium;

    /**
     * @var ThumbnailResponseModel
     *
     * @Serializer\Type("App\Model\ThumbnailResponseModel")
     * @Serializer\SerializedName("high")
     */
    private $high;

    /**
     * @var ThumbnailResponseModel
     *
     * @Serializer\Type("App\Model\ThumbnailResponseModel")
     * @Serializer\SerializedName("standard")
     */
    private $standard;

    public function getHighestRes(): ?ThumbnailResponseModel
    {
        if ($this->maxres instanceof ThumbnailResponseModel) {
            return $this->maxres;
        }

        if ($this->standard instanceof ThumbnailResponseModel) {
            return $this->standard;
        }

        if ($this->high instanceof ThumbnailResponseModel) {
            return $this->high;
        }

        if ($this->medium instanceof ThumbnailResponseModel) {
            return $this->medium;
        }

        if ($this->default instanceof ThumbnailResponseModel) {
            return $this->default;
        }

        return null;
    }
}
