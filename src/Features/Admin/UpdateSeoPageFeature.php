<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use App\Enums\FileScenario;
use Ozerich\FileStorage\Storage;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJobById;
use OZiTAG\Tager\Backend\Seo\Requests\UpdateSeoPageRequest;
use OZiTAG\Tager\Backend\Seo\Resources\AdminSeoPageResource;
use OZiTAG\Tager\Backend\Seo\TagerSeoConfig;

class UpdateSeoPageFeature extends Feature
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(UpdateSeoPageRequest $request, Storage $fileStorage, TagerSeoConfig $config)
    {
        $page = $this->run(GetSeoPageJobById::class, ['id' => $this->id]);
        if (!$page) {
            abort(404, 'Page not found');
        }

        if ($request->openGraphImage) {
            $fileStorage->setFileScenario($request->openGraphImage, $config->getOpenGraphScenario());
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
