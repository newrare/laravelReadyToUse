<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;

use Closure;
use Request;
use Response;

class CheckWebMiddleware
{
    public function handle($Request, Closure $Next)
    {
    	if(Request::isJson())
     	{
            return Response::json(Reply::json("415"), "415");
        }

        return $Next($Request);
    }
}
