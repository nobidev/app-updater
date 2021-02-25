<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use NobiDev\AppUpdater\Constant;

Route::group([
    'prefix' => config(Constant::getName(). '.api.prefix'),
    'as' => Constant::getName() . '::',
    'namespace' => 'NobiDev\AppUpdater\Controllers',
    'middleware' => ['web', Constant::getName()]
], static function () {
    Route::get('/version.json', ['as' => 'update.version', 'uses' => 'UpdateVersionController@index']);
});
