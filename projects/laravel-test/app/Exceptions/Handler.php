<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

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

    public function render($request, Throwable $e)
    {
        /*
         * ThrottleRequestsException
         */
        if ($e instanceof ThrottleRequestsException) {
            return response()->json([
                'message'     => 'Too many requests. Please try again later.',
                'retry_after' => $e->getHeaders()['Retry-After']
            ], 429);
        }
        /*
         * Custom Error Page
         */
        if ($this->isHttpException($e)) {
            return $this->renderHttpExceptionCustom($e, $request);
        }
        return parent::render($request, $e);
    }

    /**
     * Override default method. (renderHttpException)
     * To have separate error page for admin and public area.
     */
    protected function renderHttpExceptionCustom(HttpExceptionInterface $e, Request $request)
    {
        $status = $e->getStatusCode();
        $header = $e->getHeaders();
        $data = [
            'exception' => $e,
            'title'     => $status,
            'message'   => $e->getMessage()
        ];
        if (view()->exists($this->getViewName($status))) {
            return response()->view($this->getViewName($status), $data, $status, $header);
        } else {
            if (view()->exists($this->getViewName())) {
                return response()->view($this->getViewName(), $data, $status, $header);
            }
            return $this->convertExceptionToResponse($e);
        }
    }

    /**
     * Determine what view to show based on route
     *
     * @param  int|string|null  $status
     * @return string
     */
    protected function getViewName(int|string $status = null): string
    {
        if (empty($status)) {
            $status = 'default';
        }
        $view = 'web.'.$status;
        if (request()->fullUrlIs('*admin*')) {
            $view = 'admin.'.$status;
        }
        return "errors.{$view}";
    }
}
