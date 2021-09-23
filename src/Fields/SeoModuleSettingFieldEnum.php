<?php

namespace OZiTAG\Tager\Backend\Seo\Fields;

use OZiTAG\Tager\Backend\Fields\Fields\StringField;
use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsFieldEnumContract;
use OZiTAG\Tager\Backend\ModuleSettings\Structures\ModuleSettingFieldEnum;
use OZiTAG\Tager\Backend\ModuleSettings\Structures\ModuleSettingField;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\FacebookPixelValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleAnalyticsValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleOptimizeValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleTagManagerValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleAnalytics4MeasurementValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\GoogleVerificationValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\TiktokPixelValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\YandexMetrikaValidator;
use OZiTAG\Tager\Backend\Seo\Fields\Validators\YandexVerificationValidator;

class SeoModuleSettingFieldEnum extends ModuleSettingFieldEnum implements IModuleSettingsFieldEnumContract
{
    const GoogleAnalyticsTrackingId = 'GOOGLE_ANALYTICS_TRACKING_ID';
    const GoogleAnalytics4MeasurementId = 'GOOGLE_ANALYTICS4_MEASUREMENT_ID';
    const GoogleOptimizeId = 'GOOGLE_OPTIMIZE_ID';
    const GoogleTagManagerId = 'GOOGLE_TAG_MANAGER_ID';
    const YandexMetrikaCounterId = 'YANDEX_METRIKA_COUNTER_ID';
    const FacebookPixelId = 'FACEBOOK_PIXEL_ID';
    const TiktokPixelId = 'TIKTOK_PIXEL_ID';
    const GoogleVerification = 'GOOGLE_VERIFICATION';
    const YandexVerification = 'YANDEX_VERIFICATION';

    public static function field(string $param): ModuleSettingField
    {
        switch ($param) {
            case self::GoogleTagManagerId:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.google_tag_manager_id'),
                        'GTM-XXXXXXX'
                    ),
                    new GoogleTagManagerValidator()
                );
            case self::GoogleAnalyticsTrackingId:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.google_analytics_tracking_id'),
                        'UA-XXXXXXXX-X'
                    ),
                    new GoogleAnalyticsValidator(),
                );
            case self::GoogleAnalytics4MeasurementId:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.google_analytics_4_measurement_id'),
                       'G-XXXXXXXXXX'
                    ),
                    new GoogleAnalytics4MeasurementValidator(),
                );
            case self::GoogleOptimizeId:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.google_optimize_id'),
                        ''
                    ),
                    new GoogleOptimizeValidator()
                );
            case self::YandexMetrikaCounterId:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.yandex_metrika_id'),
                        __('tager-seo::settings.yandex_metrika_id_placeholder')
                    ),
                    new YandexMetrikaValidator(),
                );
            case self::FacebookPixelId:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.facebook_pixel_id'),
                        __('tager-seo::settings.facebook_pixel_id_placeholder')
                    ),
                    new FacebookPixelValidator(),
                );
            case self::TiktokPixelId:
                return new ModuleSettingField(
                    new StringField(
                        'TikTok Pixel ID',
                        ''
                    ),
                    new TiktokPixelValidator(),
                );
            case self::GoogleVerification:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.google_search_console_verification_code'),
                        __('tager-seo::settings.google_search_console_verification_placeholder')
                    ),
                    new GoogleVerificationValidator(),
                );
            case self::YandexVerification:
                return new ModuleSettingField(
                    new StringField(
                        __('tager-seo::settings.yandex_webmaster_verification_code'),
                        __('tager-seo::settings.yandex_webmaster_verification_code_placeholder')
                    ),
                    new YandexVerificationValidator(),
                );
        }
    }
}
