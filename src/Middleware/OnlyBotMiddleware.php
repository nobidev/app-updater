<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Middleware;

use Closure;
use Illuminate\Http\Request;
use NobiDev\AppUpdater\Constant;
use Symfony\Component\HttpFoundation\Response;

/**
 * @package NobiDev\AppUpdater\Middleware
 */
class OnlyBotMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!config('app.debug') && !preg_match(config(Constant::getName() . '.api.userAgent'), $request->userAgent())) {
            abort(404);
        }
        return $next($request);
    }
}
