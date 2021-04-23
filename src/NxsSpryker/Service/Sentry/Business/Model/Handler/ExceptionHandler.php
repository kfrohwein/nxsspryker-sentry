<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry\Business\Model\Handler;

use ErrorException;
use NxsSpryker\Service\NxsErrorHandler\Dependency\Plugin\NxsExceptionHandlerPlugin;
use NxsSpryker\Service\Sentry\SentryService;
use NxsSpryker\Service\Sentry\SentryServiceFactory;
use Spryker\Service\Kernel\AbstractPlugin;
use Throwable;
use function call_user_func;

/**
 * @method SentryServiceFactory getFactory()
 * @method SentryService getService()
 */
class ExceptionHandler extends AbstractPlugin implements NxsExceptionHandlerPlugin
{
    /**
     * @var mixed
     */
    private $oldExceptionHandler;

    public function register(bool $isDebug): void
    {
        if ($isDebug) {
            $this->oldExceptionHandler = set_exception_handler(
                [
                    $this,
                    'handleException'
                ]
            );
        }
    }

    public function handleException(Throwable $throwable): void
    {
        $this->getService()->captureException(
            $throwable,
            [
                'tags' =>
                    [
                        'handler' => __CLASS__
                    ]
            ]
        );

        if ($this->oldExceptionHandler && $this->getConfig()->isRunPreviousHandler()) {
            call_user_func(
                $this->oldExceptionHandler,
                $throwable
            );
        }
    }
}
