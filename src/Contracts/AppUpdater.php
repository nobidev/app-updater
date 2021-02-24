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
}
