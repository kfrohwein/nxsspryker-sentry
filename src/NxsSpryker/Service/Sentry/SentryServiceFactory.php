<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry;

use NxsSpryker\Service\Sentry\Business\Model\Client\SentryClient;
use Spryker\Service\Kernel\AbstractServiceFactory;

class SentryServiceFactory extends AbstractServiceFactory implements SentryServiceFactoryInterface
{
    public function getSentryClient(): SentryClient
    {
        return $this->getProvidedDependency(SentryDependencyProvider::SENTRY_CLIENT);
    }
}
