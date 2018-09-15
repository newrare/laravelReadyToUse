<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use App\Http\Classes\Reply;
use App\Http\Classes\ViewElement;

use Request;
use Session;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
        //not found
        if($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException)
        {
            return self::reply("404");
        }

        //bad method
        if($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException)
        {
            return self::reply("405");
        }

        //other error
        if(env("APP_DEBUG") === true)
        {
            //print all errors
            if($exception instanceof ModelNotFoundException)
            {
                $exception = new NotFoundHttpException($e->getMessage(), $exception);
            }

            return parent::render($request, $exception);
        }
        else
        {
            //no print error, use it in Prod
            return self::reply("503");
        }
    }

    private static function reply($code)
    {
        $result = ViewElement::getData("pageError");

        if(Request::isJson())
        {
            return Reply::json($code);
        }
        else
        {
            $error = ViewElement::getData("error");

            $result["messageError"] = $error[$code];

            view()->share("data", $result);

            return response(view("pageError"), $code);
        }
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
