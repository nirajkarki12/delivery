<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
      if ($request->ajax() || $request->wantsJson()) 
      {
         $exception = $this->prepareException($exception);

         if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
            return $exception->getResponse();
         }
         if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            return $this->unauthenticated($request, $exception);
         }
         if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
         }

         // Default response of 400
         $status = 400;

         // If this exception is an instance of HttpException
         if ($this->isHttpException($exception)) {
            // Grab the HTTP status code from the Exception
            $status = $exception->getStatusCode();
         }

         // Define the response
         $response = [];
         $response['status'] = false;
         $response['code'] = $status;
         $response['message'] = method_exists($exception, 'getMessage') ? $exception->getMessage() ?: 'error' : 'error';

         // If the app is in debug mode
         if (config('app.debug')) {
            $response['message'] = $exception->getMessage();
            $response['line'] = $exception->getCode();
            $response['exception'] = get_class($exception); // Reflection might be better here
            $response['trace'] = $exception->getTrace();
         }

         // Return a JSON response with the response array and status code
         return response()->json($response, $status);
      }
        return parent::render($request, $exception);
    }
}
