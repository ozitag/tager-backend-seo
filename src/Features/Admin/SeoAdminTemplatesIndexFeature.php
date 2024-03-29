<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Core\Resources\SuccessResource;
use OZiTAG\Tager\Backend\Seo\Repositories\TagerSeoTemplateRepository;
use OZiTAG\Tager\Backend\Seo\TagerSeo;

class SeoAdminTemplatesIndexFeature extends Feature
{
    public function handle(TagerSeoTemplateRepository $templateRepository)
    {
        $paramsTemplates = TagerSeo::getParamsTemplates();

        $result = [];
        foreach ($paramsTemplates as $template => $paramsTemplate) {
            $model = $templateRepository->getByTemplate($template);

            $variables = [];
            foreach ($paramsTemplate->getVariables() as $param => $name) {
                $variables[] = [
                    'name' => $param,
                    'label' => $name
                ];
            }

            $result[] = [
                'template' => $template,
                'name' => $paramsTemplate->getName(),
                'hasOpenGraphImage' => $paramsTemplate->hasOpenGraphImage(),
                'h1Enabled' => $paramsTemplate->isH1Enabled(),
                'variables' => $variables,
                'value' => [
                    'pageTitle' => $model ? $model->title : $paramsTemplate->getDefaultPageTitle(),
                    'pageDescription' => $model ? $model->description : $paramsTemplate->getDefaultPageDescription(),
                    'pageKeywords' => $model?->keywords,
                    'h1' => $model ? $model->h1 : $paramsTemplate->getDefaultH1(),
                    'openGraphImage' => $model && $model->openGraphImage ? $model->openGraphImage->getShortJson() : null
                ],
            ];
        }

        return new JsonResource($result);
    }
}
