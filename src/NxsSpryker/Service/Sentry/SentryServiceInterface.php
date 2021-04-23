<?php

namespace NxsSpryker\Service\Sentry;

use Throwable;

interface SentryServiceInterface
{
    public function captureException(Throwable $exception, array $data = null): void;
}
