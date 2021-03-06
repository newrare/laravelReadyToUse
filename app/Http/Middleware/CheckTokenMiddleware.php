<?php

namespace App\Http\Middleware;

use App\Http\Classes\Reply;
use App\Http\Models\Api;

use Closure;
use Request;
use Session;

class CheckTokenMiddleware
{
    public function handle($Request, Closure $Next)
    {
        //get authorization
        $auth = $Request->header("authorization");

        if($auth === null)
        {
            return Reply::json("401");
        }

        //get token
        $typeToken = explode(" ", $auth);

        if(count($typeToken) < 2)
        {
            return Reply::json("401");
        }

        $token = explode(":", $typeToken[1]);

        if(count($token) < 2)
        {
            return Reply::json("401");
        }

        $tokenId    = base64_decode($token[0]);
        $tokenKey   = base64_decode($token[1]);

        //get Api by token
        $Api = Api::where("tokenId", $tokenId)->where("tokenKey", $tokenKey)->first();

        //check result
        if($Api === null)
        {
            return Reply::json("401");
        }

        //set session
        Session::put("idUser", $Api->idUser);

        return $Next($Request);
    }
}
