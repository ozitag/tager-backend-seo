<?php

namespace OZiTAG\Tager\Backend\Seo\Features;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJob;
use OZiTAG\Tager\Backend\Seo\Resources\PublicSeoResource;

class GetSeoPageSettingsFeature extends Feature
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle()
    {
        $model = $this->run(GetSeoPageJob::class, ['page' => $this->page]);
        if (!$model) {
            abort(404, 'Page not found');
        }

        return new PublicSeoResource($model);
    }
}
