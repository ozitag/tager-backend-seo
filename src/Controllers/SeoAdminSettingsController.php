<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\ModuleSettings\Controllers\AdminSettingsController;
use OZiTAG\Tager\Backend\Seo\Fields\SeoModuleSettingField;

class SeoAdminSettingsController extends AdminSettingsController
{
    public function __construct()
    {
        parent::__construct('seo', SeoModuleSettingField::class, 'tager/seo');
    }
}
