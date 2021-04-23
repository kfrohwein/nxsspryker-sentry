<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry\Business\Model\Handler;

use ErrorException;
use NxsSpryker\Service\NxsErrorHandler\Dependency\Plugin\NxsExceptionHandlerPlugin;
use NxsSpryker\Service\Sentry\SentryService;
use NxsSpryker\Service\Sentry\SentryServiceFactory;
use Spryker\Service\Kernel\AbstractPlugin;

/**
 * @method SentryServiceFactory getFactory()
 * @method SentryService getService()
 */
class ShutdownHandler extends AbstractPlugin implements NxsExceptionHandlerPlugin
{
    /**
     * @param bool $isDebug
     */
    public function register(bool $isDebug): void
    {
        if ($isDebug) {
            register_shutdown_function(
                [
                    $this,
                    'handleShutdown'
                ]
            );
        }
    }

    public function handleShutdown(): void
    {
        $error = error_get_last();

        $exception = new ErrorException(
            @$error['message'],
            0,
            @$error['type'],
            @$error['file'],
            @$error['line']
        );

        $this->getService()->captureException(
            $exception,
            [
                'tags' =>
                    [
                        'handler' => __CLASS__
                    ]
            ]
        );
    }

}
