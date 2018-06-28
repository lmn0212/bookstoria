<?php

namespace App\Exceptions;

use Exception;
use HttpException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Intervention\Image\Exception\NotReadableException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof QueryException) {
            return back()->withInput();
        }if ($exception instanceof NotFoundHttpException) {
            return back()->withInput();
        }if ($exception instanceof MethodNotAllowedHttpException) {
            return back()->withInput();
        }if ($exception instanceof HttpException) {
            return back()->withInput();
        }if ($exception instanceof NotReadableException) {
            return back()->withInput();
        }
        return parent::render($request, $exception);
    }
}
