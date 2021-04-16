<?php

namespace OZiTAG\Tager\Backend\Seo\Fields\Validators;

use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsValidator;

class YandexMetrikaValidator implements IModuleSettingsValidator
{
    public function validate($value)
    {
        $value = trim($value);

        if (empty($value)) {
            return true;
        }

        if (!preg_match('#^\d{8}$#', $value)) {
            return __('tager-seo::errors.yandex_metrika');
        }

        return true;
    }
}
