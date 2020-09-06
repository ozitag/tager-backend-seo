<?php

namespace OZiTAG\Tager\Backend\Seo\Fields;

use OZiTAG\Tager\Backend\Fields\Base\Field;
use OZiTAG\Tager\Backend\Fields\Fields\ImageField;
use OZiTAG\Tager\Backend\Fields\Fields\StringField;
use OZiTAG\Tager\Backend\Fields\Fields\TextField;
use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsFieldContract;
use OZiTAG\Tager\Backend\ModuleSettings\Structures\ModuleSettingField;

class SeoModuleSettingField extends ModuleSettingField implements IModuleSettingsFieldContract
{
    const GoogleAnalyticsTrackingId = 'GOOGLE_ANALYTICS_TRACKING_ID';
    const GoogleTagManagerId = 'GOOGLE_TAG_MANAGER_ID';
    const YandexMetrikaCounterId = 'YANDEX_METRIKA_COUNTER_ID';
    const FacebookPixelId = 'FACEBOOK_PIXEL_ID';

    public static function field(string $param): Field
    {
        switch ($param) {
            case self::GoogleAnalyticsTrackingId:
                return new StringField('Google Analytics Tracking ID');
            case self::GoogleTagManagerId:
                return new StringField('Google Tag Manager ID');
            case self::YandexMetrikaCounterId:
                return new StringField('Yandex Metrika Counter ID');
            case self::FacebookPixelId:
                return new StringField('Facebook Pixel ID');
            default:
                return new StringField($param);
        }
    }
}
