<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry;

use Spryker\Service\Kernel\AbstractService;
use Throwable;

/**
 * @method \NxsSpryker\Service\Sentry\SentryServiceFactory getFactory()
 */
class SentryService extends AbstractService implements SentryServiceInterface
{
    public function captureException(Throwable $exception, array $data = null): void
    {
        $this->getFactory()->getSentryClient()->captureException($exception);
    }
}
