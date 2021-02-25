<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Controllers;

use AppUpdater;
use Illuminate\Http\Request;

/**
 * @package NobiDev\AppUpdater\Controllers
 */
class UpdateVersionController extends UpdateController
{
    protected function getData(Request $request): array
    {
        return [
            'app' => AppUpdater::getVersion(),
        ];
    }
}
