<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controller;
use OZiTAG\Tager\Backend\Seo\Features\Admin\ListSeoPagesFeature;
use OZiTAG\Tager\Backend\Seo\Features\Admin\UpdateSeoPageFeature;
use OZiTAG\Tager\Backend\Seo\Features\Admin\ViewSeoPageFeature;

class AdminController extends Controller
{
    public function index()
    {
        return $this->serve(ListSeoPagesFeature::class);
    }

    public function view($page)
    {
        return $this->serve(ViewSeoPageFeature::class, [
            'page' => $page
        ]);
    }

    public function update($page)
    {
        return $this->serve(UpdateSeoPageFeature::class, [
            'page' => $page
        ]);
    }
}
