<?php

namespace OZiTAG\Tager\Backend\Seo;

use Illuminate\Support\Facades\App;
use OZiTAG\Tager\Backend\Seo\Contracts\ISitemapHandler;
use OZiTAG\Tager\Backend\Seo\Repositories\TagerSeoTemplateRepository;
use OZiTAG\Tager\Backend\Seo\Structures\ParamsTemplate;

class TagerSeo
{
    /** @var ParamsTemplate[] */
    private static $paramsTemplates = [];

    /** @var ISitemapHandler[] */
    private static $sitemapHandlers = [];
    
    public static function registerParamsTemplate(string $templateId, ParamsTemplate $template)
    {
        self::$paramsTemplates[$templateId] = $template;
    }

    public static function registerSitemapHandler(string $handlerClassName)
    {
        $handlerClass = App::make($handlerClassName);
        if (!$handlerClass instanceof ISitemapHandler) {
            throw new \Exception('handlerClass must implements ISitemapHandler contract');
        }

        self::$sitemapHandlers[] = $handlerClass;
    }

    /**
     * @return ParamsTemplate[]
     */
    public static function getParamsTemplates()
    {
        return self::$paramsTemplates;
    }

    /**
     * @return ISitemapHandler[]
     */
    public static function getSitemapHandlers()
    {
        return self::$sitemapHandlers;
    }

    public static function isTemplateExist(string $templateId): bool
    {
        return array_key_exists($templateId, self::$paramsTemplates);
    }

    public static function getTemplate(string $templateId): ?ParamsTemplate
    {
        return self::$paramsTemplates[$templateId] ?? null;
    }

    private static function render(?string $template = null, array $variables = []): string
    {
        if (empty($template)) {
            return '';
        }

        foreach ($variables as $param => $value) {
            $template = str_replace('{{' . $param . '}}', $value, $template);
        }

        return $template;
    }

    public static function getPageTitle(string $templateId, array $variableValues = []): ?string
    {
        if (!array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        /** @var TagerSeoTemplateRepository $templatesRepository */
        $templatesRepository = App::make(TagerSeoTemplateRepository::class);
        $template = $templatesRepository->getByTemplate($templateId);
        if ($template) {
            return self::render($template->title ?? '', $variableValues);
        } else {
            return self::render(self::$paramsTemplates[$templateId]->getDefaultPageTitle(), $variableValues);
        }
    }

    public static function getPageDescription(string $templateId, array $variableValues = []): ?string
    {
        if (!array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        /** @var TagerSeoTemplateRepository $templatesRepository */
        $templatesRepository = App::make(TagerSeoTemplateRepository::class);
        $template = $templatesRepository->getByTemplate($templateId);
        if ($template) {
            return self::render($template->description ?? '', $variableValues);
        } else {
            return self::render(self::$paramsTemplates[$templateId]->getDefaultPageDescription(), $variableValues);
        }
    }

    public static function getPageH1(string $templateId, array $variableValues = []): ?string
    {
        if (!array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        /** @var TagerSeoTemplateRepository $templatesRepository */
        $templatesRepository = App::make(TagerSeoTemplateRepository::class);
        $template = $templatesRepository->getByTemplate($templateId);
        if ($template) {
            return self::render($template->h1 ?? '', $variableValues);
        } else {
            return self::render(self::$paramsTemplates[$templateId]->getDefaultH1(), $variableValues);
        }
    }

    public static function getPageKeywords(string $templateId, array $variableValues = []): ?string
    {
        if (!array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        /** @var TagerSeoTemplateRepository $templatesRepository */
        $templatesRepository = App::make(TagerSeoTemplateRepository::class);
        $template = $templatesRepository->getByTemplate($templateId);

        if ($template) {
            return self::render($template->keywords ?? '', $variableValues);
        } else {
            return null;
        }
    }

    public static function getOpenGraphImageUrl(string $templateId): ?string
    {
        if (!array_key_exists($templateId, self::$paramsTemplates)) {
            return null;
        }

        /** @var TagerSeoTemplateRepository $templatesRepository */
        $templatesRepository = App::make(TagerSeoTemplateRepository::class);
        $template = $templatesRepository->getByTemplate($templateId);
        if (!$template || !$template->openGraphImage) {
            return null;
        }

        return $template->openGraphImage->getDefaultThumbnailUrl();
    }
}
