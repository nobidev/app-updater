<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Contracts;

/**
 * @package NobiDev\AppUpdater\Contracts
 */
interface AppUpdaterRelease
{
    public function __construct(AppUpdater $updater, string $version);

    public function update(): void;
}
