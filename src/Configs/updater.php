<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

return [
    'api' => [
        'prefix' => '',
        'userAgent' => '/^AppUpdater\/[0-9]+\.[0-9.]+($|\s)/m',
    ],
    'server' => env('UPDATER_SERVER'),
];
