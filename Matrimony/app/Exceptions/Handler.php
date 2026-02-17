<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if (config('app.env') === 'local' || config('app.env') === 'uat') {
            return parent::render($request, $exception);
        } else {
            Log::error($exception);

            if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException || $exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                return response()->view('errors.404', [], 404);
            }
            if ($exception instanceof AuthenticationException) {
                return redirect()->guest(route('login'))->with('error', 'You need to login to access this page.');
            }
            if ($exception instanceof \Illuminate\Validation\ValidationException) {
                return redirect()->back()->withErrors($exception->errors())->withInput();
            }

            return response()->view('errors.generic', [], 500);
        }
    }
}
