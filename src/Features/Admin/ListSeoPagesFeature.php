<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Core\SuccessResource;

class ListSeoPagesFeature extends Feature
{
    public function handle()
    {
        return new SuccessResource();
    }
}
