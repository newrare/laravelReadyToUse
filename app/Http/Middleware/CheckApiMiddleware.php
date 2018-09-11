<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;

use Closure;
use Request;

class CheckApiMiddleware
{
    public function handle($Request, Closure $Next)
    {
    	if(!Request::isJson())
     	{
            return Reply::redirect("/api", 415);
        }

        return $Next($Request);
    }
}
