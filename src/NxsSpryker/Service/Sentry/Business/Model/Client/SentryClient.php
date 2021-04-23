<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry\Business\Model\Client;

use Sentry\Exception\SilencedErrorException;
use Throwable;
use function Sentry\captureException;

class SentryClient
{
    /**
     * @var bool
     */
    private $isActive;

    public function __construct(
        bool $isActive
    ) {
        $this->isActive = $isActive;
    }

    public function captureException(Throwable $exception): void
    {
        if ($this->isActive) {
            captureException($exception);
        }
    }
}
