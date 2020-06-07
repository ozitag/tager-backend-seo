<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use OZiTAG\Tager\Backend\Core\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJobById;
use OZiTAG\Tager\Backend\Seo\Requests\UpdateSeoPageRequest;
use OZiTAG\Tager\Backend\Seo\Resources\AdminSeoPageResource;

class UpdateSeoPageFeature extends Feature
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(UpdateSeoPageRequest $request)
    {
        $page = $this->run(GetSeoPageJobById::class, ['id' => $this->id]);
        if (!$page) {
            abort(404, 'Page not found');
        }

        $page->title = $request->title;
        $page->description = $request->description;
        $page->open_graph_image_id = $request->openGraphImage;
        $page->open_graph_title = $request->openGraphTitle;
        $page->open_graph_description = $request->openGraphDescription;
        $page->save();

        return new AdminSeoPageResource($page);
    }
}
