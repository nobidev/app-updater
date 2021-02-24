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
}
