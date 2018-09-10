<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;

use Closure;
use Request;

class CheckWebMiddleware
{
    public function handle($Request, Closure $Next)
    {
    	if(Request::isJson())
     	{
            return Reply::make("pageError", 415);
        }

        return $Next($Request);
    }
}
