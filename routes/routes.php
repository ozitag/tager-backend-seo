<?php

use Illuminate\Support\Facades\Route;
use OZiTAG\Tager\Backend\Seo\Enums\SeoScope;
use OZiTAG\Tager\Backend\Rbac\Facades\AccessControlMiddleware;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoPublicController;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoAdminController;
use OZiTAG\Tager\Backend\Seo\Controllers\SeoAdminSettingsController;

Route::group(['prefix' => 'tager/seo', 'middleware' => 'api.cache'], function () {
    Route::get('/services', [SeoPublicController::class, 'services']);
    Route::get('/{page}', [SeoPublicController::class, 'page']);
});

Route::group(['prefix' => 'admin/seo', 'middleware' => ['passport:administrators', 'auth:api']], function () {
    Route::get('/pages', [SeoAdminController::class, 'index']);
    Route::get('/pages/{id}', [SeoAdminController::class, 'view']);
    Route::put('/pages/{id}', [SeoAdminController::class, 'update']);

    Route::group(['middleware' => [AccessControlMiddleware::scopes(SeoScope::EditServices)]], function () {
        Route::get('/settings', [SeoAdminSettingsController::class, 'index']);
        Route::post('/settings', [SeoAdminSettingsController::class, 'save']);
    });
});
