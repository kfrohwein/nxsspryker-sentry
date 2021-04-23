<?php declare(strict_types=1);

namespace NxsSpryker\Yves\SentryWidget;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class SentryWidgetConfig extends AbstractBundleConfig
{
    public const JS_IS_ACTIVE = 'sentry.widget.is.active';
    public const JS_CLIENT_DSN = 'sentry.widget.client.dsn';
    public const JS_CLIENT_CONFIG = 'sentry.widget.client.config';

    public function getJsClientUrl(): string
    {
        return $this->get(self::JS_CLIENT_DSN, '');
    }

    public function getJsClientConfig(): string
    {
        return $this->get(self::JS_CLIENT_CONFIG, '');
    }

    public function getJsClientActive(): bool
    {
        return $this->get(self::JS_IS_ACTIVE, false);
    }
}
