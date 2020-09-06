<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controllers\Controller;
use OZiTAG\Tager\Backend\Seo\Features\Admin\ListSeoPagesFeature;
use OZiTAG\Tager\Backend\Seo\Features\Admin\UpdateSeoPageFeature;
use OZiTAG\Tager\Backend\Seo\Features\Admin\ViewSeoPageFeature;

class SeoAdminController extends Controller
{
    public function index()
    {
        return $this->serve(ListSeoPagesFeature::class);
    }

    public function view($id)
    {
        return $this->serve(ViewSeoPageFeature::class, [
            'id' => $id
        ]);
    }

    public function update($id)
    {
        return $this->serve(UpdateSeoPageFeature::class, [
            'id' => $id
        ]);
    }
}
