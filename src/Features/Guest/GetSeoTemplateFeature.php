<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Guest;

use Ozerich\FileStorage\Exceptions\InvalidThumbnailException;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Core\Resources\SuccessResource;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSeoPageJobByAlias;
use OZiTAG\Tager\Backend\Seo\Repositories\TagerSeoTemplateRepository;
use OZiTAG\Tager\Backend\Seo\Resources\PublicSeoResource;
use OZiTAG\Tager\Backend\Seo\Resources\SeoTemplateResource;
use OZiTAG\Tager\Backend\Seo\TagerSeo;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetSeoTemplateFeature extends Feature
{
    private string $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    public function handle(TagerSeoTemplateRepository $repository)
    {
        $model = $repository->getByTemplate($this->template);

        $resource = new SeoTemplateResource([]);

        if ($model) {
            $resource->setPageTitle($model->title);
            $resource->setPageDescription($model->description);
            $resource->setPageKeywords($model->keywords);
            $resource->setOpenGraphImage($model->openGraphImage);
        } else {
            $model = TagerSeo::getTemplate($this->template);
            if (!$model) {
                throw new NotFoundHttpException('Template not found');
            }

            $resource->setPageTitle($model->getDefaultPageTitle());
            $resource->setPageDescription($model->getDefaultPageDescription());
        }

        return $resource;
    }
}
