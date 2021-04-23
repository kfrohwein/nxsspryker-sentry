<?php

use NxsSpryker\Service\Sentry\SentryConfig;
use NxsSpryker\Yves\SentryWidget\SentryWidgetConfig;

$config[SentryConfig::IS_ACTIVE] = true;

$config[SentryConfig::RUN_PREVIOUS_HANDLER] = true;

// @see https://docs.sentry.io/platforms/php/configuration/options/
$config[SentryConfig::CLIENT_CONFIG] = [
    'dsn' => '',
    'error_types' => E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED,
    'environment' => 'development',
    'attach_stacktrace' => true,
    'send_default_pii' => false,
    'release' => 'example',
];

$config[SentryWidgetConfig::JS_IS_ACTIVE] = true;
$config[SentryWidgetConfig::JS_CLIENT_DSN] = '';
$config[SentryWidgetConfig::JS_CLIENT_CONFIG] = [];
