<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use Laminas\Code\Generator\DocBlock\Tag;
use Ozerich\FileStorage\Storage;
use Ozerich\FileStorage\Utils\ConfigHelper;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Core\Resources\SuccessResource;
use OZiTAG\Tager\Backend\HttpCache\HttpCache;
use OZiTAG\Tager\Backend\Seo\Repositories\TagerSeoTemplateRepository;
use OZiTAG\Tager\Backend\Seo\Requests\TagerSeoAdminTemplatesSaveRequest;
use OZiTAG\Tager\Backend\Seo\TagerSeo;
use OZiTAG\Tager\Backend\Seo\TagerSeoConfig;

class SeoAdminTemplatesSaveFeature extends Feature
{
    public function handle(TagerSeoAdminTemplatesSaveRequest $request, TagerSeoTemplateRepository $repository, HttpCache $httpCache, Storage $storage)
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
                'keywords' => $template['pageKeywords'] ?? null,
                'open_graph_image_id' => Storage::fromUUIDtoId($template['openGraphImage'])
            ]);

            if (TagerSeoConfig::getOpenGraphScenario()) {
                $storage->setFileScenario($template['openGraphImage'], TagerSeoConfig::getOpenGraphScenario());
            }
            
            $updatedTemplates[] = $template['template'];
        }

        $repository->builder()->whereNotIn('template', $updatedTemplates)->delete();

        $httpCache->clear('/api/tager/seo/template');

        return new SuccessResource();
    }
}
