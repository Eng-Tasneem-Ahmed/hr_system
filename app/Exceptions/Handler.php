<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            if ($exception instanceof AuthenticationException) {
                return responseErrorMessage("Authentication Unauthorized", 401);
            }

            if ($exception instanceof NotFoundHttpException) {
                return responseErrorMessage('Route Not Found', 404);
            }

    

            if ($exception instanceof UnauthorizedException) {
                return responseErrorMessage('You do not have the required authorization.', 403);
            }

            if ($exception instanceof ModelNotFoundException) {
                return responseErrorMessage('Model Not Found |' . $exception->getMessage(), 404);
            }
        }

        return parent::render($request, $exception);
    }


}
