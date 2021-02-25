<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater;

use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\File;
use NobiDev\AppUpdater\Contracts\AppUpdater as AppUpdaterContract;
use NobiDev\AppUpdater\Exceptions\ApplicationInvalidException;

/**
 * @package NobiDev\AppUpdater
 */
class AppUpdater implements AppUpdaterContract
{
    protected Container $application;

    /**
     * @param Container $app
     * @throws ApplicationInvalidException
     */
    public function __construct(Container $app)
    {
        $this->application = $app;

        $this->load();
    }

    /**
     * @return $this
     * @throws ApplicationInvalidException
     */
    public function load(): AppUpdater
    {
        if ($this->application !== app()) {
            throw new ApplicationInvalidException('AppUpdater must be installed on the main context of Laravel.');
        }

        return $this;
    }

    public function isNewVersionAvailable(): bool
    {
        return false;
    }

    public function getVersionFile(): string
    {
        return storage_path('update_available');
    }

    public function hasVersionFile(): bool
    {
        return File::exists($this->getVersionFile());
    }

    public function createVersionFile(string $version): void
    {
        File::put($this->getVersionFile(), $version);
    }

    public function deleteVersionFile(): void
    {
        File::delete($this->getVersionFile());
    }

    protected function findVersionLatest(string $version): string
    {
        return $version;
    }

    public function getVersionAvailable(): string
    {
        if (!$this->hasVersionFile()) {
            $this->findVersionLatest($this->getVersion());
        }
        return File::get($this->getVersionFile());
    }

    public function getVersion(): ?string
    {
        return config('app.version');
    }

    public function fetch(string $version): AppUpdaterRelease
    {
        return new AppUpdaterRelease($this, $version);
    }
}
