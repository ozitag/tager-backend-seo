<?php

namespace OZiTAG\Tager\Backend\Seo\Fields\Validators;

use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsValidator;

class GoogleAnalyticsValidator implements IModuleSettingsValidator
{
    public function validate($value)
    {
        $value = trim($value);

        if (empty($value)) {
            return true;
        }

        if (!preg_match('#^UA\-\d{4,10}\-\d{1,4}$#', $value)) {
            return __('tager-seo::errors.google_analytics');
        }

        return true;
    }
}
