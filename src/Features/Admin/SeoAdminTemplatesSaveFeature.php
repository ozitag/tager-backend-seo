<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use Ozerich\FileStorage\Storage;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Core\Resources\SuccessResource;
use OZiTAG\Tager\Backend\Seo\Repositories\TagerSeoTemplateRepository;
use OZiTAG\Tager\Backend\Seo\Requests\TagerSeoAdminTemplatesSaveRequest;
use OZiTAG\Tager\Backend\Seo\TagerSeo;

class SeoAdminTemplatesSaveFeature extends Feature
{
    public function handle(TagerSeoAdminTemplatesSaveRequest $request, TagerSeoTemplateRepository $repository)
    {
        $updatedTemplates = [];
        foreach ($request->templates as $template) {
            if (TagerSeo::isTemplateExist($template['template']) == false) continue;

            $model = $repository->getByTemplate($template['template']);
            if ($model) {
                $repository->set($model);
            }

            $repository->fillAndSave([
                'template' => $template['template'],
                'title' => $template['pageTitle'],
                'description' => $template['pageDescription'],
                'open_graph_image_id' => Storage::fromUUIDtoId($template['openGraphImage'])
            ]);

            $updatedTemplates[] = $template['template'];
        }

        $repository->builder()->whereNotIn('template', $updatedTemplates)->delete();

        return new SuccessResource();
    }
}
