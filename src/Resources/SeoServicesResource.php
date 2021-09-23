<?php

namespace OZiTAG\Tager\Backend\Seo\Resources;

use Ozerich\FileStorage\Models\File;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoServicesResource extends JsonResource
{
    private ?string $yandexCounterId = null;

    private ?string $googleAnalyticsId = null;

    private ?string $googleAnalytics4MeasurementId = null;

    private ?string $googleTagManagerId = null;

    private ?string $facebookPixelId = null;

    private ?string $tiktokPixelId = null;

    private ?string $yandexVerification = null;

    private ?string $googleVerification = null;

    private ?string $googleOptimizeId = null;

    public function setYandexCounterId(?string $value)
    {
        $this->yandexCounterId = $value;
    }

    public function setGoogleAnalyticsId(?string $value)
    {
        $this->googleAnalyticsId = $value;
    }

    public function setGoogleAnalytics4MeasurementId(?string $value)
    {
        $this->googleAnalytics4MeasurementId = $value;
    }

    public function setGoogleTagManagerId(?string $value)
    {
        $this->googleTagManagerId = $value;
    }

    public function setFacebookPixelId(?string $value)
    {
        $this->facebookPixelId = $value;
    }

    public function setTiktokPixelId(?string $value)
    {
        $this->tiktokPixelId = $value;
    }

    public function setGoogleVerification(?string $value)
    {
        $this->googleVerification = $value;
    }

    public function setYandexVerification(?string $value)
    {
        $this->yandexVerification = $value;
    }

    public function setGoogleOptimizeId(?string $value)
    {
        $this->googleOptimizeId = $value;
    }

    public function toArray($request)
    {
        return [
            'googleTagManagerId' => $this->googleTagManagerId ?? null,
            'googleAnalyticsId' => $this->googleAnalyticsId ?? null,
            'googleAnalytics4MeasurementId' => $this->googleAnalytics4MeasurementId ?? null,
            'googleOptimizeId' => $this->googleOptimizeId ?? null,
            'yandexCounterId' => $this->yandexCounterId ?? null,
            'facebookPixelId' => $this->facebookPixelId ?? null,
            'tiktokPixelId' => $this->tiktokPixelId ?? null,
            'googleVerification' => $this->googleVerification ?? null,
            'yandexVerification' => $this->yandexVerification ?? null,
        ];
    }
}
