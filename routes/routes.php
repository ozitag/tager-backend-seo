<?php

use Illuminate\Support\Facades\Route;
use OZiTAG\Tager\Backend\Seo\Controllers\PublicController;
use OZiTAG\Tager\Backend\Seo\Controllers\AdminController;

Route::get('/tager/seo/{page}', [PublicController::class, 'page']);

Route::group(['prefix' => 'admin', 'middleware' => ['passport:administrators', 'auth:api']], function () {
    Route::get('/seo/pages', [AdminController::class, 'index']);
    Route::get('/seo/pages/{id}', [AdminController::class, 'view']);
    Route::put('/seo/pages/{id}', [AdminController::class, 'update']);
});
