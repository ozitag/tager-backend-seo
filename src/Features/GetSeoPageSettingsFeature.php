<?php

namespace OZiTAG\Tager\Backend\Seo\Features;

use Ozerich\FileStorage\Exceptions\InvalidThumbnailException;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJobByAlias;
use OZiTAG\Tager\Backend\Seo\Resources\PublicSeoResource;
use OZiTAG\Tager\Backend\Seo\Resources\SeoParamsResource;
use OZiTAG\Tager\Backend\Seo\TagerSeoConfig;

class GetSeoPageSettingsFeature extends Feature
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle(TagerSeoConfig $seoConfig)
    {
        $model = $this->run(GetSeoPageJobByAlias::class, ['alias' => $this->page]);
        if (!$model) {
            abort(404, 'Page not found');
        }

        $openGraphImageUrl = null;
        if ($model->openGraphImage) {
            $scenario = $seoConfig->getOpenGraphScenario();
            if (empty($scenario)) {
                $openGraphImageUrl = $model->openGraphImage->getUrl();
            } else {
                try {
                    $openGraphImageUrl = $model->openGraphImage->getDefaultThumbnailUrl($scenario);
                } catch (InvalidThumbnailException $exception) {
                    $openGraphImageUrl = $model->openGraphImage->getUrl();
                }
            }
        }

        $resource = new SeoParamsResource($model->title, $model->description);
        $resource->setOpenGraph(
            $openGraphImageUrl,
            $model->open_graph_title,
            $model->open_graph_description
        );

        return $resource;
    }
}
