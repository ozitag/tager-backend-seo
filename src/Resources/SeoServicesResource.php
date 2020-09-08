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

    private $yandexVerification;

    private $googleVerification;

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

    public function setGoogleVerification($value)
    {
        $this->googleVerification = $value;
    }

    public function setYandexVerification($value)
    {
        $this->yandexVerification = $value;
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
            'yandexVerification' => $this->yandexVerification ?? null,
            'googleVerification' => $this->googleVerification ?? null,
            'googleAnalyticsId' => $this->googleAnalyticsId ?? null,
            'googleTagManagerId' => $this->googleTagManagerId ?? null,
            'yandexCounterId' => $this->yandexCounterId ?? null,
            'facebookPixelId' => $this->facebookPixelId ?? null,
        ];
    }
}
