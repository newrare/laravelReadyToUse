<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Classes\ViewElement;
use Illuminate\Http\Response;

use Closure;
use Request;

class CheckApiMiddleware
{
    public function handle($Request, Closure $Next)
    {
    	if(!Request::isJson())
     	{
            $error = ViewElement::getData("error");

            $result["messageError"] = $error["415"];
            $result["titlePage"]    = trans("pageError.titlePage");

            return new Response(view("pageError")->with("data", $result));
        }

        return $Next($Request);
    }
}
