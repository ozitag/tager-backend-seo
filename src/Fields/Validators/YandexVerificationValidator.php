<?php

namespace OZiTAG\Tager\Backend\Seo\Fields\Validators;

use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsValidator;

class YandexVerificationValidator implements IModuleSettingsValidator
{
    public function validate($value)
    {
        $value = trim($value);

        if (empty($value)) {
            return true;
        }

        if (mb_strlen($value) !== 16) {
            return __('tager-seo::errors.yandex_verification');
        }

        return true;
    }
}
