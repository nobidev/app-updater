<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Commands;

use AppUpdater;
use Illuminate\Console\Command;
use NobiDev\AppUpdater\Constant;

/**
 * @package NobiDev\AppUpdater\Commands
 */
class CheckUpdate extends Command
{
    public function __construct()
    {
        $this->signature = 'updater:check-update';
        $this->description = __(Constant::getName() . '::check_update.description');
        parent::__construct();
    }

    public function handle(): int
    {
        if (AppUpdater::isNewVersionAvailable()) {
            $version = AppUpdater::getVersionAvailable();

            echo __(Constant::getName() . '::check_update.succeed', ['version' => $version]) . PHP_EOL;
            return 0;
        }

        echo __(Constant::getName() . '::check_update.failed') . PHP_EOL;
        return 1;
    }
}
