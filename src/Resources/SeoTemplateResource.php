<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Ozerich\FileStorage\Models\File;
use OZiTAG\Tager\Backend\Core\Resources\JsonResource;

class SeoTemplateResource extends JsonResource
{
    protected ?string $pageTitle = null;

    protected ?string $pageDescription = null;

    protected ?File $openGraphImage = null;

    public function setPageTitle(?string $value)
    {
        $this->pageTitle = $value;
    }

    public function setPageDescription(?string $value)
    {
        $this->pageDescription = $value;
    }

    public function setOpenGraphImage(?File $value)
    {
        $this->openGraphImage = $value;
    }

    public function getData()
    {
        return [
            'title' => $this->pageTitle,
            'description' => $this->pageDescription,
            'openGraphImage' => $this->openGraphImage ? $this->openGraphImage->getDefaultThumbnailUrl() : null
        ];
    }
}
