<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;

use Closure;
use Request;
use Session;

class CheckSessionMiddleware
{
    public function handle($Request, Closure $Next)
    {
        if(!Session::has("idUser"))
        {
            return Reply::redirect("connection", 401);
        }

        return $Next($Request);
    }
}
