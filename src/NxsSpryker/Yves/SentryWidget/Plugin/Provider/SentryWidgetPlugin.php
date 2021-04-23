<?php declare(strict_types=1);

namespace NxsSpryker\Yves\SentryWidget\Plugin\Provider;

use NxsSpryker\Yves\SentryWidget\SentryWidgetConfig;
use Spryker\Yves\Kernel\Widget\AbstractWidgetPlugin;

/**
 * @method SentryWidgetConfig getConfig()
 */
class SentryWidgetPlugin extends AbstractWidgetPlugin
{
    const NAME = 'SentryWidgetPlugin';

    public function initialize(): void
    {
        $this->addParameter('sentryIsActive', $this->getConfig()->getJsClientActive());
        $this->addParameter('sentryDsn', $this->getConfig()->getJsClientUrl());
        $this->addParameter('sentryConfig', $this->getConfig()->getJsClientConfig());
    }

    public static function getName(): string
    {
        return static::NAME;
    }

    public static function getTemplate(): string
    {
        return '@SentryWidget/sentryWidget.twig';
    }
}
