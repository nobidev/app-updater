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
class DoUpdate extends Command
{
    public function __construct()
    {
        parent::__construct();
        $this->signature = 'updater:do-update';
        $this->description = 'Update to the new version';
    }

    public function handle(): int
    {
        if (AppUpdater::isNewVersionAvailable()) {
            $version = AppUpdater::getVersionAvailable();
            AppUpdater::fetch($version)->update();

            echo __(sprintf('Successfully updated to version %s', $version)) . PHP_EOL;
            return 0;
        }

        echo __('There is nothing to update !') . PHP_EOL;
        return 1;
    }
}
