<?php

namespace OZiTAG\Tager\Backend\Seo\Features;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Seo\Resources\SeoPageParamsResource;

class GetSeoPageSettingsFeature extends Feature
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle()
    {
        return new SeoPageParamsResource('Title', 'Description', null);
    }
}
