<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Core\SuccessResource;

class ViewSeoPageFeature extends Feature
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle()
    {
        return new SuccessResource();
    }
}
