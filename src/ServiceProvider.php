<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use NobiDev\AppUpdater\Commands\CheckUpdate;
use NobiDev\AppUpdater\Commands\DoUpdate;
use NobiDev\AppUpdater\Middleware\OnlyBotMiddleware;

/**
 * @package NobiDev\AppUpdater
 */
class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        parent::register();
        $this->app->bind(Constant::getName(), AppUpdater::class);
        $this->mergeConfigFrom(__DIR__ . '/Configs/updater.php', Constant::getName());
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
    }

    public function boot(Router $router): void
    {
        $router->pushMiddlewareToGroup(Constant::getName(), OnlyBotMiddleware::class);
        $this->loadTranslationsFrom(__DIR__ . '/Translations', Constant::getName());
        if ($this->app->runningInConsole()) {
            $this->commands([
                CheckUpdate::class,
                DoUpdate::class,
            ]);
        }
    }
}
