<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controllers\Controller;
use OZiTAG\Tager\Backend\ModuleSettings\Controllers\AdminSettingsController;
use OZiTAG\Tager\Backend\Seo\Features\Admin\SeoAdminTemplatesIndexFeature;
use OZiTAG\Tager\Backend\Seo\Features\Admin\SeoAdminTemplatesSaveFeature;
use OZiTAG\Tager\Backend\Seo\Fields\SeoModuleSettingFieldEnum;

class SeoAdminTemplatesController extends Controller
{
    public function index()
    {
        return $this->serve(SeoAdminTemplatesIndexFeature::class);
    }

    public function save()
    {
        return $this->serve(SeoAdminTemplatesSaveFeature::class);
    }
}
