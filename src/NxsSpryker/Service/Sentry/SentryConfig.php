<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry;

use Spryker\Service\Kernel\AbstractBundleConfig;

class SentryConfig extends AbstractBundleConfig
{
    public const CLIENT_CONFIG = 'sentry.client.config';
    public const IS_ACTIVE = 'sentry.is.active';
    public const RUN_PREVIOUS_HANDLER = 'sentry.run.previous.handler';

    public function isActive(): bool
    {
        return $this->get(self::IS_ACTIVE, false);
    }

    public function getClientConfig(): array
    {
        return $this->get(self::CLIENT_CONFIG);
    }

    public function isRunPreviousHandler(): bool
    {
        return $this->get(self::RUN_PREVIOUS_HANDLER, true);
    }
}
