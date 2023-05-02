<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controllers\Controller;
use OZiTAG\Tager\Backend\Seo\Features\Guest\GetSeoTemplateFeature;
use OZiTAG\Tager\Backend\Seo\Features\Guest\GetSeoServicesFeature;
use OZiTAG\Tager\Backend\Seo\Features\Guest\RobotsTxtFeature;
use OZiTAG\Tager\Backend\Seo\Features\Guest\SitemapFeature;
use OZiTAG\Tager\Backend\Seo\TagerSeoConfig;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

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

    public function robotsTxt()
    {
        if(!TagerSeoConfig::isRobotsTxtEditorEnabled()){
            throw new ServiceUnavailableHttpException(null, 'robots.txt is not enabled in Backend module');
        }

        return $this->serve(RobotsTxtFeature::class);
    }
}
