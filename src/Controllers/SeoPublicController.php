<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controllers\Controller;
use OZiTAG\Tager\Backend\Seo\Features\Guest\GetSeoTemplateFeature;
use OZiTAG\Tager\Backend\Seo\Features\Guest\GetSeoServicesFeature;
use OZiTAG\Tager\Backend\Seo\Features\Guest\SitemapFeature;

class SeoPublicController extends Controller
{
    public function services()
    {
        return $this->serve(GetSeoServicesFeature::class);
    }

    public function template(string $template)
    {
        return $this->serve(GetSeoTemplateFeature::class, [
            'template' => $template
        ]);
    }

    public function sitemap()
    {
        return $this->serve(SitemapFeature::class);
    }
}
