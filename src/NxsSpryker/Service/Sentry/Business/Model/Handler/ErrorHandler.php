<?php declare(strict_types=1);

namespace NxsSpryker\Service\Sentry\Business\Model\Handler;

use ErrorException;
use NxsSpryker\Service\NxsErrorHandler\Dependency\Plugin\NxsErrorHandlerPlugin;
use NxsSpryker\Service\Sentry\SentryConfig;
use NxsSpryker\Service\Sentry\SentryService;
use Spryker\Service\Kernel\AbstractPlugin;
use function call_user_func;

/**
 * @method SentryConfig getConfig()
 * @method SentryService getService()
 */
class ErrorHandler extends AbstractPlugin implements NxsErrorHandlerPlugin
{
    /**
     * @var mixed
     */
    private $oldErrorHandler;

    public function register(bool $isDebug): void
    {
        if ($isDebug) {
            $this->oldErrorHandler = set_error_handler(
                [
                    $this,
                    'handleError'
                ]
            );
        }
    }

    public function handleError(
        int $errNo,
        string $errStr,
        string $errFile,
        int $errLine,
        array $errContext
    ): bool {
            $exception = new ErrorException($errStr, 0, $errNo, $errFile, $errLine);
            $this->getService()->captureException(
                $exception,
                [
                    'tags' =>
                        [
                            'handler' => __CLASS__
                        ]
                ]
            );

        if ($this->oldErrorHandler && $this->getConfig()->isRunPreviousHandler()) {
            call_user_func(
                $this->oldErrorHandler,
                $errNo,
                $errStr,
                $errFile,
                $errLine,
                $errContext
            );
        }

        return true;
    }
}
