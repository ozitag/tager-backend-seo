<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Ozerich\FileStorage\Models\File;
use Illuminate\Http\Resources\Json\JsonResource;
use OZiTAG\Tager\Backend\Seo\Models\SeoPage;

class PublicSeoResource extends SeoParamsResource
{
    public function __construct(SeoPage $resource)
    {
        parent::__construct(
            $resource->title, $resource->description, $resource->openGraphImage,
            !empty($resource->open_graph_title) ? $resource->open_graph_title : $resource->title,
            !empty($resource->open_graph_description) ? $resource->open_graph_description : $resource->description
        );
    }
}
