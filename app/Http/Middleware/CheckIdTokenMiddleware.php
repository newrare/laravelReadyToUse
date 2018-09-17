<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\Api;
use App\Http\Models\User;

use Closure;
use Request;
use Session;

class CheckIdTokenMiddleware
{
    public function handle($Request, Closure $Next)
    {
        //get Token
        $Api = Api::find($Request->route("idToken"));

        if($Api === null)
        {
            return Reply::json("403");
        }

        //get User
        $User = User::find(Session::get("idUser"));

        if($User === null)
        {
            return Reply::json("403");
        }

        //check user
        if( ($User->isAdmin == 0) and (Session::get("idUser") != $Api->idUser))
        {
            return Reply::json("403");
        }

        return $Next($Request);
    }
}
