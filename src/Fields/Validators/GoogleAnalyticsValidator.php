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
        
        if(!preg_match('#^UA\-\d{8}\-\d$#', $value)){
            return 'Значение должно быть в формате "UA-12345678-1"';
        }

        return true;
    }
}
