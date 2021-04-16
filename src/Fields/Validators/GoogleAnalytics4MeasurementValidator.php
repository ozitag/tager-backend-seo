<?php

namespace OZiTAG\Tager\Backend\Seo\Fields\Validators;

use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsValidator;

class GoogleAnalytics4MeasurementValidator implements IModuleSettingsValidator
{
    public function validate($value)
    {
        $value = trim($value);

        if (empty($value)) {
            return true;
        }

        if(!preg_match('#^G\-\w{10}$#', $value)){
            return __('tager-seo::errors.google_analytics_4');
        }

        return true;
    }
}
