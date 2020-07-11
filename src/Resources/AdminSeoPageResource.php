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
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'openGraphTitle' => $this->open_graph_title,
            'openGraphDescription' => $this->open_graph_description,
            'openGraphImage' => $this->openGraphImage ? $this->openGraphImage->getShortJson() : null,
        ];
    }
}
