<?php
/*
 * Copyright (c) 2021 NobiDev
 */

/**
 * @noinspection UnknownInspectionInspection
 * @noinspection PhpMissingDocCommentInspection
 * @noinspection EmptyClassInspection
 * @noinspection PhpUnhandledExceptionInspection
 * @noinspection PhpUnused
 */

declare(strict_types=1);

namespace NobiDev\AppUpdater {

    use NobiDev\AppUpdater\Contracts\AppUpdaterRelease as AppUpdaterReleaseContract;

    class FacadeImplemented
    {
        protected static AppUpdater $instance;

        public static function load(): AppUpdater
        {
            return self::$instance->load();
        }

        public static function getVersion(): string
        {
            return self::$instance->getVersion();
        }

        public static function isNewVersionAvailable(): bool
        {
            return self::$instance->isNewVersionAvailable();
        }

        public static function getVersionFile(): string
        {
            return self::$instance->getVersionFile();
        }

        public static function hasVersionFile(): bool
        {
            return self::$instance->hasVersionFile();
        }

        public static function createVersionFile(string $version): void
        {
            self::$instance->createVersionFile($version);
        }

        public static function deleteVersionFile(): void
        {
            self::$instance->deleteVersionFile();
        }

        public static function getVersionAvailable(): string
        {
            return self::$instance->getVersionAvailable();
        }

        public static function fetch($version): AppUpdaterReleaseContract
        {
            return self::$instance->fetch($version);
        }
    }
}

namespace {

    use NobiDev\AppUpdater\FacadeImplemented;

    class AppUpdater extends FacadeImplemented
    {
    }
}
