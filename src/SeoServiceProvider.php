<?php

namespace OZiTAG\Tager\Backend\Seo;

use OZiTAG\Tager\Backend\ModuleSettings\ModuleSettingsServiceProvider;
use OZiTAG\Tager\Backend\Rbac\TagerScopes;
use OZiTAG\Tager\Backend\Seo\Console\FlushSeoPagesCommand;
use OZiTAG\Tager\Backend\Seo\Enums\SeoScope;

class SeoServiceProvider extends ModuleSettingsServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'tager-seo');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        $this->publishes([
            __DIR__ . '/../config.php' => config_path('tager-seo.php'),
        ]);
        
        TagerScopes::registerGroup('SEO', [
            SeoScope::EditServices->value => __('tager-seo::scopes.edit_services'),
            SeoScope::EditTemplates->value => __('tager-seo::scopes.edit_templates'),
        ]);
    }
}
