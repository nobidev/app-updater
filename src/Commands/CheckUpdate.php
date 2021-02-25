<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Commands;

use AppUpdater;
use Illuminate\Console\Command;

/**
 * @package NobiDev\AppUpdater\Commands
 */
class CheckUpdate extends Command
{
    public function __construct()
    {
        $this->signature = 'updater:check-update';
        $this->description = 'Check to see if there are any updates available';
        parent::__construct();
    }

    public function handle(): int
    {
        if (AppUpdater::isNewVersionAvailable()) {
            $version = AppUpdater::getVersionAvailable();

            echo __(sprintf('New update available is version %s', $version)) . PHP_EOL;
            return 0;
        }

        echo __('You are using the latest version !') . PHP_EOL;
        return 1;
    }
}
