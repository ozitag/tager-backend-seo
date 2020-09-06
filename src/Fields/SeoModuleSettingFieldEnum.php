<?php

namespace OZiTAG\Tager\Backend\Seo\Fields;

use OZiTAG\Tager\Backend\Fields\Base\Field;
use OZiTAG\Tager\Backend\Fields\Fields\ImageField;
use OZiTAG\Tager\Backend\Fields\Fields\StringField;
use OZiTAG\Tager\Backend\Fields\Fields\TextField;
use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsFieldEnumContract;
use OZiTAG\Tager\Backend\ModuleSettings\Structures\ModuleSettingFieldEnum;
use OZiTAG\Tager\Backend\ModuleSettings\Structures\ModuleSettingField;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\FacebookPixelValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleAnalyticsValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleTagManagerValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\YandexMetrikaValidator;

class SeoModuleSettingFieldEnum extends ModuleSettingFieldEnum implements IModuleSettingsFieldEnumContract
{
    const GoogleAnalyticsTrackingId = 'GOOGLE_ANALYTICS_TRACKING_ID';
    const GoogleTagManagerId = 'GOOGLE_TAG_MANAGER_ID';
    const YandexMetrikaCounterId = 'YANDEX_METRIKA_COUNTER_ID';
    const FacebookPixelId = 'FACEBOOK_PIXEL_ID';

    public static function field(string $param): ModuleSettingField
    {
        switch ($param) {
            case self::GoogleAnalyticsTrackingId:
                return new ModuleSettingField(
                    new StringField('Google Analytics Tracking ID'),
                    new GoogleAnalyticsValidator()
                );
            case self::GoogleTagManagerId:
                return new ModuleSettingField(
                    new StringField('Google Tag Manager ID'),
                    new GoogleTagManagerValidator()
                );
            case self::YandexMetrikaCounterId:
                return new ModuleSettingField(
                    new StringField('Yandex Metrika Counter ID'),
                    new YandexMetrikaValidator()
                );
            case self::FacebookPixelId:
                return new ModuleSettingField(
                    new StringField('Facebook Pixel ID'),
                    new FacebookPixelValidator()
                );
        }
    }
}
