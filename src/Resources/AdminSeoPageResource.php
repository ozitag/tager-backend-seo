<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminSeoPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alias' => $this->page,
            'name' => $this->page,
            'title' => $this->title,
            'description' => $this->description,
            'openGraphTitle' => $this->openGraphTitle,
            'openGraphDescription' => $this->openGraphDescription,
            'openGraphImage' => $this->openGraphImage ? $this->openGraphImage->toJson() : null,
        ];
    }
}
