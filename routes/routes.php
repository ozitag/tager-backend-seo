<?php

use Illuminate\Support\Facades\Route;

Route::get('/seo/{page}', \OZiTAG\Tager\Backend\Seo\Controllers\PublicController::class . '@page');

Route::group(['prefix' => 'admin', 'middleware' => ['passport:administrators', 'auth:api']], function () {

});
