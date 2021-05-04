<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Core\Resources\SuccessResource;
use OZiTAG\Tager\Backend\Seo\Repositories\TagerSeoTemplateRepository;
use OZiTAG\Tager\Backend\Seo\TagerSeo;
use OZiTAG\Tager\Backend\Seo\TagerSeoConfig;

class SeoAdminInfoFeature extends Feature
{
    public function handle()
    {
        return new JsonResource([
            'keywordsEnabled' => TagerSeoConfig::isKeywordsEnabled(),
            'openGraphImageScenario' => TagerSeoConfig::getOpenGraphScenario()
        ]);
    }
}
