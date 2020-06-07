<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Ozerich\FileStorage\Models\File;
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
            'page' => $this->page,
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'open_graph_title' => $this->open_graph_title,
            'open_graph_description' => $this->open_graph_description,
            'open_graph_image' => $this->openGraphImage ? $this->openGraphImage->getJson() : null,
        ];
    }
}
