<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater;

use NobiDev\AppUpdater\Contracts\AppUpdater as AppUpdaterContract;
use NobiDev\AppUpdater\Contracts\AppUpdaterRelease as AppUpdaterReleaseContract;

/**
 * @package NobiDev\AppUpdater
 */
class AppUpdaterRelease implements AppUpdaterReleaseContract
{
    protected AppUpdaterContract $updater;
    protected string $version;

    public function __construct(AppUpdaterContract $updater, string $version)
    {
        $this->updater = $updater;
        $this->version = $version;
    }

    public function update(): void
    {
    }
}
