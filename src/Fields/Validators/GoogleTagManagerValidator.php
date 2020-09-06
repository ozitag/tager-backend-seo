<?php

namespace OZiTAG\Tager\Backend\Seo\Fields\Validators;

use OZiTAG\Tager\Backend\ModuleSettings\Contracts\IModuleSettingsValidator;

class GoogleTagManagerValidator implements IModuleSettingsValidator
{
    public function validate($value)
    {
        $value = trim($value);

        if (empty($value)) {
            return true;
        }

        if(!preg_match('#^GTM\-[A-Z]{7}$#', $value)){
            return 'Значение должно быть в формате "GTM-XXXXXXX"';
        }

        return true;
    }
}
