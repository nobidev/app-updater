<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater;

use Illuminate\Contracts\Container\Container;
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
            throw new ApplicationInvalidException('AppInstaller must be installed on the main context of Laravel.');
        }

        return $this;
    }

    public function getVersion(): string
    {
        return config('app.version');
    }

    public function isNewVersionAvailable(): bool
    {
        return false;
    }

    public function getVersionAvailable(): string
    {
        return $this->getVersion();
    }

    public function fetch(string $version): AppUpdaterRelease
    {
        return new AppUpdaterRelease($this, $version);
    }
}
