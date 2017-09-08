<?php

namespace App\Http\Middleware;

use App\Http\Classes\ViewElement;

use App;
use Session;
use Closure;

class LangMiddleware
{
    public function handle($Request, Closure $Next)
    {
        if(!Session::has("lang"))
        {
            Session::put("lang", "en");
        }

        App::setLocale(Session::get("lang"));

        $shareData = ViewElement::getData("template");

        view()->share("shareData", $shareData);

        return $Next($Request);
    }
}
