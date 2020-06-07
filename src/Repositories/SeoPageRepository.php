<?php

namespace OZiTAG\Tager\Backend\Seo\Repositories;

use OZiTAG\Tager\Backend\Core\Repositories\EloquentRepository;
use OZiTAG\Tager\Backend\Seo\Models\SeoPage;

class SeoPageRepository extends EloquentRepository
{
    public function __construct(SeoPage $model)
    {
        parent::__construct($model);
    }

    public function getByAlias($alias)
    {
        return SeoPage::wherePage($alias)->first();
    }
}
