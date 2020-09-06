<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Ozerich\FileStorage\Models\File;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoServicesResource extends JsonResource
{
    private $yandexCounterId;

    private $googleAnalyticsId;

    private $googleTagManagerId;

    private $facebookPixelId;

    public function setYandexCounterId($value)
    {
        $this->yandexCounterId = $value;
    }

    public function setGoogleAnalyticsId($value)
    {
        $this->googleAnalyticsId = $value;
    }

    public function setGoogleTagManagerId($value)
    {
        $this->googleTagManagerId = $value;
    }

    public function setFacebookPixelId($value)
    {
        $this->facebookPixelId = $value;
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
            'facebook' => [
                'enabled' => !empty($this->facebookPixelId),
                'value' => $this->facebookPixelId
            ],
            'googleAnalytics' => [
                'enabled' => !empty($this->googleAnalyticsId),
                'value' => $this->googleAnalyticsId
            ],
            'googleTagManagerId' => [
                'enabled' => !empty($this->googleTagManagerId),
                'value' => $this->googleTagManagerId
            ],
            'yandexMetrika' => [
                'enabled' => !empty($this->yandexCounterId),
                'value' => $this->yandexCounterId
            ]
        ];
    }
}
