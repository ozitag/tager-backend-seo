<?php

use Illuminate\Support\Facades\Route;
use OZiTAG\Tager\Backend\Seo\Enums\SeoScope;
use OZiTAG\Tager\Backend\Rbac\Facades\AccessControlMiddleware;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoPublicController;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoAdminController;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoAdminSettingsController;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoAdminTemplatesController;

Route::group(['prefix' => 'tager/seo', 'middleware' => 'api.cache'], function () {
    Route::get('/template/{template}', [SeoPublicController::class, 'template']);
    Route::get('/services', [SeoPublicController::class, 'services']);
});

Route::group(['prefix' => 'admin/seo', 'middleware' => ['passport:administrators', 'auth:api']], function () {
    Route::group(['middleware' => [AccessControlMiddleware::scopes(SeoScope::EditServices)]], function () {
        Route::get('/settings', [SeoAdminSettingsController::class, 'index']);
        Route::post('/settings', [SeoAdminSettingsController::class, 'save']);
    });

    Route::group(['middleware' => [AccessControlMiddleware::scopes(SeoScope::EditTemplates)]], function () {
        Route::get('/templates', [SeoAdminTemplatesController::class, 'index']);
        Route::post('/templates', [SeoAdminTemplatesController::class, 'save']);
    });
});
