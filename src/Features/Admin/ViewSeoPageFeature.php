<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJobById;
use OZiTAG\Tager\Backend\Seo\Resources\AdminSeoPageResource;

class ViewSeoPageFeature extends Feature
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        $page = $this->run(GetSeoPageJobById::class, ['id' => $this->id]);
        if (!$page) {
            abort(404, 'Page not found');
        }

        return new AdminSeoPageResource($page);
    }
}
