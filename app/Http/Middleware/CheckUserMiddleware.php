<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\User;

use Closure;
use Request;
use Session;

class CheckUserMiddleware
{
    public function handle($Request, Closure $Next)
    {
        //test user session exist
        if(Session::has("idUser"))
        {
            $User = User::find(Session::get("idUser"));

            if($User === null)
            {
                //restart session
                $langSession = Session::get("lang");

                Session::flush();

                Session::put("lang", $langSession);

                return Reply::redirect("/connection", "401");
            }
        }

        return $Next($Request);
    }
}
