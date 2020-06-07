<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJob;
use OZiTAG\Tager\Backend\Seo\Resources\AdminSeoPageResource;

class ViewSeoPageFeature extends Feature
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle()
    {
        $page = $this->run(GetSeoPageJob::class, ['page' => $this->page]);
        if (!$page) {
            abort(404, 'Page not found');
        }

        return new AdminSeoPageResource($page);
    }
}
