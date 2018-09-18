<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\User;

use Closure;
use Request;
use Session;

class CheckWebMiddleware
{
    public function handle($Request, Closure $Next)
    {
    	if(Request::isJson())
     	{
            return Reply::json("415");
        }

        return $Next($Request);
    }
}
