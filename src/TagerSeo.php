<?php

namespace OZiTAG\Tager\Backend\Seo;

use Illuminate\Support\Facades\App;
use OZiTAG\Tager\Backend\Seo\Structures\ParamsTemplate;
use OZiTAG\Tager\Backend\Sitemap\Contracts\ISitemapHandler;

class TagerSeo
{
    /** @var ParamsTemplate[] */
    private static $paramsTemplates = [];

    /**
     * @return array[]
     */
    public static function getParamsTemplates()
    {
        return self::$paramsTemplates;
    }

    public static function registerParamsTemplate(string $templateId, ParamsTemplate $template)
    {
        self::$paramsTemplates[$templateId] = $template;
    }

    public static function isTemplateExist(string $templateId): bool
    {
        return array_key_exists($templateId, self::$paramsTemplates);
    }

    public static function getTemplate(string $templateId): ?ParamsTemplate
    {
        return self::$paramsTemplates[$templateId] ?? null;
    }

    public static function getPageTitle(string $templateId, array $variableValues = []): ?string
    {
        if (array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        return self::$paramsTemplates[$templateId]->renderPageTitle($variableValues);
    }

    public static function getPageDescription(string $templateId, array $variableValues = []): ?string
    {
        if (array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        return self::$paramsTemplates[$templateId]->renderPageDescription($variableValues);
    }


    public static function getOpenGraphImageUrl(string $templateId): ?string
    {
        if (array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        return null;
    }
}
