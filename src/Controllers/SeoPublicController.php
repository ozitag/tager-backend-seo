<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controllers\Controller;
use OZiTAG\Tager\Backend\Seo\Features\Guest\GetSeoPageSettingsFeature;
use OZiTAG\Tager\Backend\Seo\Features\Guest\GetSeoServicesFeature;

class SeoPublicController extends Controller
{
    public function page($page)
    {
        return $this->serve(GetSeoPageSettingsFeature::class, [
            'page' => $page
        ]);
    }

    public function services()
    {
        return $this->serve(GetSeoServicesFeature::class);
    }
}
