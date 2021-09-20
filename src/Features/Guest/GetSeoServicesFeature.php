<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Guest;

use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Fields\Enums\FieldType;
use OZiTAG\Tager\Backend\Fields\Types\StringType;
use OZiTAG\Tager\Backend\ModuleSettings\ModuleSettings;
use OZiTAG\Tager\Backend\Seo\Fields\SeoModuleSettingFieldEnum;
use OZiTAG\Tager\Backend\Seo\Resources\SeoServicesResource;

class GetSeoServicesFeature extends Feature
{
    public function handle(ModuleSettings $settings)
    {
        $resource = new SeoServicesResource([]);

        $resource->setFacebookPixelId(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::FacebookPixelId, FieldType::String)
        );

        $resource->setGoogleAnalyticsId(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::GoogleAnalyticsTrackingId, FieldType::String)
        );

        $resource->setGoogleAnalytics4MeasurementId(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::GoogleAnalytics4MeasurementId, FieldType::String)
        );

        $resource->setGoogleTagManagerId(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::GoogleTagManagerId, FieldType::String)
        );

        $resource->setYandexCounterId(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::YandexMetrikaCounterId, FieldType::String)
        );

        $resource->setGoogleVerification(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::GoogleVerification, FieldType::String)
        );

        $resource->setYandexVerification(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::YandexVerification, FieldType::String)
        );

        $resource->setYandexVerification(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::YandexVerification, FieldType::String)
        );

        $resource->setYandexVerification(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::YandexVerification, FieldType::String)
        );

        $resource->setGoogleOptimizeId(
            $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::GoogleOptimizeId, FieldType::String)
        );

        return $resource;
    }
}
