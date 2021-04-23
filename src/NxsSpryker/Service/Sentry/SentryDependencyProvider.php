<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry;

use NxsSpryker\Service\Sentry\Business\Model\Client\SentryClient;
use Spryker\Service\Kernel\AbstractBundleDependencyProvider;
use Spryker\Service\Kernel\Container;
use function Sentry\init;

class SentryDependencyProvider extends AbstractBundleDependencyProvider
{
    public const SENTRY_CLIENT = 'sentry.client';

    public function provideServiceDependencies(Container $container)
    {
        return $this->addSentryClient($container);
    }

    protected function addSentryClient(Container $container): \Spryker\Service\Kernel\Container
    {
        $container[self::SENTRY_CLIENT] = function (Container $container) {

            init($this->getConfig()->getClientConfig());

            return new SentryClient(
                $this->getConfig()->isActive()
            );
        };

        return $container;
    }
}
