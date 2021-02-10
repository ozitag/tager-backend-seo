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
            return 'Invalid Google Analytics 4 Measurement number, correct format is "G-XXXXXXXXXX"';
        }

        return true;
    }
}
