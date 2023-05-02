<?php

namespace OZiTAG\Tager\Backend\Seo;

class TagerSeoConfig
{
    private static function config($param = null, $default = null)
    {
        return \config('tager-seo' . (empty($param) ? '' : '.' . $param), $default);
    }

    public static function getOpenGraphScenario()
    {
        return self::config('openGraphScenario', false);
    }

    public static function isKeywordsEnabled(): bool
    {
        return self::config('keywordsEnabled', false);
    }

    public static function isRobotsTxtEditorEnabled(): bool
    {
        return self::config('robotsTxtEditorEnabled', false);
    }
}
