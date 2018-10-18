<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
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
        if(in_array( 'api', request()->route()->middleware())){
            if($exception instanceof ValidationException) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'message' => implode(" ", $exception->validator->errors()->all())
                ], 400);
            }

            if ($exception) {
                return response()->json([
                    'success' => false,
                    'code' => $exception->getStatusCode(),
                    'message' => $exception->getMessage() ? : class_basename($exception),
                ], $exception->getStatusCode());
            }
        }

        return parent::render($request, $exception);
    }
}
