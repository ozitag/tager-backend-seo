<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OZiTAG\Tager\Backend\Seo\Structures\SitemapItem;

class SitemapItemResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var SitemapItem $model */
        $model = $this;

        return [
            'loc' => $model->url,
            'lastmod' => $model->lastMod ? $model->lastMod->format('Y-m-d') : null,
            'changefreq' => $model->changeFreq,
            'priority' => $model->priority
        ];
    }
}
