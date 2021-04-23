<?php

namespace NxsSpryker\Service\Sentry;

use NxsSpryker\Service\Sentry\Business\Model\Client\SentryClient;

interface SentryServiceFactoryInterface
{
    public function getSentryClient(): SentryClient;
}
