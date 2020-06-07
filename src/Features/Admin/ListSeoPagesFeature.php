<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Seo\Repositories\SeoPageRepository;
use OZiTAG\Tager\Backend\Seo\Resources\AdminSeoPageResource;

class ListSeoPagesFeature extends Feature
{
    public function handle(SeoPageRepository $repository)
    {
        return AdminSeoPageResource::collection($repository->all());
    }
}
