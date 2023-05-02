<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Guest;

use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Fields\Enums\FieldType;
use OZiTAG\Tager\Backend\ModuleSettings\ModuleSettings;
use OZiTAG\Tager\Backend\Seo\Fields\SeoModuleSettingFieldEnum;

class RobotsTxtFeature extends Feature
{
    public function handle(ModuleSettings $settings)
    {
        $result = $settings->getPublicValue('seo', SeoModuleSettingFieldEnum::RobotsTxt, FieldType::String);

        return response($result, 200, [
            'Content-Type' => 'text/plain'
        ]);
    }
}
