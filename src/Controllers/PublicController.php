<?php

namespace OZiTAG\Tager\Backend\Seo\Controllers;

use OZiTAG\Tager\Backend\Core\Controllers\Controller;
use OZiTAG\Tager\Backend\Seo\Features\GetSeoPageSettingsFeature;

class PublicController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function page($page)
    {
        return $this->serve(GetSeoPageSettingsFeature::class, [
            'page' => $page
        ]);
    }
}
