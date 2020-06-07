<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use App\Http\Requests\Admin\Product\UpdateSeoPageRequest;
use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Core\SuccessResource;

class UpdateSeoPageFeature extends Feature
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle(UpdateSeoPageRequest $request)
    {
        return new SuccessResource();
    }
}
