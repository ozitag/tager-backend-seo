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

        if(!preg_match('#^GTM\-[A-Za-z0-9]{7}$#', $value)){
            return __('tager-seo::errors.google_tag_manager');
        }

        return true;
    }
}
