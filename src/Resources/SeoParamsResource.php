<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Ozerich\FileStorage\Models\File;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoParamsResource extends JsonResource
{
    protected $title;

    protected $description;

    protected $openGraphImage;

    protected $openGraphTitle;

    protected $openGraphDescription;

    public function __construct($title, $description = null, ?File $image = null, $openGraphTitle = null, $openGraphDescription = null)
    {
        parent::__construct([]);

        $this->title = $title;
        $this->description = $description;
        $this->openGraphImage = $image;
        $this->openGraphTitle = $openGraphTitle;
        $this->openGraphDescription = $openGraphDescription;
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'openGraph' => [
                'title' => !empty($this->openGraphTitle) ? $this->openGraphTitle : $this->title,
                'description' => !empty($this->openGraphDescription) ? $this->openGraphDescription : $this->description,
                'image' => $this->openGraphImage ? $this->openGraphImage->getUrl('og') : null,
            ]
        ];
    }
}
