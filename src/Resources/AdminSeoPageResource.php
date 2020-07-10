<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use OZiTAG\Tager\Backend\Seo\Models\SeoPage;
use Ozerich\FileStorage\Models\File;

class AdminSeoPageResource extends PublicSeoResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge([
            'id' => $this->id,
            'alias' => $this->page,
            'name' => $this->page,
        ], parent::toArray($request));
    }
}
