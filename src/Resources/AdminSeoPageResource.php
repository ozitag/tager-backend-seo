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
        $seoParams = new SeoParamsResource(
            $this->title, $this->description, $this->openGraphImage,
            !empty($this->open_graph_title) ? $this->open_graph_title : $this->title,
            !empty($this->open_graph_description) ? $this->open_graph_description : $this->description
        );

        return array_merge([
            'id' => $this->id,
            'alias' => $this->page,
            'name' => $this->page,
        ], $seoParams->toArray($request));
    }
}
