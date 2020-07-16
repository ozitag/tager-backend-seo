<?php

use Illuminate\Support\Facades\Route;

Route::get('/tager/seo/{page}', \OZiTAG\Tager\Backend\Seo\Controllers\PublicController::class . '@page');

Route::group(['prefix' => 'admin', 'middleware' => ['passport:administrators', 'auth:api']], function () {
    Route::get('/seo/pages', \OZiTAG\Tager\Backend\Seo\Controllers\AdminController::class . '@index');
    Route::get('/seo/pages/{id}', \OZiTAG\Tager\Backend\Seo\Controllers\AdminController::class . '@view');
    Route::put('/seo/pages/{id}', \OZiTAG\Tager\Backend\Seo\Controllers\AdminController::class . '@update');
});
