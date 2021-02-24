<?php
/*
 * Copyright (c) 2021 NobiDev
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater\Tests;

use NobiDev\AppUpdater\Constant;
use PHPUnit\Framework\TestCase;

/**
 * @package NobiDev\AppUpdater\Tests
 */
class ConstantTest extends TestCase
{
    public function testNameNotEmpty(): void
    {
        self::assertNotEmpty(Constant::getName());
    }
}
