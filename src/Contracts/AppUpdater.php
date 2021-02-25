<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Contracts;

use Illuminate\Contracts\Container\Container;

/**
 * @package NobiDev\AppUpdater\Contracts
 */
interface AppUpdater
{
    public function __construct(Container $app);

    public function load(): AppUpdater;

    public function getVersion(): ?string;

    public function isNewVersionAvailable(): bool;

    public function getVersionFile(): string;

    public function hasVersionFile(): bool;

    public function createVersionFile(string $version): void;

    public function deleteVersionFile(): void;

    public function getVersionAvailable(): string;

    public function fetch(string $version): AppUpdaterRelease;
}
