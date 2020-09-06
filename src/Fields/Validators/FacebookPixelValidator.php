<?php

namespace OZiTAG\Tager\Backend\Seo\Fields\Validators;

use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsValidator;

class FacebookPixelValidator implements IModuleSettingsValidator
{
    public function validate($value)
    {
        $value = trim($value);

        if (empty($value)) {
            return true;
        }

        if (!preg_match('#^\d{15}$#', $value)) {
            return 'ID счетчика должен состоять из 15 цифр';
        }

        return true;
    }
}
