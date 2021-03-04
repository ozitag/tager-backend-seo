<?php

namespace OZiTAG\Tager\Backend\Seo\Repositories;

use OZiTAG\Tager\Backend\Core\Repositories\EloquentRepository;
use OZiTAG\Tager\Backend\Seo\Models\SeoPage;
use OZiTAG\Tager\Backend\Seo\Models\TagerSeoTemplate;

class TagerSeoTemplateRepository extends EloquentRepository
{
    public function __construct(TagerSeoTemplate $model)
    {
        parent::__construct($model);
    }

    public function getByTemplate(string $template): ?TagerSeoTemplate
    {
        return $this->model::query()->whereTemplate($template)->first();
    }
}
