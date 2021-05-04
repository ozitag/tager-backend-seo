<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\ModuleSettings\Controllers\AdminSettingsController;
use OZiTAG\Tager\Backend\Seo\Features\Admin\SeoAdminInfoFeature;
use OZiTAG\Tager\Backend\Seo\Fields\SeoModuleSettingFieldEnum;

class SeoAdminSettingsController extends AdminSettingsController
{
    public function __construct()
    {
        parent::__construct('seo', SeoModuleSettingFieldEnum::class, 'tager/seo');
    }

    public function info()
    {
        return $this->serve(SeoAdminInfoFeature::class);
    }
}
