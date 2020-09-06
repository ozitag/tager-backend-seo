<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Guest;

use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Fields\Enums\FieldType;
use OZiTAG\Tager\Backend\Fields\Types\StringType;
use OZiTAG\Tager\Backend\ModuleSettings\ModuleSettings;
use OZiTAG\Tager\Backend\Seo\Fields\SeoModuleSettingField;
use OZiTAG\Tager\Backend\Seo\Resources\SeoServicesResource;

class GetSeoServicesFeature extends Feature
{
    public function handle(ModuleSettings $settings)
    {
        $resource = new SeoServicesResource([]);

        $resource->setFacebookPixelId(
            $settings->getPublicValue('seo', SeoModuleSettingField::FacebookPixelId, FieldType::String)
        );

        $resource->setGoogleAnalyticsId(
            $settings->getPublicValue('seo', SeoModuleSettingField::GoogleAnalyticsTrackingId, FieldType::String)
        );

        $resource->setGoogleTagManagerId(
            $settings->getPublicValue('seo', SeoModuleSettingField::GoogleTagManagerId, FieldType::String)
        );

        $resource->setYandexCounterId(
            $settings->getPublicValue('seo', SeoModuleSettingField::YandexMetrikaCounterId, FieldType::String)
        );

        return $resource;
    }
}
